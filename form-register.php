<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

  if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    // $subject = $_POST["subject"];
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);

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
     $mail->addAddress('huynhthanhthy275@gmail.com');

     $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Form MENTOR';
    $mail->Body    = 
    ' 
    <p>Name:  '.$name.'</p>
    <p>Email: '.$email.'</p>
    <p>Phone: '.$phone.'</p>
    <p>Message:  '.$message.'</p>
    <p>Subject:  '.$subject.'</p>
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
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

    <title>Cognito - Kết nối gia sư trực tuyến</title>
	<!-- LINEARICONS -->
    <link rel="stylesheet" href="fonts/linearicons/style.css">
		
    <!-- Main CSS-->
    <link href="css/form-register.css" rel="stylesheet" media="all">

    <script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="inner">
        <img src="images/image-1.png" alt="" class="image-1">
            <div class="card card-6">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <h3>ỨNG TUYỂN TRỞ THÀNH CỐ VẤN</h3>
                    <!-- <?php echo $msg; ?> -->
                        <!-- <div class="form-row">
                            <div class="name">Họ và tên</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" placeholder="Nguyễn Văn A"  required>
                            </div>
                        </div> -->

                    <!-- Tên -->
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" name="name" placeholder="Họ và tên" required>
					</div>
                    
                    <!-- Email -->
                    <div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					</div>

                    <!-- Số điện thoại -->
                    <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required>
					</div>

                    <!-- Trình độ học vấn -->
                    <div class="form-holder">
                        <span class="lnr lnr-graduation-hat"></span>
						<input type="text" class="form-control" name="student" placeholder="Trình độ học vấn hiện tại" required>
					</div>

                    <div class="form-holder" style="padding-bottom: 10px">
                        <span class="lnr lnr-bubble"></span>
                        <textarea type="text" class="form-control" name="message" placeholder="Tin nhắn..." required></textarea>
					</div>

                    <div class="form-holder">
                    <span class="lnr lnr-pencil"></span><span style="color: #666; font-family: Lato-Regular; font-size:14px; padding-left:25px;"> Môn học đăng ký dạy:</span> 
						<div style="padding-left: 180px">
                        <select name="subject" style="color: #666; font-family: Lato-Regular;">
                                        <option value="">---Chọn môn học---</option>
                                        <option value="Toán">Toán lớp 12</option>
                                        <option value="Văn" selected>Văn lớp 12</option>
                                        <option value="Anh">Anh lớp 12</option>
                                        <option value="Lý">Lý lớp 12</option>
                                        <option value="Hóa">Hóa lớp 12</option>
                                        <option value="Sinh">Sinh lớp 12</option>
                         </select>
						 </div>
					</div>
                        <!-- Upload CV -->
                        <div>
                            <div style="color: #666; font-family: Lato-Regular; padding-bottom:13px; padding-top:10px">
                            <span class="lnr lnr-paperclip"></span><span style="font-size: 14px">   Tải CV hay các tệp liên quan. Tối đa 50MB</span>
                            </div>    
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file" id="file">
                                    <label class="label--file" for="file">Chọn File</label>
                                    <span class="input-file__info">Chưa chọn file nào</span>
                                </div>
                        </div>

                        <button name="submit" >
						<span>Đăng ký</span>
					</button>
                    </form>
                </div>
              
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="js/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>