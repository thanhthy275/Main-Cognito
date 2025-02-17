<?php
    session_start();
    // if (isset($_SESSION['SESSION_EMAIL'])) {
    //     header("Location: index.php");
    //     die();
    // }

    include 'config.php';
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<p style='color:red !important'>Xác thực tài khoản thành công!</p> <br><br>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (empty($role)) {
                $msg = "<p style='color:red !important'>Vui lòng chọn vai trò đăng nhập!<p> <br><br>";
            }else {

                if (empty($row['code'])) {
                    $_SESSION['SESSION_EMAIL'] = $email;
                } else {
                    $msg = "<p style='color:red !important'>Vui lòng xác thực email của bạn!<p> <br><br>";
                }  
                
                if ($row['password'] === $password && $row['role'] == "student") {
                    header("Location: home.php");
                } elseif ($row['password'] === $password && $row['role'] == "mentor") {
                    header("Location: home.php");
                } 
            }
        } else {
            $msg = "<p style='color:red !important'>* Email hoặc mật khẩu không đúng!<p> <br><br>";
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Đăng nhập</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/login.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-4.png" alt="" class="image-1">
				<form action="" method="POST">
					<h3>Đăng nhập</h3>
					<?php echo $msg; ?>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
					</div>

                    <div class="form-holder">
						<span> Bạn là:</span> 
						<div style="padding-left: 70px">
						 <input type="radio" name="role" value="student"> Học sinh
						 <input type="radio" name="role" value="mentor"> Cố vấn học tập
						 </div>
                    </div>
					
					<button name="submit">
						<span>Đăng nhập</span>
					</button>

                    <br>
                     <div class="signup-link">
                        <h4 class = "login-register-text">Không phải là thành viên? <a href="register.php">Đăng ký ngay</a></h4> 
                     </div>
				</form>
				
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>