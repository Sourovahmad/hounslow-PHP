<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, noarchive">
    <meta name="format-detection" content="telephone=no">
    <title>Royal Landan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
    <div class="whole">
   
    <section>
        <div class="container-background1">
            <div class="container">
                
                <div class="your-digital-id contact-img">
                    <img src="images/contact-baner-min_11zon.jpeg" alt="" />
                </div>
            </div>
        </div>
    </section>
	<section>
		<div class="container">
			<div class="list-menu">
                    <ul class="menuline">
                        <li> <span class="btn-span"><a href="./"> Home </a></span> </li>
                        <li> <span class="btn-span"><a href="./about.html"> About Us </a></span> </li>
                        <li> <span class="btn-span"> <a href="./hmrc-photo.php"> HMRC Photo Code </a></span> </li>
                        <li> <span class="btn-span"><a href="./blog.php"> Blogs </a></span> </li>
                        
                    </ul>
                </div>
			<div class="containercontact">
			   
			    <!--div class="cont_text">
			        Our customers are the most important part of our business. We always try to  our customers.
                    We are here to help Mon-Fri 9:00am – 6:00pm, and in the weekend from 10AM to 5PM If you have a question please get in touch with us 
			    </div-->       
			    
			      <?php
                      
                      if(isset($_POST["submit"])){
                        // Checking For Blank Fields..
                        if($_POST["firstname"]==""||$_POST["email"]==""||$_POST["subject"]==""||$_POST["message"]==""){
                        echo "Fill All Fields..";
                        }else{
                        // Check if the "Sender's Email" input field is filled out
                        $email=$_POST['email'];
                        // Sanitize E-mail Address
                        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
                        // Validate E-mail Address
                        $email= filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email){
                        echo "Invalid Sender's Email";
                        }
                        else{
                        $firstname = $_POST['firstname'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];
                        
                        require 'PHPMailerAutoload.php';

								$mail = new PHPMailer;


								$mail->isSMTP();                                      // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;                               // Enable SMTP authentication
								$mail->Username = 'info@royallondonproductphotography.com';                 // SMTP username
								$mail->Password = 'keuklawsaqicksbf';                           // SMTP password
								$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;                                    // TCP port to connect to

			   

								$mail->setFrom($email, $firstname); 
								$mail->addAddress('contact@hounslowpassportphotoshop.co.uk'); 
								$mail->addReplyTo($email);
			   
								$mail->isHTML(true);                                  // Set email format to HTML

								$mail->Subject = $subject;
								$mail->Body    = $message;
								//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

								if(!$mail->send()) {
									echo "<div class='msgerror'> Error this file extension is not allowed ! Please upload Correct file </div>";
									echo 'Mailer Error: ' . $mail->ErrorInfo;
								} else {
									echo "<div class='msgsuccess'>Your information is sent successfuly ! Thank you for Uploding </div>";
								}
								
						
                        }
                        }
                        }
                      
                      
                    ?>
                    <div class="help-bg">
			   <div class="help-left">
			         <span class="spanclass">Phone</span>: <a style="color:#8bc165;" href="tel:02087593688"> 02087593688</a> <br>
                     <span class="spanclass">Mobile</span>: <a style="color:#8bc165;" href="tel: 07553949353"> 07553949353</a><br>
                     <span class="spanclass">Email</span> : <a style="color:#8bc165;" href="mailto: info@royallondonproductphotography.com "> info@royallondonproductphotography.com</a><br>
                      <br>
				    <h3 style="margin-top:0px;">Opening Times</h3>
                    <p style="font-size:18px;line-height: 2;">Monday 09:30-18:30.<br>
                    Tuesday 09:30-18:30.<br>
                    Wednesday 09:30-18:30.<br>
                    Thursday 09:30-18:30.<br>
                    Friday 09:30-18:30.<br>
                    Saturday 09:30-18:30.<br>
                    Sunday 10.00-17.00 </p>
			   </div>
			   
			   <div class="help-right">
				  <form name="message" method="post" action="">
                    <label for="fname">Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="">
                
                    <label for="lname">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="">
                    
                    <label for="subject">Subject</label>
                     <input type="text" id="subject" name="subject" placeholder="">
                    
                    <label for="Message">Message</label>
                    <textarea id="message" name="message" placeholder="" style="height:200px"></textarea>
                
                    <input id="send" name="submit" type="submit" value="Submit">
                  </form>
			   </div>
			</div>
                  
                    
                </div>
		</div>
	</section>
    </div>
    <footer class="footer-bg">
        <div class="footer">
            <div class="container">
                <ul>
                    <li> <img src="images/address.png" alt="" /> <span> 756F bath Rd Cranford Middlesex TW5 TY Hounslow
                        </span></li>
                    <li> <img src="images/whatsapp.png" alt="" /><span> : <a style="color:#8bc165;" href="tel:02087593688">02087593688</a> , <a style="color:#8bc165;" href="tel:07553949353">07553949353</a> </span> </li>
                    <li> <img src="images/mail.png" alt="" /> <span> : <a style="color:#8bc165;" href = "mailto: info@royallondonproductphotography.com ">info@royallondonproductphotography.com </a></span>
                    </li>
                    <li> <img src="images/map.png" alt="" /> <span> : <a style="color:#8bc165;" href = "https://royallondonproductphotography.com/">Product Photography</a> | <a style="color:#8bc165;" href = "https://www.pixelbrandstudio.com/">Remove background from image</a></span> </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>