<!DOCTYPE html>
<html lang="zxx">
    <head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="assets/js/toastr.min.js"></script>
  <link href="assets/css/toastr.css" rel="stylesheet">

    </head>
    <body>
        
        <?php
//echo "test";
 
 //die();
        if (isset($_POST)) {
          $subject =  "Portfolio enquiry";
            $first_name = trim($_POST['name']);
			
            //echo trim($_POST['name']);//die();
            $email = trim($_POST['email']);
          
            
            $message = trim($_POST['message']);
            //echo $message;
        //die();
		
			
			

			
		           //echo trim($_POST['message']);die();
            require_once 'class-phpmailer1.php';
            require_once 'class-smtp1.php';
            $phpmailer = new PHPMailer();

            $phpmailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $phpmailer->IsSMTP(); // telling the class to use SMTP
            $phpmailer->SMTPAuth = true;
            $phpmailer->SMTPSecure = "ssl";
          // $phpmailer->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $phpmailer->Host = "smtp.gmail.com"; // SMTP server

            $phpmailer->Port = 465;
            $phpmailer->IsHTML(true);
            $phpmailer->Username = "dhiraj.21920116@viit.ac.in";
            $phpmailer->Password = "abc12345";
            $phpmailer->To = "dhirajgardi47@gmail.com";
            //$phpmailer->To = $to_email;
            //$phpmailer->AddCC('xformtech20@gmail.com', 'Pravin Jadhav');
            

            $phpmailer->AddReplyTo = $email;
            $phpmailer->CharSet = "UTF-8";
            $phpmailer->From = $email;
	
            $phpmailer->FromName = $first_name;
			
           $phpmailer->Subject = "Portfolio Enquiry";
            $phpmailer->Body .= "Hello Sir/Madam," . "<br><br>";
            $phpmailer->Body .= "<b>First Name:</b> " . $first_name. "<br>";
           //$phpmailer->Body .= "<b>Last Name:</b> " . $last_name. "<br>";
            $phpmailer->Body .= "<b>Email:</b> " . $email . "<br>";
		
			
            //$phpmailer->AddAttachment($file_tmp, $file_name);
            //$phpmailer->Body .="<b>Phone:</b> " . $phone . "<br>";
            $phpmailer->Body .= "<b>Message :</b> " . $message . "<br>" ;
			//$phpmailer->Body = "<b>attachment:</b> " . $file_name ;
            $phpmailer->WordWrap = 50; // set word wrap
            $phpmailer->AddAddress($phpmailer->To);



            if (!$phpmailer->Send()) {
						echo "<script language='javascript'>
			alert('Your enquiry not sent.')
        window.location.replace('https://dhiraj4647.github.io/dhiraj-gardi.github.io/');
            </script>";
				/* Redirect browser */
//header("Location: https://www.xform.in/index1.php");
 echo "Mailer Error: " . $phpmailer->ErrorInfo;
                echo "error occured";
exit(); 
            } else {
				echo "<script language='javascript'>
			alert('Your enquiry sent successfully.')
        window.location.replace('https://dhiraj4647.github.io/dhiraj-gardi.github.io/');
            </script>";
				/* Redirect browser */
//header("Location: https://www.xform.in/request.php");
exit();

                $emailSent = true;
            }
        }
        ?>
    </body>

</html>		
