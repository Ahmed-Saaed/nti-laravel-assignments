<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use Illuminate\Support\Facades\Storage;

class studentsController extends Controller
{
    public function index()
    {
        $data = students::get();
        return view("students.info", ['data' => $data]);
    }

    //view and store[insert] the studens data
    public function create()
    {
        return view('students.register');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "name" => "required|min:3|regex:/[a-zA-Z]/",
            "email" => "required|string|email",
            "password" => "required|string",
            "cv" => "required|file",
        ]);

        $path = $request->cv->path();
        $pathc = $request->cv->getRealPath();
        $file = $request->file('cv');
        $name = $request->file('cv')->getBasename() . '.' . $file->getClientOriginalExtension();
        $info = $request->file('cv')->getFileInfo();
        $link = $request->file('cv')->getLinkTarget();
        $extension = $request->cv->extension();

        // $allowedex = 'pdf';

        // if ($request->hasFile($allowedex)) {

        //     $file = $request->file($allowedex);
        //     if ($file->isValid()) {


        //         $Filename = $name . '.' . $file->extension();

        //         Storage::disk('local')->put($Filename, file_get_contents($file));
        //     }
        // }
        $path = Storage::putFileAs(
            'docs',
            $request->file('cv'),
            $name
        );

        // dd($path, $pathc, $file, $name, $link, $info, $extension);
        $data['cv'] = $name;
        $data['password'] =  bcrypt($data['password']);





        if (strlen($data['cv']) > 0) {
            $op = students::create($data);
            if ($op) {
                $message = "Raw Inserted .";
                return redirect(url('/students/info'));
            } else {
                $message = 'Error Try Again !';
            }
        } else {
            $message = "Error uploading file.";
            session()->flash('Message', $message);
            return redirect(url('/students/register'));
        }

        // session()->put('Message',$message);    // $_SESSION['KEY'] => $VALUE
        session()->flash('Message', $message);
    }

    //edit and update

    public function edit($id)
    {

        //    $data = students::where('id',$id)->get();

        $data = students::find($id);
        Storage::delete($data['cv']);
        return view('students.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        # Validate Data .....
        $data = $this->validate($request, [
            "name" => "required|min:3|regex:/[a-zA-Z]/",
            "email" => "required|string|email",
            "cv" => "file",
        ]);

        $op = students::where('id', $request->id)->update($data);

        if ($op) {
            $message = "Raw Updated";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/students/info'));
    }

    // delete

    public function destroy($id)
    {
        $op  =  students::where('id', $id)->delete();

        if ($op) {
            Storage::delete('');
            $message = "student Removed";
        } else {
            $message = "Error Try Again";
        }
        session()->flash('Message', $message);
        return redirect(url('/students/info'));
    }


    # login and logout


    public function Login()
    {
        return view('students.login');
    }

    public function doLogin(Request $request)
    {

        $data = $this->validate($request, [
            "email"    => "required|email",
            "password" => "required"
        ]);


        if (auth()->attempt($data)) {
            return redirect(url('/students/info'));
        } else {
            return redirect(url('/students/login'));
        }
    }



    public function Logout()
    {
        auth()->logout();
        return redirect(url('/students/login'));
    }
}