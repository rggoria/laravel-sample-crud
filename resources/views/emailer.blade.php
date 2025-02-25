<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap demo</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
   <body>
      <div class="container mt-5">
         @if (session('success'))
            <div class="bg-success text-center text-white">
               {{ session('success' )}}
            </div>
         @endif
         <section class="container my-5">   
            <div class="row py-4 justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <div class="card shadow-lg rounded-lg p-4">
                        <div id="response-message"></div>
                        <form action="{{ route('emailerSubmit') }}" method="post">
                            @csrf
                            <div class="row mb-4">
                                <!-- Name Field -->
                                <div class="col-md-12">
                                    <label for="name" class="form-label text-dmb fw-bold">
                                        Name<span class="sup text-danger"> *</span>
                                    </label>
                                    <input name="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-4">
                                <!-- Email -->
                                <div class="col-md-12">
                                    <label for="email" class="form-label text-dmb fw-bold">
                                        Email<span class="sup text-danger"> *</span>
                                    </label>
                                    <input name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-4">
                                <!-- Contact Number Field -->
                                <div class="col-md-12">
                                    <label for="contact" class="form-label text-dmb fw-bold">
                                        Contact Number<span class="sup text-danger"> *</span>
                                    </label>
                                    <input name="contact" type="text" class="form-control form-control-lg @error('contact') is-invalid @enderror" id="contact" placeholder="Enter your contact number" value="{{ old('contact') }}">
                                    @error('contact')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success w-100 py-3">
                                    <h4>Submit Form</h4>
                                </button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </section>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>