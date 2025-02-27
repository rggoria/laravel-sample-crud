<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRUD</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
   <body>
      <div class="container mt-5">
         @if (session('success'))
            <div class="bg-success text-center text-white py-2 mb-4">
               {{ session('success') }}
            </div>
         @endif
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h1 class="m-0">Users Dashboard</h1>
               <a href="{{ route('user.add')}}" class="ms-auto btn btn-success">
                  Add New USER
               </a>
            </div>
            <div class="card-body">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col" class="text-center">Actions</th>
                     </tr>
                  </thead>
                  <tbody class="table-group-divider">
                     @foreach ($sample as $user)       
                        <tr>
                           <th scope="row">
                              {{ $user->id }}
                           </th>
                           <td>
                              {{ $user->name }}
                           </td>
                           <td>
                              {{ $user->gender }}
                           </td>
                           <td class="text-center">
                              <a href="{{ route('user.edit', $user->id)}}" class="btn btn-warning btn-sm mx-1">
                                 Update
                              </a>
                              <form action="{{ route('user.delete', $user->id) }}" method="post" style="display: inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm mx-1">
                                    Delete
                                 </button>
                              </form>                          
                           </td>
                        </tr>           
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>
