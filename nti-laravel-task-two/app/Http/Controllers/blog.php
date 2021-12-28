<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\blogm;



class blog extends Controller
{
    //

    public function index()
    {
        $data = blogm::get();
        return view("users", ['data' => $data]);
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $data = blogm::find($id);

        return view('edit', ['data' => $data]);
    }

    public function update(Request $request)
    {

        $data = $this->validate($request, [
            "title" => "required|min:3|regex:/[a-zA-Z]/",
            "content" => "required|string",
        ]);

        $op = blogm::where("id", $request->id)->update($data);

        if ($op) {
            $message = "raw updated";
        } else {
            $message = "error try again";
        }

        session()->flash('message', $message);
        return redirect('blog/users');
    }

    public function destroy($id)
    {
        $op = blogm::where('id', $id)->delete();
        return ('users');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            "title" => "required|min:3|regex:/[a-zA-Z]/",
            "content" => "required|string",
        ]);

        blogm::create($data);

        echo "message successed";
    }
}