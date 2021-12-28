


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

</head>
<body>

    <div class="container">

    <div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
          <tr>
            <td> {{$value->id}} </td>
            <td>{{ $value->title}}</td>
            <td>{{ $value->content}}</td>
            <td>
                <a class= "btn btn-primary" href={{url("/blog/edit/".$value->id)}}>edit</a>
                <a class = "btn btn-danger" href={{url("/blog/delete/".$value->id)}}>delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
</body>
</html>

