<!doctype html>
<html lang="es">
  <head>
  	<title>Iniciar Sesion</title>
	  @if  (session('status'))
	  <div class="alert alert-danger " role="alert">
		  {{ session('status') }}
	  </div>
  @endif

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">

	</head>
	<body class="img js-fullheight " style="background-image: url({{ asset('files/img/bg.jpg') }});">
	<section class="ftco-section" style="height: 100vh">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">BIENVENIDO</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">INICIAR SESION</h3>
		      	<form action="{{ route('login') }}" class="signin-form" method="POST"> 
					  @csrf
		      		<div class="form-group">
		      			<input type="email" class="form-control" placeholder="Correo Electrónico" required name="email" value="{{ old('email') }}">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Contraseña" required name="contrasenia" value="{{ old('contrsenia') }}">
	             
	            </div>
	                <div class="form-group">
	            	<button type="submit"  class="form-control btn btn-primary submit p-3">INGRESAR</button>
					
				</div>
	          </form>

	          <div>
				<a href="{{ route('create') }}" type="button" class="form-control btn btn-primary submit p-3">REGISTRARSE</a>
			</div>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

