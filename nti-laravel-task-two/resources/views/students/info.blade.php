<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container my-auto">

        {{  session()->get('Message')  }}

        {{ 'Welcome , '.auth()->user() }}


        <br>

        <a href="{{url('/students/register')}}">+ Account</a> ||  <a class="btn btn-danger" href="{{url('/logout')}}">LogOut</a>

        <table class="table table-dark table-hover my-5">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">cv</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td> {{$value->id}} </td>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->email}}</td>
                    <td><a href="{{Storage::url($value->cv)}}">{{$value->cv}}</a></td>
                    <td>
                        <a class= "btn btn-primary" href={{url("/students/edit/".$value->id)}}>edit</a>
                        <a class = "btn btn-danger" href={{url("/students/delete/".$value->id)}}>delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>
