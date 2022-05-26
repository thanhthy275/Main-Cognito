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

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name'])  ;
	$email =  mysqli_real_escape_string($conn, $_POST['email']) ;
	$password = mysqli_real_escape_string($conn, md5($_POST['password']));
	$confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));
	$role = mysqli_real_escape_string($conn, $_POST["role"]);
	
	$code = mysqli_real_escape_string($conn, md5(rand()));


	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
		$msg = "<p>{$email} - Email này đã tồn tại</p> <br>";
	} else {
			if ($password === $confirm_password) {
				$sql = "INSERT INTO users (name, email, password, role, code) VALUES ('{$name}', '{$email}', '{$password}', '{$role}', '{$code}')";
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
						$mail->Username   = 'hello.cognito@gmail.com';                      //SMTP username
						$mail->Password   = 'Cognitolovesyou';                            //SMTP password
						$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
						$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

						 //Recipients
						 $mail->setFrom('hello.cognito@gmail.com');
						 $mail->addAddress($email);

						//Content
						$mail->isHTML(true);                                  //Set email format to HTML
						$mail->Subject = '[Cognito] Verify email';
						$mail->Body    = 
						' 
						
						<h1 style="margin: 0px; color: blue; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-size: 27px;">
   									 X&Aacute;C NHẬN ĐỊA CHỈ EMAIL CỦA BẠN</h1>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;">Chào bạn,</span></p>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;">Cảm ơn bạn đã đăng ký sử dụng trang website Cognito.vn.</span></p>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;">Để hoàn thành đăng ký, vui lòng click vào đường link bên dưới để xác nhận:</span></p>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;">Email này được gửi tự động. Vui lòng không trả lời email này.</span></p>
						<div style="text-align:center">
						<b><a style="text-decoration: none; padding: 50px;" href="http://localhost/MAIN-COGNITO/?verification='.$code.'"> Link xác nhận </a></b>
						</div>
						<p style="font-size: 14px; line-height: 170%;">&nbsp;</p>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;">Trân trọng,</span></p>
						<p style="font-size: 14px; line-height: 170%;"><span style="font-size: 16px; line-height: 27.2px;"><em>Đội ngũ Cognito.</em></span></p>
						<p style="font-size: 14px; line-height: 170%;">&nbsp;</p>

						 ';

						$mail->send();
						echo 'Message has been sent';
					} catch (Exception $e) {
						echo "Không thể gửi mail! Địa chỉ email không tồn tại: {$mail->ErrorInfo}"; 
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
		<link rel="stylesheet" href="css/login.css">
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
						<input type="text" class="form-control" name="name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" placeholder="Họ và tên" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" name="email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" placeholder="Email" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Mật khẩu" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="confirm_password" value="<?php echo $_POST['confirm_password']; ?>" placeholder="Nhập lại mật khẩu" required>
					</div>

					<div class="form-holder">
						<span> Bạn là:</span> 
						<div style="padding-left: 70px">
						 <input type="radio" name="role" value="student"> Học sinh
						 <input type="radio" name="role" value="mentor"> Cố vấn học tập
						 <!-- <select name = "role">
							<option value="">----</option>
							<option value="student">Học sinh</option>
							<option value="mentor">Cố vấn học tập</option>
						 </select> -->
						 </div>
					</div>
					
					<button name="submit" >
						<span>Đăng ký</span>
					</button>
				</form>
				
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>