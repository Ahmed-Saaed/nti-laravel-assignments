<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <main>
    <div class="container">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

      <h1 class="mt-4">edit your data</h1>


      <div class="card-body">
        <div class="container">
          <form action="<?php echo url('students/update') ?>" method="post" enctype="multipart/form-data">

            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token();?>"> -->
            @csrf

            <input type="hidden" name="id" value="{{$data->id}}" >

            <div class="form-group">
              <label for="exampleInputName">name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby=""
                placeholder="Enter name" value= "{{$data->name}}"/>
            </div>

            <div class="form-group my-4">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby=""
                placeholder="Enter email" value= "{{$data->email}}" />
            </div>

            <div class="form-group my-4">
              <label for="cv">cv</label>
              <input type="file" class="form-control" id="cv" name="cv" aria-describedby=""
                placeholder="Enter address" />
                <a href= "{{$data->name}}">cv</a>
            </div>

            <button type="submit" class="btn btn-primary my-3">update</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
