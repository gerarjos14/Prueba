<!doctype html>
<html lang="en">

<head>
  <title>Create truck</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <style>
    table {
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div class="container">
    @include('layouts.navbar')

    

    <div class="p-5 mt-3 w-50 border border-dark">
    @if(isset($truck))
    <h5 class="mb-3 font-weight-bold">Editar camión</h5>
    <form action="{{route('trucks.update', $truck->id)}}" method="POST">
      @method('PUT')
    @else
    <h5 class="mb-3 font-weight-bold">Crea un camión</h5>
      <form action="{{route('trucks.store')}}" method="POST">
    @endif
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{isset($truck->name) ? $truck->name : ''}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Support kg</label>
          <input type="number" class="form-control" id="exampleInputPassword1" name="support_kg" value="{{isset($truck->support_kg) ? $truck->support_kg : ''}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>