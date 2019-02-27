<!DOCTYPE html>
<html>
<head>
	<title>Juragan Kost :: Login</title>
</head>
<link rel="stylesheet" type="text/css" href="<?= BASEURL;?>/csslogin/main.css">
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= BASEURL; ?>/login/signin">
					<span class="login100-form-title p-b-26">
						Juragan Kost
					</span>
					<span class="login100-form-title p-b-48">
						<img src="<?= BASEURL;?>/img/login-key.png" width="100px">
					</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="id" autocomplete="off">
						<span class="focus-input100" data-placeholder="ID User"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="login">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
