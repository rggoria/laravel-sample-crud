<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRUD: CREATE</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
   <body>
      <div class="container mt-5">
         @if ($errors->any())
            <div class="alert alert-danger text-center">
               <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif

         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="m-0">Add Form</h1>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-success">Go to Dashboard</a>
                </div>
            </div>
            <div class="card-body">
               <form action="{{ route('insert') }}" method="post">
                  @csrf
                  <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                  </div>
                  <div class="mb-3">
                     <label for="gender" class="form-label">Gender</label>
                     <input type="text" class="form-control" name="gender" id="gender" value="{{ old('gender') }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>
