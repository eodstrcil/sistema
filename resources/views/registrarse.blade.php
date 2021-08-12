<!DOCTYPE HTML>
<html>
	<head>
		<title>DATA Cinematográfica</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="/sistema/public/" class="logo">
									<span class="symbol"><img src="images/logo.png" alt="" /></span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="/sistema/public/">Home</a></li>
							<li><a href="generic.html">Suscripción</a></li>
							<li><a href="/sistema/public/registrarse">Registrate</a></li>
							<li><a target="_blank" href="https://cecilianavesnik.com.ar">Editora: Cecilia Navesnik</a></li>
                            <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>DATA cinematográfica</h1>
								<p>Hola!! Para registrarte por favor completá el siguiente formulario.</p>
							</header>
							<section>
                                <h2>Formulario de registro</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="nombre" id="nombre" placeholder="Nombre" />
										</div>
										<div class="field half">
											<input type="text" name="apellido" id="apellido" placeholder="Apellido" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field half">
											<input type="date" name="fechaNac" id="fechaNac" placeholder="Fecha de nacimiento EJ: 18/04/1990" />
										</div>
										
									</div>
									<ul class="actions">
										<li><input type="submit" value="Enviar" class="primary" /></li>
									</ul>
								</form>
							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
                            <section>
                                <h2>Contactanos</h2>
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<input type="text" name="name" id="name" placeholder="Nombre" />
										</div>
										<div class="field half">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
										<div class="field">
											<textarea name="message" id="message" placeholder="Mensaje"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Enviar" class="primary" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Seguinos</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/satelaargentina" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/cecilia.navesnik/" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>							
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Todos los redechos reservador</li><li>Diseño: <a href="https://satela.com.ar">Satela.com.ar</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
            <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
			<script src="{!! asset('assets/js/browser.min.js') !!}"></script>
			<script src="{!! asset('assets/js/breakpoints.min.js') !!}"></script>
			<script src="{!! asset('assets/js/util.js') !!}"></script>
			<script src="{!! asset('assets/js/main.js') !!}"></script>

	</body>
</html>