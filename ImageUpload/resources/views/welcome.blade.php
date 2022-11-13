<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <br><br><br><br>

    <div class="container">
    <form method="POST" action="{{ url('/foto') }}" enctype="multipart/form-data">
        {{csrf_field() }}
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Foto</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($yaz as $a)
            <tr>
                <td>{{$a->name}}</td>
                <td><img src="/images/{{ $a->image }}" style="width: 100px; height:100px"></td>
                <td>
                    <a class="btn btn-info" href="{{url('editGet',['id'=>$a->id]) }}"> Edit</a>
                    <a class="btn btn-danger" href="{{url('fotoSil',['id'=>$a->id]) }}"> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
