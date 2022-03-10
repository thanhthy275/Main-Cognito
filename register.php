<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username'])  ;
	$email =  mysqli_real_escape_string($conn, $_POST['email']) ;
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
	$code = mysqli_real_escape_string($conn, md5(rand()));


	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
		$msg = "<p>{$email} - Email này đã tồn tại</p> <br>";
	} else {
			if ($password === $confirm_password) {
				$sql = "INSERT INTO users (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
				$result = mysqli_query($conn, $sql);

					if ($result) {
						echo "<div style='display: none;'>";
						//Create an instance; passing `true` enables exceptions
					$mail = new PHPMailer(true);

					try {
						//Server settings
						$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
						$mail->isSMTP();                                            //Send using SMTP
						$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
						$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
						$mail->Username   = 'huynhthanhthy123@gmail.com';                      //SMTP username
						$mail->Password   = 'Thanhthy123';                            //SMTP password
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
						$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

						 //Recipients
						 $mail->setFrom('huynhthanhthy123@gmail.com');
						 $mail->addAddress($email);

						//Content
						$mail->isHTML(true);                                  //Set email format to HTML
						$mail->Subject = '[Cognito] Verify mail';
						$mail->Body    = 'Here is the verification link <b><a href="http://localhost/cognito/?verification='.$code.'">
							http://localhost/cognito/?verification='.$code.'</a></b>';
								

						$mail->send();
						echo 'Message has been sent';
					} catch (Exception $e) {
						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
					}
					echo "</div>";
						$msg = "<p style='color:red !important'>Vui lòng check mail để xác nhận tài khoản</p> <br><br>";
					} else {
						$msg = "<p>Ét o ét, vui lòng thử lại sau</p>";
					} 
			
			// } 
			} else {
				$msg =  "<p style='color:red !important'>* Mật khẩu không trùng khớp. Vui lòng nhập lại!</p> <br><br>";
				}
	}		
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Đăng ký</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-4.png" alt="" class="image-1">
				<form action="" method="POST">
					<h3>Đăng ký tài khoản</h3>
					<?php echo $msg; ?>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" placeholder="Họ và tên">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" name="email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" placeholder="Email">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Mật khẩu">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="confirm_password" value="<?php echo $_POST['confirm_password']; ?>" placeholder="Nhập lại mật khẩu">
					</div>
					<button name="submit" >
						<span>Đăng ký</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>