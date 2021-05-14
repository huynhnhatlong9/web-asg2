<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./css/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./css/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="./css/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #999999;">
    <?php
	$error = "";
	$username = $password = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['username'])) {
			$error = "something went wrong!";
		} else {
			$username = text_input($_POST["username"]);
		}
		if (empty($_POST['password'])) {
			$error = "something went wrong!";
		} else {
			$password = text_input($_POST["password"]);
		}
	}
	function text_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	@include "./Data/config.php";
	if ($username) {
		$sql = "select * from customers ";
		$user = $conn->query($sql);
		if ($user->num_rows === 1) {
			$hash = $user->fetch_assoc()['pass'];
			$isValidPassword = password_verify($password, $hash);
			if ($isValidPassword) {
				session_start();
				$_SESSION['username'] = $username;
				if (isset($_SESSION['username'])) {
					header("location: index.php");
				}
			} else {
				$msg = "Username or Password is invalid!";
			}
		} else {
			$msg = "Username or Password is invalid!";
		}
	}
	?>
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form action="login.php" method="POST" class="login100-form validate-form">
                    <span class="login100-form-title p-b-59">
                        Sign In
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" value="<?php echo $username ?>"
                            placeholder="Username...">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" value="<?php echo $password ?>"
                            placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Sign In
                            </button>
                        </div>

                        <a href="./register.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                            Sign Up
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php


	?>

    <!--===============================================================================================-->
    <script src="./css/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/vendor/bootstrap/js/popper.js"></script>
    <script src="./css/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="./css/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="./css/login/js/main.js"></script>

</body>

</html>