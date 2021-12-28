<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        {{  session()->get('Message')  }}
        
      <h1 class="mt-4">register student</h1>


      <div class="card-body">
        <div class="container">
          <form action="<?php echo url('students/store') ?>" method="post" enctype="multipart/form-data">

            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token();?>"> -->
            @csrf

            <div class="form-group">
              <label for="exampleInputName">name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby=""
                placeholder="Enter name" />
            </div>

            <div class="form-group my-4">
              <label for="email">email</label>
              <input type="text" class="form-control" id="email" name="email" aria-describedby=""
                placeholder="Enter email" />
            </div>


            <div class="form-group my-4">
              <label for="exampleInputName">password</label>
              <input type="password" class="form-control" id="exampleInputName" name="password" aria-describedby=""
                placeholder="Enter password" />
            </div>

            <div class="form-group my-4">
              <label for="cv">cv</label>
              <input type="file" class="form-control" id="cv" name="cv" aria-describedby=""
                placeholder="Enter address" />
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
