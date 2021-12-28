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

      <h1 class="mt-4">Blog</h1>


      <div class="card-body">
        <div class="container">
          <form action="<?php echo url('blog/update') ?>" method="post" enctype="multipart/form-data">

            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token();?>"> -->
            @csrf

            <input type="hidden" name="id" value="{{$data->id}}" >

            <div class="form-group">
              <label for="exampleInputName">title</label>
              <input type="text" class="form-control" id="exampleInputtitle" name="title" aria-describedby=""
                placeholder="Enter title" value= "{{$data->title}}" />
            </div>

            <div class="form-group my-4">
              <label for="exampleInputName">content</label>
              <input type="text" class="form-control" id="exampleInputName" name="content" aria-describedby=""
                placeholder="Enter content" value= "{{$data->content}}"/>
            </div>

{{--
            <div class="form-group my-4">
              <label for="exampleInputName">password</label>
              <input type="password" class="form-control" id="exampleInputName" name="password" aria-describedby=""
                placeholder="Enter password" />
            </div>

            <div class="form-group my-4">
              <label for="exampleInputName">address</label>
              <input type="text" class="form-control" id="exampleInputName" name="address" aria-describedby=""
                placeholder="Enter address" />
            </div>

            <div class="form-group my-4">
              <label for="exampleInputName">linkedin</label>
              <input type="url" class="form-control" id="exampleInputName" name="linkedin" aria-describedby=""
                placeholder="Enter linkedin" />
            </div> --}}

            <!-- <div class="form-group">
              <label for="exampleInputName">image</label>
              <input type="file" class="form-control" id="exampleInputName" name="image" aria-describedby=""
                placeholder="choose your image" />
            </div> -->

            <button type="submit" class="btn btn-primary my-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
