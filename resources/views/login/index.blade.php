<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
  integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
  crossorigin="anonymous"
  />
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
  />
</head>
<body>

  <div class="card m-auto" style="width: 500px;">
    <div class="card-body">
      <form action='/login' method='post'>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="id_level" class="col-sm-2 col-form-label">Nama Level</label>
          <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example" name="id_level" id="id_level">
                  <option disabled selected>Pilih Level</option>
                      @foreach($level_user as $item)
                          <option value="{{ $item->id_level }}" {{old('id_level') == $item->id_level ? 'selected' : null}}>{{ $item->nama_level }}</option>
                      @endforeach
              </select>
          </div>
      </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>  

</body>
</html>

