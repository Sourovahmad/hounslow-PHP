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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?ver=<?php echo time();?>" rel="stylesheet">
    
</head>

<body>
    <div class="whole">
        <!-- <section>
            <div class="container-background1">
                <div class="container">
                    
                    <div class="your-digital-id contact-img">
                        <img src="images/contact-baner-min_11zon.jpeg" alt="" />
                    </div>
                </div>
            </div>
        </section> -->
        <section>
            <div class="container">
                <div class="list-menu">
                    <ul>
                        <li> <span class="btn-span"><a href="./"><span>Home</span></a></span> </li>
                        <li> <span class="btn-span"><a href="./british-passport-photo.php"><span>British Passport Photo</span></a></span> </li>
                        <li> <span class="btn-span"><a href="./worldwide-passport-photo.php"><span>Worldwide Passport Photo</span></a></span> </li>
                        <li> <span class="btn-span"><a href="./about.php"><span>About Us</span></a></span> </li>
                        <li> <span class="btn-span active"><a href="./contact.php"><span>Contact Us</span></a></span> </li>
                        <li> <span class="btn-span"><a href="./blog.php"><span>Blogs</span></a></span> </li>
                    </ul>
                </div>
                
            </div>
            <div class="contact-banner">
                <h1>Contact Us</h1>
                <img src="images/contact-banner.jpg" alt="hounslow-passport-photoshop-digital-photo-for-online-passport-application" />
                
            </div>
            <div class="containercontact">
                <div class="container">
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
                            <h3 style="margin-top:0px;">Opening Times</h3>
                            <p>Thursday 10:00-7:30pm<br>
                                Friday 10:00-7:30pm<br>
                                Saturday 10:00-7:30pm<br>
                                Sunday 10.00-7:30pm<br>
                                Monday 10.00-7:30pm<br>
                                Tuesday 10:00-7:30pm<br>
                                Wednesday 10:00-7:30pm<br>
                            </p>
                            

                            <h4>Contact Information</h4>
                            <div class="mb-3 d-flex flex-wrap align-items-center">
                                <span class="spanclass">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="891.024px" height="891.024px" viewBox="0 0 891.024 891.024" style="enable-background:new 0 0 891.024 891.024;width: 20px;height: 20px;" xml:space="preserve">
                                        <g>
                                            <path d="M2.8,180.875c46.6,134,144.7,286.2,282.9,424.399c138.2,138.2,290.4,236.301,424.4,282.9c18.2,6.3,38.3,1.8,52-11.8   l92.7-92.7l21.6-21.6c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.4c-19.5-19.5-51.2-19.5-70.7,0l-38.899,38.9   c-20.2,20.2-52.4,22.2-75,4.6c-44.7-34.8-89-73.899-131.9-116.8c-42.9-42.9-82-87.2-116.8-131.9c-17.601-22.6-15.601-54.7,4.6-75   l38.9-38.9c19.5-19.5,19.5-51.2,0-70.7l-143.5-143.5c-19.5-19.5-51.2-19.5-70.7,0l-21.6,21.6l-92.7,92.7   C1,142.575-3.5,162.675,2.8,180.875z"/>
                                        </g>
                                    </svg>
                                </span><a href="tel:02087593688">02087593688</a>
                            </div>
                            <div class="mb-3 d-flex flex-wrap align-items-center">
                                <span class="spanclass">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 27.442 27.442" style="enable-background:new 0 0 27.442 27.442;width: 20px;height: 20px;" xml:space="preserve">
                                        <g>
                                            <path d="M19.494,0H7.948C6.843,0,5.951,0.896,5.951,1.999v23.446c0,1.102,0.892,1.997,1.997,1.997h11.546   c1.103,0,1.997-0.895,1.997-1.997V1.999C21.491,0.896,20.597,0,19.494,0z M10.872,1.214h5.7c0.144,0,0.261,0.215,0.261,0.481   s-0.117,0.482-0.261,0.482h-5.7c-0.145,0-0.26-0.216-0.26-0.482C10.612,1.429,10.727,1.214,10.872,1.214z M13.722,25.469   c-0.703,0-1.275-0.572-1.275-1.276s0.572-1.274,1.275-1.274c0.701,0,1.273,0.57,1.273,1.274S14.423,25.469,13.722,25.469z    M19.995,21.1H7.448V3.373h12.547V21.1z"/>
                                        
                                        </g>
                                    </svg>
                                </span><a href="tel: 07553949353">07553949353</a>
                            </div>
                            <div class="mb-3 d-flex flex-wrap align-items-center">
                                <span class="spanclass">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 474 474" style="enable-background:new 0 0 474 474;width: 20px;height: 20px;" xml:space="preserve">
                                        <g>
                                            <path d="M437.5,59.3h-401C16.4,59.3,0,75.7,0,95.8v282.4c0,20.1,16.4,36.5,36.5,36.5h401c20.1,0,36.5-16.4,36.5-36.5V95.8   C474,75.7,457.6,59.3,437.5,59.3z M432.2,86.3L239.5,251.1L46.8,86.3H432.2z M447,378.2c0,5.2-4.3,9.5-9.5,9.5h-401   c-5.2,0-9.5-4.3-9.5-9.5V104.9l203.7,174.2c0.1,0.1,0.3,0.2,0.4,0.3c0.1,0.1,0.3,0.2,0.4,0.3c0.3,0.2,0.5,0.4,0.8,0.5   c0.1,0.1,0.2,0.1,0.3,0.2c0.4,0.2,0.8,0.4,1.2,0.6c0.1,0,0.2,0.1,0.3,0.1c0.3,0.1,0.6,0.3,1,0.4c0.1,0,0.3,0.1,0.4,0.1   c0.3,0.1,0.6,0.2,0.9,0.2c0.1,0,0.3,0.1,0.4,0.1c0.3,0.1,0.7,0.1,1,0.2c0.1,0,0.2,0,0.3,0c0.4,0,0.9,0.1,1.3,0.1l0,0l0,0   c0.4,0,0.9,0,1.3-0.1c0.1,0,0.2,0,0.3,0c0.3,0,0.7-0.1,1-0.2c0.1,0,0.3-0.1,0.4-0.1c0.3-0.1,0.6-0.2,0.9-0.2c0.1,0,0.3-0.1,0.4-0.1   c0.3-0.1,0.6-0.2,1-0.4c0.1,0,0.2-0.1,0.3-0.1c0.4-0.2,0.8-0.4,1.2-0.6c0.1-0.1,0.2-0.1,0.3-0.2c0.3-0.2,0.5-0.3,0.8-0.5   c0.1-0.1,0.3-0.2,0.4-0.3c0.1-0.1,0.3-0.2,0.4-0.3L447,109.2V378.2z"/>
                                        </g>
                                    </svg>
                                </span>
                                <!-- <a href="mailto: info@royallondonproductphotography.com ">info@royallondonproductphotography.com</a> -->
                                <a href="mailto:contact@hounslowpassportphotoshop.co.uk">contact@hounslowpassportphotoshop.co.uk</a>
                            </div>
                        </div>
                
                        <div class="help-right">
                            <form name="message" method="post" action="">
                                <div class="mb-3 row">
                                    <!-- <label for="fname">Name</label> -->
                                    <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="fname" name="firstname" placeholder="Name">
                                    </div>
                                    <!-- <label for="lname">Email Address</label> -->
                                    <div class="col-12 col-sm-6 ">
                                        <input type="email" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <!-- <div class="mb-3 row">
                                    
                                    
                                </div> -->
                                <div class="mb-3 row">
                                    <!-- <label for="subject">Subject</label> -->
                                    <div class="col-12">
                                        <input type="text" id="subject" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="mb-3 row"> 
                                    <!-- <label for="Message">Message</label> -->
                                    <div class="col-12">
                                        <textarea id="message" name="message" placeholder="Message" style="height:100px"></textarea>
                                    </div>
                                </div>
                                <input id="send" name="submit" type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.833135590305!2d-0.41418258480090875!3d51.47957712055897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487672fb2da6d983%3A0x3cf9982a70ab95d7!2s756f%20Bath%20Rd%2C%20Cranford%2C%20Hounslow%20TW5%209TY%2C%20UK!5e0!3m2!1sen!2sin!4v1655882197330!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <section class="contact_content">
            <div class="inner-box-1">
                <div class="contact_content_list">
                    <b>Why Choose Hounslow For Online Passport Photos Near Me?</b>
                    <p>A trip abroad presents an exciting opportunity that allows you to explore the world and have fun. Unfortunately, if you do not have valid traveling documents, you may miss the opportunity to visit your dream cities or villages. So, planning and applying for a passport or visa on time may is critical.</p>
                    <p>Hounslow Photo Studio is thus, a one-stop shop for digital passport photos for passports and visa applications. The studio has a team of experts that edit and adjust digital passport photos for the applicants.  Also, the studio will process your HMRC code and digital photos for online applications. You may also choose to pick 6 printed passport photos from the studio if you live around Heathrow airport.  Alternatively, the studio may deliver the passport photos to your address the next day once you make the payment. </p>
                    <p>Of course, there are plenty of other places where you can have the passport photos prepared and printed. They include the Tesco, ASDA and Sainsbury Passport Photo Booths near me. Unfortunately, the home office often rejects passport photos from these booths. You may therefore need to partner with a reliable passport photo studio for all your online passport needs. Read on to see why you should choose Hounslow Photo Studio for your passport and visa photo editing and adjusting.</p>
                </div>
                <div class="contact_content_list">
                    <b>They Prepare Passports That Meet Requirements</b>
                    <p>For the Home Office to accept your passport photo when applying or renewing passports, the photo must meet the following requirements:</p>
                    <ul>
                        <li>It should measure 45mm x 35mm</li>
                        <li>It should be professional, clear and focused</li>
                        <li>It should be on a high-colored or white background without borders</li>
                        <li>It should neither have creases nor tears if it is a printed photo</li>
                        <li>Must clearly show the face, mouth closed but with plain expression</li>
                        <li>There should be no shadows behind or in front of your face</li>
                    </ul>
                    <p>Of course, finding a passport photo booth near me where you can take standard passport photos may not be a walk in the park. It requires that you spend some time researching. Plenty of photo booths will promise to print quality passport photos that meet the requirements. Unfortunately, the passports they send to you will be rejected and delay the processing of your passport. So the best thing you can do is to visit the Hounslow Photo Studio website and have your passport photos ready within hours. </p>
                    <p>The website requires that you take a passport photo using your smartphone and upload it. They will edit and adjust the photo to meet the minimum requirements. Do not worry about the background when taking a passport photo because Hounslow Photo Studio has a team of experts that will not only edit the photo for you but also remove and replace the background with a plain, colored, cream or white one.</p>
                    <p>The studio uses state of art equipment and hires professional human editors to work on your passport. As such, you expect to get better passport compared to what you can get from online apps. Also, the studio uses pro software to generate the HMRC code if you are applying for the passport online. It guarantees that the Home Office will not decline your passport application based on the photo. When you receive the HMRC code, all you should do is to pop it in and your passport photo will be added to the application.</p>
                    <p>Besides passport a photo, Hounslow Photo Studio prepares driving license and visa photos. Working with Hounslow Photo Studio guarantees that you will have your passport photo ready on time. The studio prepares quality digital passport photos which you can print online using its online builder to ensure they meet government regulations.</p>
                    <p>If you choose to take a photo using your smartphone, there are minimum requirements you will need to meet. Firstly, ensure that you face forward and have a neutral background. Also, follow the passport office guidelines to reduce instances of having your application rejected.</p>
                </div>
                <div class="contact_content_list">
                    <b>So Why Choose Hounslow Photo Studio?</b>
                    <p>The studio provides printed passport photos which can be delivered to you the next day if you live around Heathrow airport. Also, residents of Richmond upon Thames, TW2 postcodes and UB2 postcodes Ealing can pick up their passport photos two hours after they upload their passport photos on Hounslow website. Also, anyone in Hounslow, Southall and UB3 postcodes Hillingdon can have the passport photos delivered the next day. They can also pick up the photos from the studio two hours after they make the payment.</p>
                    <p>As one of the leading photo studios in the UK, Hounslow will not just send you the printed photo passports to your address but also the digital version to your email. This allows you to store  passport photos online for easy accessibility. Also, they are approve-guaranteed - meaning that the Home Office will not reject your application. It gives you peace of mind to know that your passport is being processed and will be ready in time for your trip abroad.</p>
                    <p>Thus, working with professionals like Hounslow Photo Studio is highly recommended. Do not waste your time trying to get your passport photos from photobooths such as the Tesco Passport Photo Booth Near Me. Get in touch now and talk to experts at Hounslow for your passport needs.  </p>
                </div>
            </div>
        </section>

    </div>
    <footer class="footer-bg">
        <div class="footer">
            <div class="container">
                <ul>
                    <li> <img src="images/address.png" alt="hounslow-passport-photoshop-address" /> <span> 756F bath Rd Cranford Middlesex TW5 TY Hounslow
                        </span></li>
                    <li> <img src="images/whatsapp.png" alt="hounslow-passport-photoshop-uk-whatsapp" /><span> : <a style="color:#8bc165;" href="tel:02087593688">02087593688</a> , <a style="color:#8bc165;" href="tel:07553949353">07553949353</a> </span> </li>
                    <li> <img src="images/mail.png" alt="hounslow-passport-photoshop-passport-mail" /> <span> : 
                        <!-- <a style="color:#8bc165;" href = "mailto: info@royallondonproductphotography.com ">info@royallondonproductphotography.com </a> -->
                        <a style="color:#8bc165;" href="mailto:contact@hounslowpassportphotoshop.co.uk">contact@hounslowpassportphotoshop.co.uk</a>
                    </span>
                    </li>
                    <li> <img src="images/map.png" alt="hounslow-passport-photoshop-uk-map" /> <span> : 
                        <a style="color:#8bc165;" href = "https://royallondonproductphotography.com/">Product Photography</a>
                         | 
                        <a style="color:#8bc165;" href = "https://www.pixelbrandstudio.com/">Remove background from image</a></span> </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>