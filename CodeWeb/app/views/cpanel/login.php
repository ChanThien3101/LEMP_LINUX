
<html lang="en">
<head>

<meta charset="UTF-8">

<link rel="apple-touch-icon" type="image/png"
	href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon"
	href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon"
	href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg"
	color="#111">



<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
	href="<?php echo BASE_URL?>/public/template/css/loginAdmin.css">

<script>
  window.console = window.console || function(t) {};
</script>



<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" class="main-bg">

	<div class="login-container text-c animated flipInX">
		<div>
			<h1 class="logo-badge text-whitesmoke">
				<span class="fa fa-user-circle"></span>
			</h1>
		</div>
		<h3 class="text-whitesmoke">Sign In ADMIN</h3>
		<p class="text-whitesmoke">Sign In</p>
		<div class="container-content">
			<form class="margin-t" method="post" action="<?php echo BASE_URL?>/login/authentication_login">
				<div class="form-group">
					<input type="email" class="form-control" placeholder="chicandiemA@gmail.com"
						required name="email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="*****"
						required name="password">
				</div>
				<button type="submit" class="form-button button-l margin-b" name="signin">Sign In</button>

				<a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
				<p class="text-whitesmoke text-center">
					<small>Do not have an account?</small>
				</p>
				<a class="text-darkyellow" href="#"><small>Sign Up</small></a>
			</form>
			<p class="margin-t text-whitesmoke">
				<small> Chấn Thiên H2T</small>
			</p>
		</div>
	</div>


	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>







</body>
</html>
