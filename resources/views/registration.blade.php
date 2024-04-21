{{-- @extends('navbar') --}}
@section('title', 'Registration')
{{-- @section('container')

@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/434886babf.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">Registration</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="mt-5">
                            @if ($errors->any())
                                <div class="col-12">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                </div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif

                            @if (session()->has('success'))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            </div>
                        <form action="{{route('registration.post')}}" method="POST">
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name..." data-sb-validations="required">
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" name="password" type="password" placeholder="password" data-sb-validations="required" />
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A password is required.</div>
                            </div>
                            <div style="display: flex; justify-content: space-between;  align-items: center;">
                                <button type="submit" class="btn btn-primary" style="height: 6vh;">Register</button>
                                <div>
                                    <h7 class="resize-title">Already have an anccount?</h7>
                                    <a href="{{route('login')}}" class="text-align-center">
                                        <div class="button-registration fw-bolder">
                                            <div class="btn btn-secondary">Login</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

