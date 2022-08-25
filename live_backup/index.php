<?php
include("functions.php");
// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, noarchive">
  <meta name="format-detection" content="telephone=no">
  <title>Royal London</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/cropper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/cropper.js"></script>

  <script src="js/countries.js"></script>
  <style>
    .cropper-face,
    .cropper-line,
    .cropper-point {

      box-shadow: 0 0 0 1px #39f;
      outline: 0;
      display: none !important;
    }

    .cropper-view-box {
      outline: 0 !important;

    }
  </style>
</head>
<script>
  // function readURL(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();

  //     reader.onload = function(e) {
  //       $('#blah')
  //         .attr('src', e.target.result)
  //         .width(380)
  //         .height(420)
  //         .show();
  //     };

  //     reader.readAsDataURL(input.files[0]);
  //   }
  // }
</script>

<body>
  <div class="whole">
    <header>
      <div class="header-bg">
        <div class="container">
          <div class="header-left">
            <div class="desktop">
              <div class="logo">
                <img src="images/logo.png" alt="logo" />
              </div>
              <div class="capture-moments">
                <span> Capture moments Right Now </span>
              </div>
            </div>
          </div>
          <div class="header-right">
            <!--ul>
                        <li> <a href="#"> Home </a> </li>
                        <li> <a href="#"> About us </a> </li>
                        <li> <a href="#"> Contact us </a> </li>

                    </ul-->
            <div class="professional">
              <h2>PROFESSIONAL</h2>
              <img src="images/logo2.png" alt="Photo Studio" />
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>
      <div class="container-background">
        <div class="container">
          <div class="list-menu">
            <ul>
              <li> <span class="btn-span"><a href="./hmrc-photo.php"> HMRC Photo Code </a></span> </li>
              <li> <span class="btn-span"><a href="./about.html"> About Us </a></span> </li>
              <li> <span class="btn-span"><a href="./contact.php"> Contact Us </a></span> </li>
            </ul>

          </div>
          <div class="passport-bg">
            <div>
              <img src="images/wifi-icon.png" alt="" />
            </div>
            <div>
              <h2> Passport </h2>
              <h3> Digital ID Photo </h3>
            </div>
          </div>
          <div class="your-digital-id">
            <img src="images/apply-for-uk.png" alt="" />
          </div>
          <div class="british-passport">
            <img src="images/passport.png" alt="" />
          </div>

        </div>

      </div>
    </section>
    <section class="inner-box-1">
      <div class="container">
        <div class="text-center">
          <h3>How it Works</h3>
        </div>
        <div>
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/-GuYWXKioi0" title="YouTube video" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">

      <?php
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"]) && $_SESSION['ogPhoto']  != "") {
        $allow = array("jpg", "jpeg", "gif", "png");

        $todir = 'uploads/';


        //echo  "the file has been moved correctly" ;
        //print_r($_FILES);
        $imgname = $_FILES['file']['name'];
        $imglink = "https://hounslowpassportphotoshop.co.uk/uploads/" . $imgname;
        $ogimg = '<img src="' . $_SESSION['ogPhoto'] . '" alt="" width="400">';
        $rmimg = '<img src="' . $_SESSION['rmPhoto'] . '" alt="" width="400">';
        $firstname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        //$message = 'Name = ' . $_POST['name'] .'\r\n Email = ' . $_POST['email'].'\r\n Phone = ' . $_POST['phone'].'\r\n Address = ' . $_POST['address'].'\r\n Photo Link = ' . $imglink .'\r\n'.$img ;
        $message = "<html>
                                <head>
                                <title>Image Info</title>
                                </head>
                                <body>
                                <p> Name = " . $_POST['name'] . "</p>
                                <p> Email = " . $_POST['email'] . "</p>
                                <p> Phone = " . $_POST['phone'] . "</p>
                                <p> Address = " . $_POST['address'] . "</p>
                                <p> Address Line 2 = " . $_POST['address2'] . "</p>
                                <p> Address Line 3 = " . $_POST['address3'] . "</p>
                                <p> City = " . $_POST['city'] . "</p>
                                <p> Region = " . $_POST['region'] . "</p>
                                <p> Postcode = " . $_POST['postcode'] . "</p>
                                <p> Country = " . $_POST['selCountry'] . "</p>
                                <p> Type of document = " .  $_POST['DocTypeActual'] . "</p>
                                <p> Photo original = <a href='" . $_SESSION['ogPhoto'] . "' download>Download</a></p>
                                <p> Photo removebk =  <a href='" . $_SESSION['rmPhoto'] . "' download>Download</a></p>
                                <p> Delivery Option = " . $_POST['delivery_option'] . "</p>
                                </body>
                                </html>";
        $subject = 'New Photo Uploaded';

        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@royallondonproductphotography.com';                 // SMTP username
        $mail->Password = 'keuklawsaqicksbf';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to



        $mail->setFrom($email, $firstname);

        // $mail->addAddress('alexm.pvt@gmail.com');
        $mail->addAddress('contact@hounslowpassportphotoshop.co.uk');
        $mail->addReplyTo($email);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'New Photo Uploaded';
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
          echo "<div class='msgerror'> Error this file extension is not allowed! Please upload Correct file </div>";
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          echo "<div class='msgsuccess'>Your information is sent successfuly! Thank you for Uploding </div>";
        }




        //$message = wordwrap($message, 70);
        // Send Mail By PHP Mail Function
        //mail("contact@hounslowpassportphotoshop.co.uk", $subject, $message, $headers);
        //echo "<div class='msgsuccess'>Your information is sent successfuly ! Thank you for Uploding </div>";
        // echo $message;
      }

      ?>
      <section class="inner-box-1 step1">
        <div class="text-center">
          <h3>Place your passport photo order here</h3>
        </div>
        <div class="help-bg-home">
          <div class="help-left">
            <form name="message" method="post" enctype="multipart/form-data">


              <label for="fname">Name <span class="required">*</span></label>
              <input type="text" id="fname" name="name" required placeholder="">

              <label for="email">Email Address <span class="required">*</span></label>
              <input type="email" id="email" name="email" required placeholder="">

              <label for="phone">Phone <span class="required">*</span></label>
              <input type="text" id="phone" required name="phone" placeholder="">

              <label for="address">Address Line 1 <span class="required">*</span></label>
              <input type="text" id="address" name="address" required placeholder="">

              <label for="address2">Address Line 2</label>
              <input type="text" id="address2" name="address2" placeholder="">

              <label for="address3">Address Line 3</label>
              <input type="text" id="address3" name="address3" placeholder="">

              <label for="city">Town/City <span class="required">*</span></label>
              <input type="text" id="city" name="city" required placeholder="">

              <label for="region">Region</label>
              <input type="text" id="region" name="region" placeholder="">

              <label onchange="document.getElementById('text_content').value=document.getElementById('selDocType').options[document.getElementById('selDocType').selectedIndex].text" for="postcode">Postcode <span class="required">*</span></label>
              <input type="text" id="postcode" name="postcode" required placeholder="">

              <label for="selCountry">Select Country <span class="required">*</span></label>
              <select id="selCountry" name="selCountry" class="form-control"></select>

              <label for="selDocType">Select Document <span class="required">*</span></label>
              <select onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text" id="selDocType" name="selDocType" class="form-control"></select>

              <input type="hidden" name="DocTypeActual" id="text_content" value="" />


          </div>

          <div class="help-right">
            <div class="cropper" style="max-width:405px;max-height:420px">

              <div id="ss" class="imgdiv">
                <img id="blah" src="images/blankimg.png" alt="your image" />
              </div>

            </div>
            <div align="right" class="mt-2">

            </div>


            <!-- <div style="display:none" id="result"></div> -->

            <!-- <input type="file" id="fileInput" accept="image/*" /> -->
            <!-- <input type="button" id="btnCrop" value="Crop" />
            <input type="button" id="btnRestore" value="Restore" /> -->
            <div class="input-group mb-3 pt-2">

              <input type="file" class="form-control widthcust" name="file" id="fileInput" accept="image/*">
              <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->


            </div>

            <label for="delivery_option">Delivery Option <span class="required">*</span></label><br>
            <div class="input-group mb-3 display_block" style="margin-top: 5px;">
              <input type="radio" id="HMRC_code" name="delivery_option" value="HMRC photo code" required>
              <label for="HMRC_code" class="radiobtn">HMRC passport photo code <span class="price">£6.99</span>(Uk Only)</label><br>
              <input type="radio" id="printed_photos" name="delivery_option" value="Six printed photos send to your address" required>
              <label for="printed_photos" class="radiobtn">Six printed passport photos send to your address <span class="price">£6.99</span>(Uk Only)</label><br>
              <input type="radio" id="send_to_mail" name="delivery_option" value="Passport digital photo send to email" required>
              <label for="send_to_mail" class="radiobtn">Passport digital photo send to email <span class="price">£7.99</span>(Worldwide)</label>
            </div>
            <input id="send" name="submit" type="submit" value="Submit">
            <!-- <button class="btn btn-lg btn-warning">Restart</button> -->
            <!-- Button trigger modal -->

            </form>
          </div>
        </div>

      </section>






    </div>
    <section class="bg_black">
      <div class="container1">
        <div class="professional-bg">
          <h2><a href="https://www.pixelbrandstudio.com/upload"><button class="btnhref">Remove your passport photo background automatically <img src="images/3d_arrows.gif" alt="" /></button>
            </a> </h2>
        </div>

    </section>

    <section class="inner-box-1 showon1">
      <div class="container3">
        <div class="header-left">
          <div class="professional">
            <h2>HMRC passport photo code will send to your email within 2 hours</h2>
          </div>
        </div>
        <div class="header-left">
          <div class="professional">
            <h2>Six print passport photos next day delivery uk</h2>
          </div>
        </div>
        <div class="header-left">
          <div class="professional">
            <h2>if you are close to our studio come to our studio </h2>
          </div>
        </div>
      </div>
    </section>

    <section class="inner-box-1">
      <div class="container">
        <div class="text-center">
          <h3>Hounslow Photography Studio Q&A</h3>
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                1. How do I use Hounslow photo studio?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                If your phone has a camera capable of producing clear photos, use it to take a snap and upload it to the Hounslow Photo Studio website.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                2. What kind of information will I be required to provide when applying for Hounslow Photography Studio services?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                The Hounslow Photography studio website has a form which your name, email address, phone number, town/city of residence, and postcode before using the service.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                3. Can Hounslow Photography Studio guarantee good quality passport photos?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We use pro software and our technicians are thorough.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                4. Can Hounslow photography studio really provide a quick and reliable solution for my passport photo needs?
              </button>
            </h2>
            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Yes. Our services save you from having to use non-professional applications that often result in low-quality passport photographs.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                5. How do I pay for Hounslow Photography Studio services?
              </button>
            </h2>
            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Once the passport photos are ready, we send an email to our client with an invoice and instructions on how to pay.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingsix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                6. Are there any hidden fees?
              </button>
            </h2>
            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We avoid hidden fees as part of our focus on authenticity and transparency.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingseven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                7. How fast can I get my passport photos delivered?
              </button>
            </h2>
            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We aim to deliver as fast as possible for additional customer satisfaction. We have next-day delivery once payment is made.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading8">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                8. How do I get the passport photos once they are ready?
              </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We will deliver 6 printed copies of your passport photo to your doorstep. We will also provide you with a digital copy which will be sent through email.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading9">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                9. Is there a risk of rejection by HMRC?
              </button>
            </h2>
            <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We will also send the HMRC code which will guarantee that your passport photo will not be rejected.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading10">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                10. Can I really access Hounslow Photography services on the internet?
              </button>
            </h2>
            <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Yes, our services are tailored to provide quick access via the internet.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading11">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                11. What is the difference between Hounslow Photography studio and other avenues?
              </button>
            </h2>
            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We use pro software which ensures that your passport photos will not be rejected by HMRC.
              </div>
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
          <li> <img src="images/address.png" alt="" /> <span> 756F bath Rd Cranford Middlesex TW5 TY <a style="color:#8bc165;" href="https://hounslowpassportphotoshop.co.uk/visa-photo.html">Hounslow</a>
            </span></li>
          <li> <img src="images/whatsapp.png" alt="" /><span> : <a style="color:#8bc165;" href="tel:02087593688">02087593688</a> , <a style="color:#8bc165;" href="tel:07553949353">07553949353</a> </span> </li>
          <li> <img src="images/mail.png" alt="" /> <span> : <a style="color:#8bc165;" href="mailto: info@royallondonproductphotography.com ">info@royallondonproductphotography.com </a></span>
          </li>
          <li> <img src="images/map.png" alt="" /> <span> : <a style="color:#8bc165;" href="https://royallondonproductphotography.com/">Product Photography</a> | <a style="color:#8bc165;" href="https://www.pixelbrandstudio.com/">Remove background from image</a></span> </li>
        </ul>
      </div>
    </div>
  </footer>

  <style>
    .img-container img {
      max-width: 100%;
    }
  </style>
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Upload Image</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
          <!-- </button> -->
        </div>
        <div class="modal-body p-0">
          <div class="img-container">
            <img id="image" src="images/blankimg.png" style="max-height:500px;">
          </div>
        </div>
        <div class="modal-footer">
          <!-- <form class="paypal" action="payments.php" method="post" id="paypal_form">
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="lc" value="UK" />
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
            <input type="hidden" name="first_name" value="Customer's First Name" />
            <input type="hidden" name="last_name" value="Customer's Last Name" />
            <input type="hidden" name="payer_email" value="customer@example.com" />
            <input type="hidden" name="item_number" value="123456" />
            <input type="submit" name="submit" value="Submit Payment" />
          </form> -->
          Progress
          <div class="progress" style="min-width:50%">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
          </div>
          <button type="button" class="btn btn-secondary Cancel" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Continue ></button>
        </div>
      </div>
    </div>
  </div>


</body>




<script>
  $.get("https://ipinfo.io", function(response) {
    var CountryCode = response.country;
    sessionStorage.setItem("CountryCode", CountryCode);
  }, "jsonp");
</script>
<!-- <script type="text/javascript" src="https://visafoto.com/js/country/en.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.3/cropper.js"></script> -->

<script type="text/javascript">
  var word = /([-+]?[0-9]*\.?[0-9]+[\/\+\-\x])+([-+]?[0-9]*\.?[0-9]+)/gm;

  $("#selDocType").on("change", function() {

    var content = $('option:selected', this).text().replace(",", "");
    var match = word.exec(content);
    /* text.replace("Microsoft", "W3Schools") */
    console.log(content);
    console.log(match);
    if (match) {
      var total = match[0];
      var width = match[1].replace("x", "");
      var height = match[2].replace("x", "");
      console.log(total + '<br>' + width + '<br>' + height);
      // $("#result").html(total + '<br>' + width + '<br>' + height);
    }

  });


  // $('#fileInput').on('change', function() {

  var avatar = document.getElementById('blah');
  var image = document.getElementById('image');
  var input = document.getElementById('fileInput');
  var $progress = $('.progress');
  var $progressBar = $('.progress-bar');
  var $alert = $('.alert');
  var $modal = $('#modal');
  var cropper;



  $(".Cancel").on("click", function(e) {
    e.preventDefault();
    $modal.modal('hide');
  });


  // $('[data-toggle="tooltip"]').tooltip();
  // $('#fileInput').on('change', function() {

  input.addEventListener('change', function(e) {
    var files = e.target.files;
    var done = function(url) {
      input.value = '';
      image.src = url;
      $alert.hide();
      $modal.modal('show');
      $modal.modal({
        backdrop: 'static',
        keyboard: false
      })
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function(e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
  });
  var new_width = '240';
  var new_height = '240';
  $modal.on('shown.bs.modal', function() {
    $modal.modal({
      backdrop: 'static',
      keyboard: false
    });

    cropper = new Cropper(image, {
      // aspectRatio: 2 / 2,
      // maxCropBoxWidth: new_width,
      // maxCropBoxHeight: new_height,
      // minCropBoxWidth: new_width,
      // minCropBoxHeight: new_height,
      // dragMode: 'move',
      guides: false,
      center: true,
      highlight: false,
      toggleDragModeOnDblclick: false,
      // cropBoxMovable: false,
      autoCropArea: 1,
      // autoCropArea: ,
      // data: { //define cropbox size
      //   width: new_width,
      //   height: new_height,
      // },
      rotatable: false,
      movable: false,
      // scalable: false,
      background: false,
      modal: true,
      // zoomable: false,
      // zoomOnTouch: false,
      // zoomOnWheel: false,
      // wheelZoomRatio: false,
      // cropBoxResizable: false,
      toggleDragModeOnDblclick: false,
      viewMode: 1,
    });
  }).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
  });

  document.getElementById('crop').addEventListener('click', function() {
    var initialAvatarURL;
    var canvas;

    var contData = cropper.getContainerData(); //Get container data
    cropper.setCropBoxData({
      height: contData.height,
      width: contData.width
    }) //set data
    if (cropper) {
      canvas = cropper.getCroppedCanvas({
        width: contData.height,
        height: contData.width,

      });
      initialAvatarURL = avatar.src;

      $progress.show();
      $alert.removeClass('alert-success alert-warning');
      canvas.toBlob(function(blob) {
        var formData = new FormData();

        formData.append('avatar', blob, 'avatar.jpg');
        $.ajax('functions.php', {
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,

          xhr: function() {
            var xhr = new XMLHttpRequest();

            xhr.upload.onprogress = function(e) {
              var percent = '0';
              var percentage = '0%';

              if (e.lengthComputable) {
                percent = Math.round((e.loaded / e.total) * 100);
                percentage = percent + '%';
                $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
              }
            };

            return xhr;
          },

          success: function(data) {
            avatar.src = data;
            console.log(data);
            $alert.show().addClass('alert-success').text('Upload success');
            $modal.modal('hide');

          },

          error: function() {
            avatar.src = canvas.toDataURL();

            // avatar.src = initialAvatarURL;
            $alert.show().addClass('alert-warning').text('Upload error');
          },

          complete: function() {
            $progress.hide();
          },
        });
      });
    }
  });







  // var canvas = $("#canvas"),
  //   context = canvas.get(0).getContext("2d"),
  //   $result = $('#result');

  // $('#fileInput').on('change', function() {
  //   if (this.files && this.files[0]) {
  //     if (this.files[0].type.match(/^image\//)) {
  //       $("#exampleModal").modal('show');

  //       var reader = new FileReader();
  //       reader.onload = function(evt) {
  //         var img = new Image();
  //         img.onload = function() {
  //           context.canvas.height = img.height;
  //           context.canvas.width = img.width;
  //           context.drawImage(img, 0, 0);
  //           var cropper = canvas.cropper({
  //             aspectRatio: 2 / 2,
  //             viewMode: 1,
  //             autoCropArea: 1,
  //             scalable: false
  //           });
  //           $('#btnCrop').click(function() {
  //             var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
  //             // $result.append($('<img>').attr('src', croppedImageDataURL));
  //             $("#blah").attr('src', croppedImageDataURL);
  //             $("#exampleModal").modal('hide');
  //             cropper.destroy();
  //           });
  //           $('#btnRestore').click(function() {
  //             canvas.cropper('reset');
  //             $result.empty();

  //           });
  //         };
  //         img.src = evt.target.result;
  //       };
  //       reader.readAsDataURL(this.files[0]);
  //     } else {
  //       alert("Invalid file type! Please select an image file.");
  //     }
  //   } else {
  //     alert('No file(s) selected.');
  //   }
  // });


  // $("#send").click(function(e) {
  //   e.preventDefault();
  //   $(".step1").fadeOut("slow");
  //   $(".step2").fadeIn("fast");


  // });
  console.log(sessionStorage.getItem("CountryCode"));

  var SelectionUI = {
    country: null,
    countryNeeded: sessionStorage.getItem("CountryCode"),
    userDocType: 'za_smart_id_card',
    docTypes: {
      "US": {
        "code": "US",
        "docs": [{
          "code": "us_visa",
          "docType": "visa",
          "name": "US Visa 2x2 inch (600x600 px, 51x51mm)"
        }, {
          "code": "us_passport",
          "docType": "passport",
          "name": "US Passport 2x2 inch (51х51 mm)"
        }, {
          "code": "us_diversity_visa_lottery",
          "docType": "visa",
          "name": "US Diversity Visa (DV) Lottery"
        }, {
          "code": "us_green_card",
          "docType": "visa",
          "name": "US Green Card (Permanent Resident) 2x2\""
        }, {
          "code": "us_citizenship",
          "docType": "id",
          "name": "US Citizenship (naturalization) 2x2 inch (51x51 mm)"
        }, {
          "code": "us_employment_authorization",
          "docType": "id",
          "name": "US Employment Authorization 2x2 inch (51x51 mm)"
        }, {
          "code": "us_ny_gun",
          "docType": "other",
          "name": "US NY Gun License 1.5x1.5 inch"
        }, {
          "code": "us_metrocard",
          "docType": "other",
          "name": "US NY MTA Metrocard for Seniors"
        }, {
          "code": "us_cchi",
          "docType": "id",
          "name": "USA CCHI ID badge 3x3 inch"
        }, {
          "code": "us_crew_visa",
          "docType": "visa",
          "name": "USA crew visa 2x2 inch"
        }, {
          "code": "us_petition_for_alien_relative_form_i_130",
          "docType": "visa",
          "name": "USA Form I-130 2x2 inch"
        }, {
          "code": "us_bar_examination",
          "docType": "other",
          "name": "USA bar examination 300x300 pixels"
        }, {
          "code": "us_padi_certification_card",
          "docType": "other",
          "name": "USA PADI certification card 45x57 mm (1.75x2.25 inch)"
        }, {
          "code": "us_nursing_license",
          "docType": "other",
          "name": "USA Nursing License 2x2 inch"
        }, {
          "code": "us_reentry_permit",
          "docType": "visa",
          "name": "USA Re-entry Permit 2x2 inch"
        }, {
          "code": "us_welding_certification",
          "docType": "other",
          "name": "USA welding certificate 2x2 inch"
        }, {
          "code": "us_foid_card_1_25x1_5",
          "docType": "other",
          "name": "USA FOID 1.25x1.5 inch"
        }, {
          "code": "us_advance_parole",
          "docType": "visa",
          "name": "USA advance parole 2x2 inch"
        }, {
          "code": "us_cibt",
          "docType": "visa",
          "name": "CIBTvisas visa photo (any country)"
        }, {
          "code": "us_visacentral",
          "docType": "visa",
          "name": "VisaCentral visa photo (any country)"
        }, {
          "code": "us_travisa",
          "docType": "visa",
          "name": "Travisa visa photo (any country)"
        }, {
          "code": "us_visahq",
          "docType": "visa",
          "name": "VisaHQ visa photo (any country)"
        }, {
          "code": "us_visa_headquarters",
          "docType": "visa",
          "name": "Visa Headquarters visa photo (any country)"
        }]
      },
      "CA": {
        "code": "CA",
        "docs": [{
          "code": "ca_visa",
          "docType": "visa",
          "name": "Canada Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ca_visa_temp_resident",
          "docType": "visa",
          "name": "Canada Temporary Resident Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ca_passport",
          "docType": "passport",
          "name": "Canada Passport 5x7 cm (715x1000 - 2000x2800)"
        }, {
          "code": "ca_permanent_resident_card",
          "docType": "id",
          "name": "Canada Permanent Resident Card 5x7 cm (715x1000 - 2000x2800)"
        }, {
          "code": "ca_citizenship",
          "docType": "id",
          "name": "Canada Citizenship 5x7 cm (50x70mm)"
        }, {
          "code": "ca_firearms_licence_280x370_px",
          "docType": "other",
          "name": "Canada firearms licence 280x370 px"
        }, {
          "code": "ca_firearms_licence_45x57",
          "docType": "other",
          "name": "Canada firearms licence 45x57 mm"
        }, {
          "code": "ca_indian_status_card",
          "docType": "other",
          "name": "Canada indian status 5x7 cm"
        }, {
          "code": "ca_quebec_health_insurance_card",
          "docType": "other",
          "name": "Canada Health Insurance card of Quebec 5x7 cm"
        }, {
          "code": "ca_personnel_screening",
          "docType": "other",
          "name": "Canada personnel screening 43x54 mm"
        }, {
          "code": "ca_security_guard_licence",
          "docType": "other",
          "name": "Canada security licence 5x7 cm"
        }]
      },
      "GB": {
        "code": "GB",
        "docs": [{
          "code": "gb_passport_online",
          "docType": "passport",
          "name": "UK Passport online"
        }, {
          "code": "gb_passport",
          "docType": "passport",
          "name": "UK Passport offline 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "gb_visa",
          "docType": "visa",
          "name": "UK Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "gb_driving",
          "docType": "driving",
          "name": "UK Driving Licence 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "gb_id_card_45x35mm",
          "docType": "id",
          "name": "UK ID / residence card 45x35 mm (4.5x3.5 cm)"
        }, {
          "code": "gb_child_passport_online",
          "docType": "passport",
          "name": "UK child passport online"
        }, {
          "code": "gb_gun",
          "docType": "other",
          "name": "UK BASC Firearms / Shotgun Licensing 35x45 mm"
        }, {
          "code": "gb_bus_pass_online",
          "docType": "other",
          "name": "UK Bus pass online form"
        }, {
          "code": "gb_bus_pass_offline",
          "docType": "other",
          "name": "UK bus pass 35x45 mm"
        }, {
          "code": "gb_freedom_pass",
          "docType": "other",
          "name": "London Freedom pass 35x45 mm"
        }, {
          "code": "gb_railcard",
          "docType": "other",
          "name": "UK Railcard 35x45 mm"
        }, {
          "code": "gb_oyster_travelcard",
          "docType": "other",
          "name": "Oyster travel photocard"
        }, {
          "code": "gb_seaman_discharge_book",
          "docType": "id",
          "name": "British Seaman's discharge book 35x45 mm"
        }, {
          "code": "gb_seaman_card",
          "docType": "id",
          "name": "British Seaman's card 35x45 mm"
        }, {
          "code": "gb_boat_licence",
          "docType": "other",
          "name": "UK Boat licence 35x45 mm"
        }, {
          "code": "gb_leisure_pass",
          "docType": "other",
          "name": "UK Leisure pass 35x45 mm"
        }, {
          "code": "gb_taxicard",
          "docType": "other",
          "name": "UK Taxicard 35x45 mm"
        }, {
          "code": "gb_school_card",
          "docType": "other",
          "name": "UK School card 35x45 mm"
        }]
      },
      "EU": {
        "code": "EU",
        "docs": [{
          "code": "eu_visa",
          "docType": "visa",
          "name": "Schengen Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "eu_blue_card",
          "docType": "id",
          "name": "EU Blue Card 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "RU": {
        "code": "RU",
        "docs": [{
          "code": "ru_passport_int",
          "docType": "passport",
          "name": "Russia International Passport Gosuslugi.ru, 35x45 mm"
        }, {
          "code": "ru_passport_int2",
          "docType": "passport",
          "name": "Russia International Passport offline, 35x45 mm"
        }, {
          "code": "ru_passport",
          "docType": "passport",
          "name": "Russia Internal Passport, 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ru_passport_gosuslugi",
          "docType": "passport",
          "name": "Russia internal Passport for Gosuslugi, 35x45 mm"
        }, {
          "code": "ru_passport_head12mm",
          "docType": "passport",
          "name": "Russia Passport (eyes to bottom of chin 12 mm), 35x45 mm"
        }, {
          "code": "ru_pension",
          "docType": "id",
          "name": "Russia Pensioner ID 3x4"
        }, {
          "code": "ru_pension_21x30",
          "docType": "id",
          "name": "Russia Pensioner ID 21x30 for Gosuslugi.ru"
        }, {
          "code": "ru_driving_gosuslugi",
          "docType": "driving",
          "name": "Russia Driving License Gosuslugi 245x350 px"
        }, {
          "code": "ru_army",
          "docType": "id",
          "name": "Russia Army ID 3x4"
        }, {
          "code": "ru_work",
          "docType": "id",
          "name": "Russia Work Permit 3x4"
        }, {
          "code": "ru_medical",
          "docType": "other",
          "name": "Russia Medical Book 3x4"
        }, {
          "code": "ru_temp_resid",
          "docType": "other",
          "name": "Russia Temporary Residence 3x4"
        }, {
          "code": "ru_student",
          "docType": "id",
          "name": "Russia Student ID 3x4"
        }, {
          "code": "ru_student_25x35",
          "docType": "id",
          "name": "Russia Student ID 25x35 mm (2.5x3.5 cm)"
        }, {
          "code": "ru_visa",
          "docType": "visa",
          "name": "Russia Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ru_evisa",
          "docType": "visa",
          "name": "Russia e-visa 450x600 pixels"
        }, {
          "code": "ru_visa_vfs_35x45mm",
          "docType": "visa",
          "name": "Russia visa via VFSGlobal 35x45 mm"
        }, {
          "code": "ru_citizenship_35x45",
          "docType": "id",
          "name": "Russia citizenship 35x45 mm"
        }, {
          "code": "ru_citizenship_3x4_cm",
          "docType": "id",
          "name": "Russia citizenship 3x4 cm"
        }, {
          "code": "ru_okhotnichiy_bilet_3x4cm",
          "docType": "other",
          "name": "Russia Hunting License 3x4 cm"
        }, {
          "code": "ru_karta_moskvicha",
          "docType": "id",
          "name": "Moscow social card 3x4 cm"
        }, {
          "code": "ru_karta_ates",
          "docType": "id",
          "name": "Russian APEC Business Travel Card 4x6 cm"
        }, {
          "code": "ru_fan_id",
          "docType": "id",
          "name": "Russian Fan ID 420x525 pixels"
        }, {
          "code": "ru_estr",
          "docType": "driving",
          "name": "Russian ESTR card 394x506 px"
        }, {
          "code": "ru_udostovereniye_lichnosti_moryaka",
          "docType": "id",
          "name": "Russia ULM 3x4 cm"
        }, {
          "code": "ru_morehodnaya_knizhka_3x4cm",
          "docType": "id",
          "name": "Russia Seaman’s book 3x4 cm"
        }, {
          "code": "ru_ekarta",
          "docType": "other",
          "name": "EKARTa 420х525 pixels"
        }, {
          "code": "ru_voditelskiye_prava_21x30",
          "docType": "driving",
          "name": "Russia driving license 21x30 mm"
        }]
      },
      "HR": {
        "code": "HR",
        "docs": [{
          "code": "hr_osobna_iskaznica_35x45mm",
          "docType": "id",
          "name": "Croatia ID card (Osobna iskaznica) 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "hr_visa",
          "docType": "visa",
          "name": "Croatia Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "hr_driving_license",
          "docType": "driving",
          "name": "Croatia driving license 35x45 mm"
        }, {
          "code": "hr_passport",
          "docType": "passport",
          "name": "Croatia passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "UA": {
        "code": "UA",
        "docs": [{
          "code": "ua_passport",
          "docType": "passport",
          "name": "Ukraine Internal Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ua_passport_int",
          "docType": "passport",
          "name": "Ukraine International Passport (Child Information)"
        }, {
          "code": "ua_driving",
          "docType": "driving",
          "name": "Ukraine Driving License"
        }, {
          "code": "ua_visa_online",
          "docType": "visa",
          "name": "Ukraine Visa online 450x600 px"
        }, {
          "code": "ua_visa",
          "docType": "visa",
          "name": "Ukraine Visa 3x4 cm (30x40 mm)"
        }, {
          "code": "ua_childs_int_passport_10x15cm",
          "docType": "passport",
          "name": "Ukraine child's international passport 10x15 cm"
        }, {
          "code": "ua_pasport_moryaka",
          "docType": "id",
          "name": "Ukraine Seafarer's Identity document 35x45 mm"
        }, {
          "code": "ua_residence",
          "docType": "visa",
          "name": "Ukraine residence 35x45 mm"
        }]
      },
      "BY": {
        "code": "BY",
        "docs": [{
          "code": "by_passport",
          "docType": "passport",
          "name": "Belarus Passport 40x50 mm (4x5 cm)"
        }, {
          "code": "by_visa",
          "docType": "visa",
          "name": "Belarus Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "by_citizenship",
          "docType": "id",
          "name": "Belarus citizenship 3x4 cm"
        }, {
          "code": "by_residence",
          "docType": "visa",
          "name": "Belarus residence 4x5 cm"
        }, {
          "code": "by_driving_license",
          "docType": "driving",
          "name": "Belarus driving license 4x5 cm"
        }]
      },
      "ZZ": {
        "code": "ZZ",
        "docs": [{
          "code": "zz_30x40",
          "docType": "other",
          "name": "Photo 30x40 mm (3x4 cm)"
        }, {
          "code": "zz_1x1",
          "docType": "other",
          "name": "Photo 1x1 inch (2.5x2.5 cm)"
        }, {
          "code": "zz_15x15",
          "docType": "other",
          "name": "Photo 1.5x1.5 inch (38x38 mm, 3.8x3.8 cm)"
        }, {
          "code": "zz_35x45",
          "docType": "other",
          "name": "Photo 35x45 mm (aligned by the top) (3.5x4.5 cm)"
        }, {
          "code": "zz_biometric_passport",
          "docType": "passport",
          "name": "Biometric passport photo"
        }, {
          "code": "zz_35x45_2",
          "docType": "other",
          "name": "Photo 35x45 mm (aligned by the eye line) (3.5x4.5 cm)"
        }, {
          "code": "zz_one_cun",
          "docType": "other",
          "name": "Photo one cun (25x35 mm, 295x413 px)"
        }, {
          "code": "zz_one_big_cun",
          "docType": "other",
          "name": "Photo one big cun 33x48 mm, 390x567 px"
        }, {
          "code": "zz_small_one_cun",
          "docType": "other",
          "name": "Photo one small cun (22x32 mm, 260x378 px)"
        }, {
          "code": "zz_two_small_cun",
          "docType": "other",
          "name": "Photo two small cuns (35x45 mm, 413x531 px)"
        }, {
          "code": "zz_two_cuns",
          "docType": "other",
          "name": "Photo two cuns 35x53 mm, 413x626 px"
        }, {
          "code": "zz_358x441px",
          "docType": "other",
          "name": "Photo 358x441 pixels"
        }, {
          "code": "zz_25x35",
          "docType": "other",
          "name": "Photo 25x35 mm (2.5x3.5 cm)"
        }, {
          "code": "zz_35x35",
          "docType": "other",
          "name": "Photo 35x35 mm (3.5x3.5 cm)"
        }, {
          "code": "zz_2x2",
          "docType": "other",
          "name": "Photo 2x2 inch (51x51 mm, 5x5 cm)"
        }, {
          "code": "zz_40x60",
          "docType": "other",
          "name": "Photo 40x60 mm (4x6 cm)"
        }, {
          "code": "zz_15x2",
          "docType": "other",
          "name": "Photo 1.5x2 inch (3.8x5 cm)"
        }, {
          "code": "zz_2x2_75",
          "docType": "other",
          "name": "Photo 2x2.75 inch (2 x 2 3/4\", about 5x7 cm)"
        }, {
          "code": "zz_40x50",
          "docType": "other",
          "name": "Photo 40x50 mm (4x5 cm)"
        }, {
          "code": "zz_50x70",
          "docType": "other",
          "name": "Photo 50x70 mm (5x7 cm)"
        }, {
          "code": "zz_33x48",
          "docType": "other",
          "name": "Photo 33x48 mm (3.3x4.8 cm)"
        }, {
          "code": "zz_4x4_cm",
          "docType": "other",
          "name": "Photo 4x4 cm (40x40 mm)"
        }, {
          "code": "zz_26x32mm",
          "docType": "other",
          "name": "Photo 26x32 mm"
        }, {
          "code": "zz_35x50",
          "docType": "other",
          "name": "Photo 35x50 mm (3.5x5 cm)"
        }, {
          "code": "zz_43x55",
          "docType": "other",
          "name": "Photo 43x55 mm (4.3x5.5 cm)"
        }, {
          "code": "zz_2x3cm",
          "docType": "other",
          "name": "Photo 2x3 cm (20x30 mm)"
        }, {
          "code": "zz_38x46",
          "docType": "other",
          "name": "Photo 38x46 mm (3.8x4.6 cm)"
        }, {
          "code": "zz_45x45",
          "docType": "other",
          "name": "Photo 45x45 mm (4.5x4.5 cm)"
        }, {
          "code": "zz_5x5",
          "docType": "other",
          "name": "Photo 50x50 mm (5x5 cm)"
        }, {
          "code": "zz_25x25mm",
          "docType": "other",
          "name": "Photo 25x25 mm (2.5x2.5 cm)"
        }, {
          "code": "zz_25x30",
          "docType": "other",
          "name": "Photo 25x30 mm (2.5x3 cm)"
        }, {
          "code": "zz_37x37",
          "docType": "other",
          "name": "Photo 37x37 mm"
        }, {
          "code": "zz_40x45",
          "docType": "other",
          "name": "Photo 4x4.5 cm (40x45 mm)"
        }, {
          "code": "zz_35x40mm",
          "docType": "other",
          "name": "Photo 35x40 mm (3.5x4 cm)"
        }, {
          "code": "zz_2x2_1mb",
          "docType": "other",
          "name": "2x2 inch photo (about 1 MB in size)"
        }, {
          "code": "zz_3x3cm",
          "docType": "other",
          "name": "Photo 3x3 cm (30x30 mm)"
        }, {
          "code": "zz_32x42_mm",
          "docType": "other",
          "name": "Photo 32x42 mm"
        }, {
          "code": "zz_30x35",
          "docType": "other",
          "name": "Photo 30x35 mm"
        }, {
          "code": "zz_6x9_cm",
          "docType": "other",
          "name": "Photo 6x9 cm"
        }, {
          "code": "zz_iata_id_card",
          "docType": "id",
          "name": "IATA ID card 35x45 mm"
        }, {
          "code": "zz_2x2_cm",
          "docType": "other",
          "name": "Photo 2x2 cm"
        }, {
          "code": "zz_50x65_mm",
          "docType": "other",
          "name": "Photo 5x6.5 cm"
        }, {
          "code": "zz_45x60_mm",
          "docType": "other",
          "name": "Photo 4.5x6 cm"
        }, {
          "code": "zz_resume_2x2_inch",
          "docType": "other",
          "name": "Resume Photo 2x2 inch"
        }, {
          "code": "zz_resume_35x45_mm",
          "docType": "other",
          "name": "Resume Photo 35x45 mm"
        }, {
          "code": "zz_45x57_mm",
          "docType": "other",
          "name": "Photo 45x57 mm"
        }, {
          "code": "zz_school_pass_35x45_mm",
          "docType": "other",
          "name": "School pass 35x45 mm"
        }, {
          "code": "zz_work_pass_35x45_mm",
          "docType": "other",
          "name": "Work pass 35x45 mm"
        }, {
          "code": "zz_600x800_pixel",
          "docType": "other",
          "name": "Photo 600x800 pixel"
        }, {
          "code": "zz_43x54_mm",
          "docType": "other",
          "name": "Photo 43x54 mm"
        }, {
          "code": "zz_240x288_pixel",
          "docType": "other",
          "name": "Photo 240x288 pixels"
        }, {
          "code": "zz_2x2_5_inch",
          "docType": "other",
          "name": "Photo 2x2.5 inch"
        }, {
          "code": "zz_1_25x1_5_inch",
          "docType": "other",
          "name": "Photo 1.25x1.5 inch"
        }, {
          "code": "zz_9x12_cm",
          "docType": "other",
          "name": "Photo 9x12 cm"
        }, {
          "code": "zz_21x30_mm",
          "docType": "other",
          "name": "Photo 21x30 mm"
        }]
      },
      "AU": {
        "code": "AU",
        "docs": [{
          "code": "au_passport",
          "docType": "passport",
          "name": "Australia Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "au_visa",
          "docType": "visa",
          "name": "Australia Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "au_proof_of_age_card_35x45mm",
          "docType": "id",
          "name": "Australia adult proof of age card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "au_degree_assessment",
          "docType": "other",
          "name": "Australia degree assessment 1200x1600 pixels"
        }, {
          "code": "au_nsw_driving",
          "docType": "driving",
          "name": "Australia NSW Driver's Licence Photo-kit 35x45 mm"
        }, {
          "code": "au_vic_driving",
          "docType": "driving",
          "name": "Australia Victoria Driver's Licence Photo-kit 35x45 mm"
        }, {
          "code": "au_qld_driving",
          "docType": "driving",
          "name": "Australia Queensland Driver's Licence Photo 35x45 mm"
        }, {
          "code": "au_citizenship",
          "docType": "id",
          "name": "Australia citizenship 35x45 mm"
        }]
      },
      "NZ": {
        "code": "NZ",
        "docs": [{
          "code": "nz_passport_el",
          "docType": "passport",
          "name": "New Zealand Passport Online 900x1200 px"
        }, {
          "code": "nz_visa_online",
          "docType": "visa",
          "name": "New Zealand Visa online 900x1200 px"
        }, {
          "code": "nz_nzeta",
          "docType": "visa",
          "name": "New Zealand NZETA 540x720 px"
        }, {
          "code": "nz_passport",
          "docType": "passport",
          "name": "New Zealand Passport Offline"
        }, {
          "code": "nz_visa",
          "docType": "visa",
          "name": "New Zealand Visa Offline"
        }, {
          "code": "nz_firearms_licence_35x45mm",
          "docType": "other",
          "name": "New Zealand Firearms Licence 35x45 mm"
        }, {
          "code": "nz_citizenship_online",
          "docType": "id",
          "name": "New Zealand citizenship 900 x 1200 pixels"
        }, {
          "code": "nz_citizenship_35x45_mm",
          "docType": "id",
          "name": "New Zealand citizenship 35x45 mm"
        }, {
          "code": "nz_refugee_travel_document_35x45mm",
          "docType": "id",
          "name": "New Zealand Certificate of Identity / Refugee Travel Document 35x45 mm"
        }, {
          "code": "nz_evidence_of_age_document_35x45mm",
          "docType": "id",
          "name": "Kiwi Access Card 35x45 mm"
        }, {
          "code": "nz_apec_business_travel_card",
          "docType": "id",
          "name": "New Zealand APEC Business Travel Card"
        }, {
          "code": "nz_seafarer_certificate_online",
          "docType": "id",
          "name": "New Zealand SeaCert 1650x2200 px online"
        }, {
          "code": "nz_seafarer_certificate_offline",
          "docType": "id",
          "name": "New Zealand SeaCert 35x45 mm offline"
        }]
      },
      "DE": {
        "code": "DE",
        "docs": [{
          "code": "de_passport",
          "docType": "passport",
          "name": "Germany Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "de_ausweis_35x45mm",
          "docType": "id",
          "name": "Germany ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "de_visa",
          "docType": "visa",
          "name": "Germany Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "de_driving",
          "docType": "driving",
          "name": "Germany Driving License 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "de_residence",
          "docType": "id",
          "name": "Germany residence permit 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "de_anwaltsausweis",
          "docType": "id",
          "name": "Germany Lawyer ID card 35x45 mm"
        }, {
          "code": "de_arztausweis",
          "docType": "id",
          "name": "Germany doctor's identity card 35x45 mm"
        }, {
          "code": "de_gesundheitskarte",
          "docType": "other",
          "name": "Germany Health card 35x45 mm"
        }, {
          "code": "de_busausweis",
          "docType": "other",
          "name": "Germany bus pass 35x45 mm"
        }, {
          "code": "de_bahncard_100",
          "docType": "other",
          "name": "Germany rail card 35x45 mm"
        }, {
          "code": "de_spielerpass",
          "docType": "other",
          "name": "Germany player passport 375 pixels"
        }]
      },
      "FR": {
        "code": "FR",
        "docs": [{
          "code": "fr_passport",
          "docType": "passport",
          "name": "France Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "fr_visa",
          "docType": "visa",
          "name": "France Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "fr_id_card_35x45mm",
          "docType": "id",
          "name": "France ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "fr_campusfrance_26x32",
          "docType": "id",
          "name": "Campus France 26x32 mm photo"
        }, {
          "code": "fr_permis_de_conduire_35x45mm",
          "docType": "driving",
          "name": "France Driving Licence 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "fr_carte_vitale",
          "docType": "other",
          "name": "France Carte Vitale 35x45 mm"
        }, {
          "code": "fr_demande_dasile_35x45",
          "docType": "id",
          "name": "France Asylum Seeker (Demande D'asile) 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "fr_navigo_card",
          "docType": "other",
          "name": "Navigo card 25x30 mm"
        }]
      },
      "IE": {
        "code": "IE",
        "docs": [{
          "code": "ie_passport_online",
          "docType": "passport",
          "name": "Ireland Passport online (715x951 px)"
        }, {
          "code": "ie_passport",
          "docType": "passport",
          "name": "Ireland Passport offline 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ie_visa",
          "docType": "visa",
          "name": "Ireland Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ie_employment_permit_application",
          "docType": "id",
          "name": "Ireland Employment Permit Application 35x45 mm"
        }, {
          "code": "ie_digital_tachograph_driver_card",
          "docType": "driving",
          "name": "Ireland Digital Tachograph Driver Card 35x45 mm"
        }, {
          "code": "ie_garda_age_card",
          "docType": "other",
          "name": "Ireland age card 35x45 mm"
        }]
      },
      "IT": {
        "code": "IT",
        "docs": [{
          "code": "it_carta_di_identita_35x45",
          "docType": "id",
          "name": "Italy ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "it_passport",
          "docType": "passport",
          "name": "Italy Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "it_visa",
          "docType": "visa",
          "name": "Italy Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "it_passport_40x40",
          "docType": "passport",
          "name": "Italy Passport 40x40 mm (LA consulate) 4x4 cm"
        }, {
          "code": "it_patente_di_guida",
          "docType": "driving",
          "name": "Italy driving licence 35x45 mm"
        }, {
          "code": "it_tessera_del_tifoso",
          "docType": "id",
          "name": "Italy fan loyalty card 800x1000 pixels"
        }, {
          "code": "it_tessera_del_tifoso_quadrato",
          "docType": "id",
          "name": "Italy fan loyalty card 600x600 pixels"
        }]
      },
      "ES": {
        "code": "ES",
        "docs": [{
          "code": "es_passport_3x4_cm",
          "docType": "passport",
          "name": "Spain passport 3x4 cm"
        }, {
          "code": "es_dni_32x26mm",
          "docType": "id",
          "name": "Spain DNI (ID card) 32x26 mm"
        }, {
          "code": "es_passport_32x26mm",
          "docType": "passport",
          "name": "Spain passport 32x26 mm"
        }, {
          "code": "es_permiso_de_conduccion_32x26mm",
          "docType": "driving",
          "name": "Spain driving license 32x26 mm"
        }, {
          "code": "es_tie_32x26mm",
          "docType": "id",
          "name": "Spain TIE card (foreigner ID) 32x26 mm"
        }, {
          "code": "es_nie_32x26mm",
          "docType": "id",
          "name": "Spain NIE card 32x26 mm"
        }, {
          "code": "es_tarjeta_de_armas_32x26mm",
          "docType": "other",
          "name": "Spain gun license 32x26 mm"
        }, {
          "code": "es_passport_40x53mm",
          "docType": "passport",
          "name": "Spain Passport 40x53 mm"
        }, {
          "code": "es_visa",
          "docType": "visa",
          "name": "Spain Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "es_visa_us",
          "docType": "visa",
          "name": "Spain Visa 2x2 inch (US Chicago consulate)"
        }]
      },
      "PL": {
        "code": "PL",
        "docs": [{
          "code": "pl_passport",
          "docType": "passport",
          "name": "Poland Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_dowod_osobisty_492x633",
          "docType": "id",
          "name": "Poland ID card online 492x633 pixels"
        }, {
          "code": "pl_dowod_osobisty_35x45mm",
          "docType": "id",
          "name": "Poland ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_prawo_jazdy_480x615",
          "docType": "driving",
          "name": "Poland driving license 480x615 pixels"
        }, {
          "code": "pl_prawo_jazdy_35x45",
          "docType": "driving",
          "name": "Poland driving license 35x45 mm"
        }, {
          "code": "pl_dowod_osobisty_492x610",
          "docType": "id",
          "name": "Poland ID card online 492x610 pixels"
        }, {
          "code": "pl_visa",
          "docType": "visa",
          "name": "Poland Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_karta_polaka",
          "docType": "id",
          "name": "Card of the Pole 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_karta_stalego_pobytu",
          "docType": "id",
          "name": "Poland permanent residence card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_karta_czasowego_pobytu",
          "docType": "id",
          "name": "Poland temporary residence card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pl_ksiazeczka_wojskowa_3x4_cm",
          "docType": "other",
          "name": "Poland military card 3x4 cm"
        }]
      },
      "RO": {
        "code": "RO",
        "docs": [{
          "code": "ro_cartea_de_identitate_3x4cm",
          "docType": "id",
          "name": "Romania ID card 3x4 cm (30x40 mm)"
        }, {
          "code": "ro_visa",
          "docType": "visa",
          "name": "Romania Visa 30x40 mm (3x4 cm)"
        }, {
          "code": "ro_passport",
          "docType": "passport",
          "name": "Romania passport 35x45 mm"
        }]
      },
      "NL": {
        "code": "NL",
        "docs": [{
          "code": "nl_passport",
          "docType": "passport",
          "name": "Netherlands Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "nl_visa",
          "docType": "visa",
          "name": "Netherlands Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "nl_id_kaart_35x45mm",
          "docType": "id",
          "name": "Dutch ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "nl_rijbewijs_35x45",
          "docType": "driving",
          "name": "Dutch driving license 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "nl_ov_chipkaart",
          "docType": "id",
          "name": "Netherlands OV-chipkaart online"
        }, {
          "code": "nl_theorie_examen",
          "docType": "other",
          "name": "Netherlands theory exam 35x45 mm"
        }]
      },
      "BE": {
        "code": "BE",
        "docs": [{
          "code": "be_id_card_45x35mm",
          "docType": "id",
          "name": "Belgium electronic ID card (eID) 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "be_kids_id_45x35mm",
          "docType": "id",
          "name": "Belgium Kids-ID 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "be_visa",
          "docType": "visa",
          "name": "Belgium Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "be_passport_45x35mm",
          "docType": "passport",
          "name": "Belgium passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "be_residence_permit_45x35mm",
          "docType": "id",
          "name": "Belgium residence permit 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "be_driving_license_35x45",
          "docType": "driving",
          "name": "Belgium driving license 35x45 mm"
        }]
      },
      "GR": {
        "code": "GR",
        "docs": [{
          "code": "gr_passport",
          "docType": "passport",
          "name": "Greece Passport 40x60 mm (4x6 cm)"
        }, {
          "code": "gr_visa",
          "docType": "visa",
          "name": "Greece Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "gr_id_card_36x36mm",
          "docType": "id",
          "name": "Greek ID card 3.6x3.6 cm (36x36 mm)"
        }, {
          "code": "gr_visa_us",
          "docType": "visa",
          "name": "Greece Visa 2x2 inch (from the USA)"
        }, {
          "code": "gr_residence",
          "docType": "visa",
          "name": "Greece residence 40x60 mm"
        }]
      },
      "PT": {
        "code": "PT",
        "docs": [{
          "code": "pt_bilhete_de_identidade_32x32mm",
          "docType": "id",
          "name": "Portuguese ID card 32x32 mm"
        }, {
          "code": "pt_passport",
          "docType": "passport",
          "name": "Portugal Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pt_visa",
          "docType": "visa",
          "name": "Portugal Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "pt_cartao_de_cidadao_3x4cm",
          "docType": "id",
          "name": "Portuguese citizen card 3x4 cm"
        }, {
          "code": "pt_visa_id",
          "docType": "visa",
          "name": "Portugal Visa (in Indonesia and Philippines) 30x40 mm (3x4 cm)"
        }, {
          "code": "pt_residence",
          "docType": "visa",
          "name": "Portugal residence 35x45 mm"
        }]
      },
      "CZ": {
        "code": "CZ",
        "docs": [{
          "code": "cz_visa",
          "docType": "visa",
          "name": "Czech Republic Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "cz_obcansky_prukaz",
          "docType": "id",
          "name": "Czechia ID card 35x45 mm"
        }, {
          "code": "cz_passport",
          "docType": "passport",
          "name": "Czech Republic Passport 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "cz_passport_50x50mm",
          "docType": "passport",
          "name": "Czech Republic Passport 5x5cm (50x50mm)"
        }, {
          "code": "cz_zbrojni_prukaz",
          "docType": "other",
          "name": "Czechia firearms licence 35x45 mm"
        }, {
          "code": "cz_in_karta",
          "docType": "other",
          "name": "Czechia In Karta 35x45 mm"
        }, {
          "code": "cz_litacka_card_260x346_px",
          "docType": "other",
          "name": "Czechia Lítačka 260x346 px"
        }, {
          "code": "cz_zamestnanecka_karta",
          "docType": "other",
          "name": "Czechia Employee Card 35x45 mm"
        }, {
          "code": "cz_residence",
          "docType": "visa",
          "name": "Czechia residence 35x45 mm"
        }]
      },
      "HU": {
        "code": "HU",
        "docs": [{
          "code": "hu_passport",
          "docType": "passport",
          "name": "Hungary passport 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "hu_visa",
          "docType": "visa",
          "name": "Hungary Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "hu_vezetoi_engedelye",
          "docType": "driving",
          "name": "Hungary driving license 35x45 mm"
        }, {
          "code": "hu_szemelyazonosito_igazolvany",
          "docType": "id",
          "name": "Hungary ID card 35x45 mm"
        }]
      },
      "SE": {
        "code": "SE",
        "docs": [{
          "code": "se_id_kort",
          "docType": "id",
          "name": "Sweden ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "se_korkort",
          "docType": "driving",
          "name": "Sweden driving license 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "se_visa",
          "docType": "visa",
          "name": "Sweden Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "se_pass",
          "docType": "id",
          "name": "Sweden passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "se_taxiforarlegitimation",
          "docType": "driving",
          "name": "Sweden Taxi driver licence 35x45 mm"
        }]
      },
      "AT": {
        "code": "AT",
        "docs": [{
          "code": "at_personalausweis_35x45mm",
          "docType": "id",
          "name": "Austrian ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "at_passport",
          "docType": "passport",
          "name": "Austria Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "at_visa",
          "docType": "visa",
          "name": "Austria Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "at_fuhrerschein_35x45mm",
          "docType": "driving",
          "name": "Austrian driving license 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "at_aufenthaltstitel_35x45mm",
          "docType": "id",
          "name": "Austrian residence permit 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "at_ziviltechniker_ausweis",
          "docType": "id",
          "name": "Austria Civil engineer ID card 35x45 mm"
        }, {
          "code": "at_obb_osterreichcard",
          "docType": "other",
          "name": "Austria OBB Card 35x45 mm"
        }, {
          "code": "at_waffenpass",
          "docType": "other",
          "name": "Austria Weapons passport 35x45 mm"
        }, {
          "code": "at_ecard",
          "docType": "other",
          "name": "Austria e-card 35x45 mm"
        }, {
          "code": "at_fahrradausweis",
          "docType": "driving",
          "name": "Austria bicycle passport 35x45 mm"
        }]
      },
      "CH": {
        "code": "CH",
        "docs": [{
          "code": "ch_visa",
          "docType": "visa",
          "name": "Switzerland Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ch_id_card_35x45mm",
          "docType": "id",
          "name": "Swiss ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ch_passport",
          "docType": "passport",
          "name": "Switzerland passport 35x45 mm"
        }, {
          "code": "ch_driving",
          "docType": "driving",
          "name": "Switzerland driving licence 35x45 mm"
        }]
      },
      "BG": {
        "code": "BG",
        "docs": [{
          "code": "bg_passport",
          "docType": "passport",
          "name": "Bulgaria passport 35x45 mm"
        }, {
          "code": "bg_visa",
          "docType": "visa",
          "name": "Bulgaria Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "bg_id_card_35x45mm",
          "docType": "id",
          "name": "Bulgaria ID card (лична карта) 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "bg_residence",
          "docType": "visa",
          "name": "Bulgaria residence 35x45 mm"
        }]
      },
      "RS": {
        "code": "RS",
        "docs": [{
          "code": "rs_visa",
          "docType": "visa",
          "name": "Serbia Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "rs_passport",
          "docType": "passport",
          "name": "Serbia passport 50x50 mm"
        }]
      },
      "DK": {
        "code": "DK",
        "docs": [{
          "code": "dk_visa",
          "docType": "visa",
          "name": "Denmark Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "dk_pas_online_kk_dk",
          "docType": "passport",
          "name": "Denmark Passport for kk.dk 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "dk_passport",
          "docType": "passport",
          "name": "Denmark Passport 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "dk_id_kort",
          "docType": "id",
          "name": "Denmark ID card 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "dk_koerekort",
          "docType": "driving",
          "name": "Denmark driving license 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "dk_ku_studiekort",
          "docType": "id",
          "name": "University of Copenhagen student card 200x200 pixel"
        }, {
          "code": "dk_sofartsbog",
          "docType": "id",
          "name": "Denmark Seafarer's Discharge Book 35x45 mm"
        }]
      },
      "FI": {
        "code": "FI",
        "docs": [{
          "code": "fi_passport",
          "docType": "passport",
          "name": "Finland Passport 36x47 mm"
        }, {
          "code": "fi_visa",
          "docType": "visa",
          "name": "Finland Visa 36x47 mm"
        }, {
          "code": "fi_passport_500x653px",
          "docType": "passport",
          "name": "Finland Passport online 500x653 px"
        }, {
          "code": "fi_id_henkilokortti_500x653px",
          "docType": "id",
          "name": "Finland ID card online 500x653 px"
        }, {
          "code": "fi_id_henkilokortti_36x47mm",
          "docType": "id",
          "name": "Finland ID card offline 36x47 mm"
        }, {
          "code": "fi_residence",
          "docType": "visa",
          "name": "Finland residence 36x47 mm"
        }, {
          "code": "fi_firearms_handling_permit",
          "docType": "other",
          "name": "Finland firearms permit 36x47 mm"
        }, {
          "code": "fi_driving_licence",
          "docType": "driving",
          "name": "Finland driving licence 36x47 mm"
        }]
      },
      "SK": {
        "code": "SK",
        "docs": [{
          "code": "sk_id_card_30x35",
          "docType": "id",
          "name": "Slovakia ID card 30x35 mm (3x3.5 cm)"
        }, {
          "code": "sk_visa",
          "docType": "visa",
          "name": "Slovakia Visa 30x35 mm (3x3.5 cm)"
        }, {
          "code": "sk_vodicsky_preukaz",
          "docType": "driving",
          "name": "Slovakia driving license 35x45 mm"
        }]
      },
      "NO": {
        "code": "NO",
        "docs": [{
          "code": "no_passport",
          "docType": "passport",
          "name": "Norway Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "no_visa",
          "docType": "visa",
          "name": "Norway Visa 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "KZ": {
        "code": "KZ",
        "docs": [{
          "code": "kz_passport",
          "docType": "passport",
          "name": "Kazakhstan Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "kz_id_card_35x45mm",
          "docType": "id",
          "name": "Kazakhstan ID card 35x45 mm"
        }, {
          "code": "kz_passport_online_413x531",
          "docType": "passport",
          "name": "Kazakhstan passport online 413x531 pixels"
        }, {
          "code": "kz_id_card_online_413x531",
          "docType": "id",
          "name": "Kazakhstan ID card online 413x531 pixels"
        }, {
          "code": "kz_visa",
          "docType": "visa",
          "name": "Kazakhstan Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "kz_seaman_book",
          "docType": "id",
          "name": "Kazakhstan seaman's book 3x4 cm"
        }]
      },
      "ZA": {
        "code": "ZA",
        "docs": [{
          "code": "za_smart_id_card",
          "docType": "ID",
          "name": "South Africa smart ID card 35x45 mm"
        }, {
          "code": "za_passport",
          "docType": "passport",
          "name": "South Africa Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "za_visa",
          "docType": "visa",
          "name": "South Africa Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "za_driving_licence",
          "docType": "driving",
          "name": "South Africa driving licence 35x45 mm"
        }]
      },
      "CL": {
        "code": "CL",
        "docs": [{
          "code": "cl_visa",
          "docType": "visa",
          "name": "Chile Visa 2x3 cm"
        }, {
          "code": "cl_passport",
          "docType": "passport",
          "name": "Chile passport 4.5x4.5 cm"
        }, {
          "code": "cl_visa_5x5",
          "docType": "visa",
          "name": "Chile Visa 5x5 cm"
        }]
      },
      "CN": {
        "code": "CN",
        "docs": [{
          "code": "cn_visa",
          "docType": "visa",
          "name": "China Visa 33x48 mm"
        }, {
          "code": "cn_visa_online",
          "docType": "visa",
          "name": "China Visa online 354x472 - 420x560 pixels"
        }, {
          "code": "cn_passport_online",
          "docType": "passport",
          "name": "China Passport online 354x472 pixel"
        }, {
          "code": "cn_passport_online_old",
          "docType": "passport",
          "name": "China Passport online 354x472 pixel old format"
        }, {
          "code": "cn_passport",
          "docType": "passport",
          "name": "China Passport 33x48 mm"
        }, {
          "code": "cn_passport_grey_bg",
          "docType": "passport",
          "name": "China Passport 33x48 mm light grey background"
        }, {
          "code": "cn_354x472px_eyes_crosslines",
          "docType": "id",
          "name": "China 354x472 pixel with eyes on crosslines"
        }, {
          "code": "cn_social_security_card",
          "docType": "id",
          "name": "China Social Security Card 32x26 mm"
        }, {
          "code": "cn_second_generation_id_card",
          "docType": "id",
          "name": "China Resident ID card 26x32 mm"
        }, {
          "code": "cn_driving_licence",
          "docType": "driving",
          "name": "China driving license 22x32 mm"
        }, {
          "code": "cn_jiashi_zheng",
          "docType": "driving",
          "name": "China driving license 21x26 mm"
        }, {
          "code": "cn_putonghua_test",
          "docType": "other",
          "name": "Putonghua Proficiency Test 390x567 pixels blue background"
        }, {
          "code": "cn_national_computer_rank_examination",
          "docType": "other",
          "name": "National Computer Rank Examination 144x192 pixels"
        }, {
          "code": "cn_medicare_card",
          "docType": "id",
          "name": "China Medicare card 26x32 mm"
        }, {
          "code": "cn_pharmacist",
          "docType": "other",
          "name": "Licensed Pharmacist 215x300 pixels"
        }, {
          "code": "cn_green_card_33x48mm",
          "docType": "id",
          "name": "China Green Card 33x48 mm"
        }, {
          "code": "cn_apec_card_300x400px",
          "docType": "other",
          "name": "China APEC Business Travel Card 300x400 pixels"
        }]
      },
      "HK": {
        "code": "HK",
        "docs": [{
          "code": "hk_epassport_1200x1600",
          "docType": "passport",
          "name": "Hong Kong online e-passport 1200x1600 pixels"
        }, {
          "code": "hk_evisa_1200x1600",
          "docType": "visa",
          "name": "Hong Kong online e-visa 1200x1600 pixels"
        }, {
          "code": "hk_passport",
          "docType": "passport",
          "name": "Hong Kong Passport 40x50 mm (4x5 cm)"
        }, {
          "code": "hk_visa",
          "docType": "visa",
          "name": "Hong Kong Visa 40x50 mm (4x5 cm)"
        }, {
          "code": "hk_smart_identity_card_4x5",
          "docType": "id",
          "name": "Hong Kong ID card 4x5 cm"
        }, {
          "code": "hk_apec_business_travel_card",
          "docType": "id",
          "name": "Hong Kong APEC Business Travel Card"
        }, {
          "code": "hk_octopus_card",
          "docType": "other",
          "name": "Hong Kong Octopus 1.5x2 inch"
        }]
      },
      "MO": {
        "code": "MO",
        "docs": [{
          "code": "mo_resident_identity_card_45x35mm",
          "docType": "id",
          "name": "Macau resident identity card (BIR) 45x35 mm"
        }, {
          "code": "mo_passport_45x35mm",
          "docType": "passport",
          "name": "Macau passport 45x35 mm"
        }, {
          "code": "mo_visa",
          "docType": "visa",
          "name": "Macau Visa 33x48 mm"
        }, {
          "code": "mo_driving",
          "docType": "driving",
          "name": "Macau driving licence 32x42 mm"
        }]
      },
      "TW": {
        "code": "TW",
        "docs": [{
          "code": "tw_passport",
          "docType": "passport",
          "name": "Taiwan Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "tw_passport_from_us",
          "docType": "passport",
          "name": "Taiwan Passport 2x2 inch (apply from the US)"
        }, {
          "code": "tw_visa",
          "docType": "visa",
          "name": "Taiwan Visa and evisa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "tw_id_card_2x2inch",
          "docType": "id",
          "name": "Taiwan ID card 2x2 inch"
        }, {
          "code": "tw_id_card_30x25mm",
          "docType": "id",
          "name": "Taiwan ID card 30x25 mm"
        }, {
          "code": "tw_residence",
          "docType": "id",
          "name": "Taiwan residence 2 small cuns"
        }]
      },
      "IN": {
        "code": "IN",
        "docs": [{
          "code": "in_indianvisaonline_evisa",
          "docType": "visa",
          "name": "India e-visa for indianvisaonline.gov.in"
        }, {
          "code": "in_visa",
          "docType": "visa",
          "name": "India Visa (2x2 inch, 51x51mm)"
        }, {
          "code": "in_visa_vfs_190px",
          "docType": "visa",
          "name": "India Visa 190x190 px via VFSglobal.com"
        }, {
          "code": "in_passport_oci_online",
          "docType": "passport",
          "name": "India OCI Passport (2x2 inch, 51x51mm, 200x200 to 1500x1500 pixels)"
        }, {
          "code": "in_passport_oci_360x360_900x900_pixel",
          "docType": "passport",
          "name": "India OCI passport 360x360 - 900x900 pixel"
        }, {
          "code": "in_passport",
          "docType": "passport",
          "name": "India Passport (2x2 inch, 51x51mm)"
        }, {
          "code": "in_passport_35x45mm",
          "docType": "passport",
          "name": "India passport Seva 4.5x3.5 cm"
        }, {
          "code": "in_passport_35x45mm_for_minors",
          "docType": "passport",
          "name": "India child passport Seva 35x45 mm"
        }, {
          "code": "in_passport_35x35_mm",
          "docType": "passport",
          "name": "India passport 35x35 mm"
        }, {
          "code": "in_pan_213x213",
          "docType": "id",
          "name": "India PAN card online 213x213 pixel"
        }, {
          "code": "in_pan",
          "docType": "id",
          "name": "India PAN card 25x35mm (2.5x3.5cm)"
        }, {
          "code": "in_driving_license_420x525px",
          "docType": "driving",
          "name": "India online driving licence 420x525 pixels"
        }, {
          "code": "in_driving_license_35x45_mm",
          "docType": "driving",
          "name": "India driving licence 35x45 mm (1.4x1.75 inch)"
        }, {
          "code": "in_voter_id",
          "docType": "id",
          "name": "India Voter ID card"
        }, {
          "code": "in_pio",
          "docType": "id",
          "name": "India PIO (Person of Indian Origin) 35x35 mm (3.5x3.5 cm)"
        }, {
          "code": "in_birthcertificate",
          "docType": "id",
          "name": "India PCC / Birth Certificate 35x35 mm (3.5x3.5 cm)"
        }, {
          "code": "in_ffro",
          "docType": "visa",
          "name": "India FRRO (Foreigner Registration) 35x35 mm online"
        }, {
          "code": "in_pcc_160x200_212_px",
          "docType": "other",
          "name": "India Police clearance certificate (PCC) 160x200-212 px"
        }, {
          "code": "in_police_clearance_certificate",
          "docType": "other",
          "name": "India Police clearance certificate (PCC) (2x2 inch, 51x51mm)"
        }, {
          "code": "in_dcga_online",
          "docType": "other",
          "name": "UDAAN DCGA"
        }, {
          "code": "in_passport_bls_usa",
          "docType": "passport",
          "name": "India Passport for BLS USA Application (2x2 inch, 51x51mm)"
        }]
      },
      "PK": {
        "code": "PK",
        "docs": [{
          "code": "pk_cnic_350x467_px",
          "docType": "id",
          "name": "Pakistan NADRA CNIC/NICOP/POC 350x467 pixel white background"
        }, {
          "code": "pk_id_nadra_babies",
          "docType": "id",
          "name": "Pakistan babies NADRA ID card 35x45 mm"
        }, {
          "code": "pk_id_card",
          "docType": "id",
          "name": "Pakistan National ID card (NADRA, NICOP) 35x45 mm"
        }, {
          "code": "pk_cnic",
          "docType": "id",
          "name": "Pakistan CNIC 35x45 mm"
        }, {
          "code": "pk_passport",
          "docType": "passport",
          "name": "Pakistan passport 35x45 mm"
        }, {
          "code": "pk_id_card_2",
          "docType": "id",
          "name": "Pakistan NADRA 2"
        }, {
          "code": "pk_id_card_3",
          "docType": "id",
          "name": "Pakistan NADRA 3"
        }, {
          "code": "pk_origin_card",
          "docType": "id",
          "name": "Pakistan Origin Card (NADRA) 35x45 mm"
        }, {
          "code": "pk_family_registration_certificate",
          "docType": "id",
          "name": "Pakistan Family Registration Certificate (NADRA) 35x45 mm"
        }, {
          "code": "pk_driving_license_35x45",
          "docType": "driving",
          "name": "Pakistan driving license 35x45 mm"
        }, {
          "code": "pk_visa",
          "docType": "visa",
          "name": "Pakistan visa 35x45 mm"
        }, {
          "code": "pk_visa_2x2",
          "docType": "visa",
          "name": "Pakistan visa 2x2 inch (from USA)"
        }]
      },
      "JP": {
        "code": "JP",
        "docs": [{
          "code": "jp_certificate_eligibility",
          "docType": "id",
          "name": "Japan Residence Card or Certificate of Eligibility 30x40 mm"
        }, {
          "code": "jp_visa",
          "docType": "visa",
          "name": "Japan Visa 45x45mm, head 27 mm"
        }, {
          "code": "jp_visa_3",
          "docType": "visa",
          "name": "Japan Visa 2x2 inch (standard visa from the US)"
        }, {
          "code": "jp_mainanbakado",
          "docType": "id",
          "name": "Japan My Number Card 35x45 mm"
        }, {
          "code": "jp_visa_2",
          "docType": "visa",
          "name": "Japan Visa 45x45mm, head 34 mm"
        }, {
          "code": "jp_passport",
          "docType": "passport",
          "name": "Japan Passport 35x45 mm"
        }, {
          "code": "jp_unten_menkyosho",
          "docType": "driving",
          "name": "Japan Driver's license 2.4x3 cm light blue background"
        }, {
          "code": "jp_kokugai_unten_menkyosho",
          "docType": "driving",
          "name": "Japan foreign driver's license 4x5 cm"
        }, {
          "code": "jp_jlpt",
          "docType": "other",
          "name": "Japanese language proficiency test (JLPT) 3x4cm 360x480px"
        }, {
          "code": "jp_gogonihon",
          "docType": "id",
          "name": "Japan GoGoNihon 800 pixels 35x45 mm"
        }, {
          "code": "jp_resume_small_type",
          "docType": "other",
          "name": "Japan resume 3x4 cm"
        }, {
          "code": "jp_resume_large_type",
          "docType": "other",
          "name": "Japan resume 4x6 cm"
        }, {
          "code": "jp_apec_business_travel_card",
          "docType": "id",
          "name": "Japan APEC Business Travel Card 35x45 mm"
        }, {
          "code": "jp_shuryo_menkyo",
          "docType": "other",
          "name": "Japan Hunting license 2.4x3 cm"
        }]
      },
      "KR": {
        "code": "KR",
        "docs": [{
          "code": "kr_visa",
          "docType": "visa",
          "name": "South Korea Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "kr_passport_35x45mm",
          "docType": "passport",
          "name": "South Korea passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "kr_driving_license",
          "docType": "driving",
          "name": "South Korea driving license 35x45 mm"
        }, {
          "code": "kr_alien_registration_card_3x4",
          "docType": "id",
          "name": "South Korea Alien Registration 3x4 cm (30x40 mm)"
        }, {
          "code": "kr_jumindeunglogjeung",
          "docType": "id",
          "name": "South Korea registration card 35x45 mm"
        }]
      },
      "AE": {
        "code": "AE",
        "docs": [{
          "code": "ae_visa_300_369",
          "docType": "visa",
          "name": "UAE Visa online Emirates.com 300x369 pixels"
        }, {
          "code": "ae_visa",
          "docType": "visa",
          "name": "UAE Visa offline 43x55 mm"
        }, {
          "code": "ae_id_card_ica_gov_ae",
          "docType": "id",
          "name": "UAE ID card online 35x45 mm ica.gov.ae"
        }, {
          "code": "ae_passport_4x6cm",
          "docType": "passport",
          "name": "UAE passport 4x6 cm"
        }, {
          "code": "ae_id_card_4x6cm",
          "docType": "id",
          "name": "UAE ID card 4x6 cm"
        }, {
          "code": "ae_residence_4x6cm",
          "docType": "id",
          "name": "UAE residence 4x6 cm"
        }, {
          "code": "ae_driving_licence",
          "docType": "driving",
          "name": "UAE driving license 4x6 cm"
        }, {
          "code": "ae_family_book",
          "docType": "id",
          "name": "UAE family book 35x45 mm"
        }]
      },
      "IL": {
        "code": "IL",
        "docs": [{
          "code": "il_id_card_35x45mm",
          "docType": "id",
          "name": "Israel ID card 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "il_gov_il_35x45",
          "docType": "id",
          "name": "Israel gov.il 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "il_passport",
          "docType": "passport",
          "name": "Israel Passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "il_passport_5x5cm_2x2in",
          "docType": "passport",
          "name": "Israel Passport 5x5 cm (2x2 in, 51x51 mm)"
        }, {
          "code": "il_visa_2",
          "docType": "visa",
          "name": "Israel Visa 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "il_visa",
          "docType": "visa",
          "name": "Israel Visa 55x55mm (usually from India)"
        }]
      },
      "MY": {
        "code": "MY",
        "docs": [{
          "code": "my_passport_white",
          "docType": "passport",
          "name": "Malaysia Passport 35x50 mm white background"
        }, {
          "code": "my_evisa",
          "docType": "visa",
          "name": "Malaysia eVisa online application 35x50 mm"
        }, {
          "code": "my_passport",
          "docType": "passport",
          "name": "Malaysia Passport 35x50 mm blue background"
        }, {
          "code": "my_visa_35x50",
          "docType": "visa",
          "name": "Malaysia Visa 35x50 mm blue background"
        }, {
          "code": "my_99x142px",
          "docType": "id",
          "name": "Malaysia expat 99x142 pixels blue background"
        }, {
          "code": "my_driving_license",
          "docType": "driving",
          "name": "Malaysia driving license 25x32 mm"
        }, {
          "code": "my_visa_35x50_white",
          "docType": "visa",
          "name": "Malaysia Visa 35x50 mm white background"
        }, {
          "code": "my_visa",
          "docType": "visa",
          "name": "Malaysia Visa 35x45 mm blue background"
        }, {
          "code": "my_visa_white",
          "docType": "visa",
          "name": "Malaysia Visa 35x45 mm white background"
        }, {
          "code": "my_emgs_online",
          "docType": "id",
          "name": "Malaysia EMGS educationmalaysia.gov.my online"
        }, {
          "code": "my_emgs_35x45mm",
          "docType": "id",
          "name": "Malaysia EMGS 35x45 mm"
        }, {
          "code": "my_apec_business_travel_card",
          "docType": "id",
          "name": "Malaysia APEC Business Travel Card 35x50mm (3.5x5 cm)"
        }]
      },
      "TH": {
        "code": "TH",
        "docs": [{
          "code": "th_visa_onarrival_4x6",
          "docType": "visa",
          "name": "Thailand visa on arrival 4x6 cm (40x60 mm)"
        }, {
          "code": "th_visa_4x6",
          "docType": "visa",
          "name": "Thailand visa 4x6 cm (40x60 mm)"
        }, {
          "code": "th_cert_residence_4x6",
          "docType": "visa",
          "name": "Thailand certificate of residence 4x6 cm (40x60 mm)"
        }, {
          "code": "th_visa",
          "docType": "visa",
          "name": "Thailand Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "th_driving_license",
          "docType": "driving",
          "name": "Thailand driving license 2x2 inch"
        }, {
          "code": "th_visa_us",
          "docType": "visa",
          "name": "Thailand Visa 2x2 inch (from the US)"
        }, {
          "code": "th_visa_132_170",
          "docType": "visa",
          "name": "Thailand e-visa 132x170 pixel"
        }, {
          "code": "th_1x1",
          "docType": "id",
          "name": "Thailand license 1x1 photo"
        }, {
          "code": "th_apec_business_travel_card",
          "docType": "id",
          "name": "Thailand APEC Business Travel Card"
        }, {
          "code": "th_alien_registration_book",
          "docType": "id",
          "name": "Thailand Alien Registration Book 4x6 cm"
        }]
      },
      "ID": {
        "code": "ID",
        "docs": [{
          "code": "id_visa_3x4_red_bg",
          "docType": "visa",
          "name": "Indonesia visa 3x4 cm (30x40 mm) online red background"
        }, {
          "code": "id_passport",
          "docType": "passport",
          "name": "Indonesia passport 51x51 mm (2x2 inch) red background"
        }, {
          "code": "id_passport_white",
          "docType": "passport",
          "name": "Indonesia passport 51x51 mm (2x2 inch) white background"
        }, {
          "code": "id_visa_2x2inches",
          "docType": "visa",
          "name": "Indonesia Visa 2x2 inches (51x51 mm)"
        }, {
          "code": "id_visa",
          "docType": "visa",
          "name": "Indonesia Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "id_visa_4x6_red_bg",
          "docType": "visa",
          "name": "Indonesia Visa 4x6 cm red background"
        }]
      },
      "BR": {
        "code": "BR",
        "docs": [{
          "code": "br_visa_online_vfsglobal_413x531",
          "docType": "visa",
          "name": "Brazil visa online 413x531 px via VFSGlobal"
        }, {
          "code": "br_visa_online_431x531",
          "docType": "visa",
          "name": "Brazil visa online 431x531 px"
        }, {
          "code": "br_carteira_de_identidade_3x4",
          "docType": "visa",
          "name": "Brazil ID card 3x4 cm (30x40 mm)"
        }, {
          "code": "br_visa",
          "docType": "visa",
          "name": "Brazil Visa 2x2 inch (from the US) 51x51 mm"
        }, {
          "code": "br_passport_online_431x531",
          "docType": "passport",
          "name": "Brazil Passport online 431x531 px"
        }, {
          "code": "br_passport_5x7",
          "docType": "passport",
          "name": "Brazil Common Passport 5x7 cm"
        }, {
          "code": "br_driving_license",
          "docType": "driving",
          "name": "Brazil driving license 3x4 cm"
        }, {
          "code": "br_sptrans_3x4",
          "docType": "id",
          "name": "SPTrans Bilhete Único 3x4 cm"
        }]
      },
      "KH": {
        "code": "KH",
        "docs": [{
          "code": "kh_passport_4x6",
          "docType": "passport",
          "name": "Cambodia passport 4x6 cm"
        }, {
          "code": "kh_visa",
          "docType": "visa",
          "name": "Cambodia Visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "kh_visa_4x6",
          "docType": "visa",
          "name": "Cambodia visa 4x6 cm"
        }, {
          "code": "kh_visa_2x2",
          "docType": "visa",
          "name": "Cambodia visa 2x2 inch from the USA"
        }]
      },
      "SG": {
        "code": "SG",
        "docs": [{
          "code": "sg_visa_online",
          "docType": "visa",
          "name": "Singapore visa online 400x514 px"
        }, {
          "code": "sg_passport_online",
          "docType": "passport",
          "name": "Singapore passport online 400x514 px"
        }, {
          "code": "sg_id_card",
          "docType": "id",
          "name": "Singapore ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "sg_passport_offline",
          "docType": "passport",
          "name": "Singapore passport offline 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "sg_visa",
          "docType": "visa",
          "name": "Singapore visa offline 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "sg_citizenship_certificate",
          "docType": "id",
          "name": "Singapore Citizenship Certificate 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "sg_certificate_of_identity",
          "docType": "other",
          "name": "Singapore Certificate of Identity 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "sg_driving_license_35x45",
          "docType": "driving",
          "name": "Singapore driving license 35x45 mm"
        }, {
          "code": "sg_seaman_discharge_book",
          "docType": "id",
          "name": "Singapore seaman's discharge book 400x514 px"
        }, {
          "code": "sg_transit_link_card",
          "docType": "other",
          "name": "Singapore EZ-Link card 240x320 pixels"
        }]
      },
      "MX": {
        "code": "MX",
        "docs": [{
          "code": "mx_passport_35x45",
          "docType": "passport",
          "name": "Mexico passport 35x45 mm"
        }, {
          "code": "mx_visa",
          "docType": "visa",
          "name": "Mexico visa 25x35mm (2.5x3.5cm or 1\"x1.2\")"
        }, {
          "code": "mx_visa_permanent_residents",
          "docType": "visa",
          "name": "Mexico permanent residents visa 31x39mm (3.1x3.9cm)"
        }, {
          "code": "mx_driving",
          "docType": "driving",
          "name": "Mexico driving license 35x45 mm"
        }, {
          "code": "mx_visa_15x175_38x44",
          "docType": "visa",
          "name": "Mexico visa 1.5x1.75 inch (1.5 x 1 3/4 inches or 3.8x4.4cm)"
        }, {
          "code": "mx_cartilla_militar",
          "docType": "other",
          "name": "Mexico military card 35x45 mm"
        }]
      },
      "KW": {
        "code": "KW",
        "docs": [{
          "code": "kw_passport_4x5",
          "docType": "passport",
          "name": "Kuwait Passport (first time) 4x5 cm blue background"
        }, {
          "code": "kw_passport",
          "docType": "passport",
          "name": "Kuwait Passport 4x6 cm (40x60 mm)"
        }, {
          "code": "kw_visa_5x5cm_2x2in",
          "docType": "visa",
          "name": "Kuwait visa 51x51 mm (5x5 cm, 2x2 inches)"
        }, {
          "code": "kw_id_card_4x6cm",
          "docType": "id",
          "name": "Kuwait ID card 4x6 cm (40x60 mm)"
        }, {
          "code": "kw_residence_4x6",
          "docType": "id",
          "name": "Kuwait residence 4x6 cm (40x60 mm)"
        }, {
          "code": "kw_work_permit_4x6cm",
          "docType": "id",
          "name": "Kuwait work permit 4x6 cm (40x60 mm)"
        }, {
          "code": "kw_driving_licence_4x6",
          "docType": "driving",
          "name": "Kuwait driving license 4x6 cm blue background"
        }]
      },
      "VN": {
        "code": "VN",
        "docs": [{
          "code": "vn_visa",
          "docType": "visa",
          "name": "Vietnam visa 40x60 mm (4x6 cm)"
        }, {
          "code": "vn_the_can_cuoc_cong_dan_3x4cm",
          "docType": "id",
          "name": "Vietnam ID card 3x4 cm (30x40 mm)"
        }, {
          "code": "vn_visa_2x2",
          "docType": "visa",
          "name": "Vietnam visa 2x2 inch (5.08x5.08 cm)"
        }, {
          "code": "vi_apec_business_travel_card",
          "docType": "id",
          "name": "Vietnam APEC Business Travel Card 3x4 cm"
        }]
      },
      "NP": {
        "code": "NP",
        "docs": [{
          "code": "np_online_visa_15x15in",
          "docType": "visa",
          "name": "Nepal online visa 1.5x1.5 inches"
        }, {
          "code": "np_visa_2",
          "docType": "visa",
          "name": "Nepal visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "np_visa",
          "docType": "visa",
          "name": "Nepal visa 2x2 inch (51x51 mm)"
        }, {
          "code": "np_passport_35x45",
          "docType": "passport",
          "name": "Nepal passport 35x45 mm"
        }, {
          "code": "np_nrn_id_25x30",
          "docType": "id",
          "name": "Nepal NRN ID card 25x30 mm"
        }]
      },
      "TR": {
        "code": "TR",
        "docs": [{
          "code": "tr_visa",
          "docType": "visa",
          "name": "Turkey Visa 50x60 mm (5x6 cm)"
        }, {
          "code": "tr_passport",
          "docType": "passport",
          "name": "Turkey Passport 50x60 mm (5x6 cm)"
        }, {
          "code": "tr_cumhuriyeti_kimlik_karti",
          "docType": "id",
          "name": "Turkey ID card 5x6 cm"
        }, {
          "code": "tr_ikamet_izni",
          "docType": "residence",
          "name": "Turkey Residence 5x6 cm"
        }, {
          "code": "tr_driving",
          "docType": "driving",
          "name": "Turkey Driving licence 5x6 cm"
        }, {
          "code": "tr_passolig_kart",
          "docType": "id",
          "name": "Turkish Passolig Card"
        }]
      },
      "MM": {
        "code": "MM",
        "docs": [{
          "code": "mm_visa",
          "docType": "visa",
          "name": "Myanmar (Burma) Visa 38x46 mm (3.8x4.6 cm)"
        }, {
          "code": "mm_visa_38x48",
          "docType": "visa",
          "name": "Myanmar (Burma) Visa 38x48 mm (3.8x4.8 cm)"
        }, {
          "code": "mm_passport",
          "docType": "passport",
          "name": "Myanmar passport 35x45 mm"
        }, {
          "code": "mm_driving_license",
          "docType": "driving",
          "name": "Myanmar driving license 35x45 mm"
        }, {
          "code": "mm_visa_2x2",
          "docType": "visa",
          "name": "Myanmar visa 2x2 inches (from US)"
        }, {
          "code": "mm_permanent_residence_15x2",
          "docType": "id",
          "name": "Myanmar Permanent Residence 1.5x2 inches"
        }]
      },
      "PH": {
        "code": "PH",
        "docs": [{
          "code": "ph_visa_2x2inches",
          "docType": "visa",
          "name": "Philippines visa 2x2 inch"
        }, {
          "code": "ph_rush_id",
          "docType": "id",
          "name": "Philippines RUSH ID photo 1x1 inch"
        }, {
          "code": "ph_1x1",
          "docType": "id",
          "name": "Philippines license 1x1 inch photo"
        }, {
          "code": "ph_passport_45x35mm",
          "docType": "passport",
          "name": "Philippines Machine Readable Passport 4.5x3.5 cm (45x35mm)"
        }, {
          "code": "ph_visa_35x45mm",
          "docType": "visa",
          "name": "Philippines visa 35x45 mm"
        }, {
          "code": "ph_cir_25x25mm",
          "docType": "id",
          "name": "Philippines Certificate of Identity and Registration (CIR) card 2.5x2.5 cm (25x25mm)"
        }, {
          "code": "ph_acknowledgement_of_employment_contracts_3x4cm",
          "docType": "other",
          "name": "Acknowledgement of employment contracts 3x4 cm"
        }, {
          "code": "ph_clccm",
          "docType": "other",
          "name": "Philippines CLCCM 2x2 inch"
        }]
      },
      "UG": {
        "code": "UG",
        "docs": [{
          "code": "ug_passport",
          "docType": "passport",
          "name": "Uganda passport 2x2 inch (51x51mm, 5x5 cm)"
        }, {
          "code": "ug_visa",
          "docType": "visa",
          "name": "Uganda visa 2x2 inch (51x51mm, 5x5 cm)"
        }, {
          "code": "ug_visa_eastern_africa",
          "docType": "visa",
          "name": "Eastern Africa visa photo 2x2 inch (Uganda) (51x51mm, 5x5 cm)"
        }]
      },
      "KE": {
        "code": "KE",
        "docs": [{
          "code": "ke_evisa",
          "docType": "visa",
          "name": "Kenya e-visa online 500x500 pixels"
        }, {
          "code": "ke_ecitizen_visa",
          "docType": "visa",
          "name": "Kenya visa 207x207 pixel"
        }, {
          "code": "ke_visa_eastern_africa",
          "docType": "visa",
          "name": "Eastern Africa visa photo 2x2 inch (Kenya) (51x51mm, 5x5 cm)"
        }, {
          "code": "ke_national_identity_card",
          "docType": "id",
          "name": "Kenya ID card 35x45 mm"
        }, {
          "code": "ke_epassport_2x2_5_inch",
          "docType": "passport",
          "name": "Kenya e-passport 2x2.5 inch"
        }, {
          "code": "ke_passport",
          "docType": "passport",
          "name": "Kenya passport 2x2 inch (51x51 mm, 5x5 cm)"
        }, {
          "code": "ke_passport_35x45_mm",
          "docType": "passport",
          "name": "Kenya passport 35x45 mm"
        }]
      },
      "RW": {
        "code": "RW",
        "docs": [{
          "code": "rw_visa_eastern_africa_online",
          "docType": "visa",
          "name": "Rwanda East Africa Tourist Visa online"
        }, {
          "code": "rw_visa_eastern_africa",
          "docType": "visa",
          "name": "Eastern Africa visa photo 2x2 inch (Rwanda) (51x51 mm, 5x5 cm)"
        }]
      },
      "ZW": {
        "code": "ZW",
        "docs": [{
          "code": "zw_visa",
          "docType": "visa",
          "name": "Zimbabwe visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "zw_passport_35x45mm",
          "docType": "passport",
          "name": "Zimbabwe passport 3.5x4.5 cm (35x45 mm)"
        }]
      },
      "GE": {
        "code": "GE",
        "docs": [{
          "code": "ge_passport",
          "docType": "passport",
          "name": "Georgia passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ge_visa",
          "docType": "visa",
          "name": "Georgia visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ge_evisa",
          "docType": "visa",
          "name": "Georgia e-visa 472x591 pixels (4x5 cm)"
        }, {
          "code": "ge_id_card",
          "docType": "id",
          "name": "Georgia ID card 35x45 mm"
        }, {
          "code": "ge_citizenship",
          "docType": "id",
          "name": "Georgia citizenship 3x4 cm"
        }, {
          "code": "ge_residence",
          "docType": "id",
          "name": "Georgia residence 3x4 cm"
        }]
      },
      "KN": {
        "code": "KN",
        "docs": [{
          "code": "kn_passport",
          "docType": "passport",
          "name": "Saint Kitts and Nevis passport photo 35x45 mm (1.77x1.38 inch)"
        }]
      },
      "AM": {
        "code": "AM",
        "docs": [{
          "code": "am_evisa",
          "docType": "visa",
          "name": "Armenia evisa photo 600x600 px"
        }, {
          "code": "am_visa_35x45mm",
          "docType": "visa",
          "name": "Armenia visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "am_return_certificate_35x45mm",
          "docType": "other",
          "name": "Armenia certificate of return 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "am_id_card_3x4cm",
          "docType": "id",
          "name": "Armenia ID card 3x4 cm"
        }]
      },
      "GA": {
        "code": "GA",
        "docs": [{
          "code": "ga_evisa",
          "docType": "visa",
          "name": "Gabon evisa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ga_visa_35x35mm",
          "docType": "visa",
          "name": "Gabon visa 35x35 mm (3.5x3.5 cm)"
        }]
      },
      "IR": {
        "code": "IR",
        "docs": [{
          "code": "ir_evisa",
          "docType": "visa",
          "name": "Iran e-visa 600x400 pixels"
        }]
      },
      "SY": {
        "code": "SY",
        "docs": [{
          "code": "sy_passport_2x2in_5x5cm",
          "docType": "passport",
          "name": "Syrian passport 2x2 inches (5x5 cm, 51x51 mm)"
        }, {
          "code": "sy_residence",
          "docType": "id",
          "name": "Syrian residence"
        }, {
          "code": "sy_passport",
          "docType": "passport",
          "name": "Syrian passport 40x60 mm (4x6 cm)"
        }, {
          "code": "sy_id_card",
          "docType": "id",
          "name": "Syrian ID card 40x60 mm (4x6 cm)"
        }, {
          "code": "sy_visa",
          "docType": "visa",
          "name": "Syrian visa 40x60 mm (4x6 cm)"
        }]
      },
      "EG": {
        "code": "EG",
        "docs": [{
          "code": "eg_passport_4x6",
          "docType": "passport",
          "name": "Egypt passport 40x60 mm (4x6 cm)"
        }, {
          "code": "eg_visa_4x6cm",
          "docType": "visa",
          "name": "Egypt visa 40x60 mm (4x6 cm)"
        }, {
          "code": "eg_passport_2x2",
          "docType": "passport",
          "name": "Egypt passport (from USA only) 2x2 inch, 51x51 mm"
        }, {
          "code": "eg_visa_2x2",
          "docType": "visa",
          "name": "Egypt visa 2x2 inch, 51x51 mm"
        }]
      },
      "DZ": {
        "code": "DZ",
        "docs": [{
          "code": "dz_passport",
          "docType": "passport",
          "name": "Algeria passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "dz_visa",
          "docType": "visa",
          "name": "Algeria visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "dz_id_card_35x45mm",
          "docType": "id",
          "name": "Algeria ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "dz_residence_35x45mm",
          "docType": "id",
          "name": "Algeria residence 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "dz_work_permit_35x45mm",
          "docType": "other",
          "name": "Algerian work permit 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "DJ": {
        "code": "DJ",
        "docs": [{
          "code": "dj_visa",
          "docType": "visa",
          "name": "Djibouti visa 2x2 inches (51x51 mm, 5x5 cm)"
        }, {
          "code": "dj_passport",
          "docType": "passport",
          "name": "Djibouti passport 3.5x3.5 cm (35x35 mm)"
        }, {
          "code": "dj_id_card",
          "docType": "id",
          "name": "Djibouti ID card 3.5x3.5 cm (35x35 mm)"
        }]
      },
      "BH": {
        "code": "BH",
        "docs": [{
          "code": "bh_passport",
          "docType": "passport",
          "name": "Bahrain passport 4x6 cm (40x60 mm)"
        }, {
          "code": "bh_visa",
          "docType": "visa",
          "name": "Bahrain visa 4x6 cm (40x60 mm)"
        }, {
          "code": "bh_id_card_240x320_pixels",
          "docType": "id",
          "name": "Bahrain ID card 240x320 pixels"
        }]
      },
      "TN": {
        "code": "TN",
        "docs": [{
          "code": "tn_passport",
          "docType": "passport",
          "name": "Tunisia passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "tn_visa_35x45mm",
          "docType": "visa",
          "name": "Tunisia visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "tn_id_card_35x45mm",
          "docType": "id",
          "name": "Tunisia ID card 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "tn_residence_35x45mm",
          "docType": "id",
          "name": "Tunisia residence 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "tn_passport_2x2",
          "docType": "passport",
          "name": "Tunisia passport 2x2 inch (from USA)"
        }]
      },
      "IQ": {
        "code": "IQ",
        "docs": [{
          "code": "iq_passport_35x45mm",
          "docType": "passport",
          "name": "Iraq passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "iq_visa",
          "docType": "visa",
          "name": "Iraq visa 5x5 cm (51x51 mm, 2x2 inch)"
        }, {
          "code": "iq_id_card",
          "docType": "id",
          "name": "Iraq ID card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "iq_residence_35x45mm",
          "docType": "id",
          "name": "Iraq residence 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "iq_passport_5x5",
          "docType": "passport",
          "name": "Iraq passport 5x5 cm (51x51 mm, 2x2 inches)"
        }]
      },
      "MA": {
        "code": "MA",
        "docs": [{
          "code": "ma_visa_35x45mm",
          "docType": "visa",
          "name": "Morocco visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ma_passport",
          "docType": "passport",
          "name": "Morocco passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ma_nid",
          "docType": "id",
          "name": "Morocco National ID Card 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ma_residence_35x45mm",
          "docType": "id",
          "name": "Morocco residence 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "BB": {
        "code": "BB",
        "docs": [{
          "code": "bb_passport",
          "docType": "passport",
          "name": "Barbados Passport 5x5 cm"
        }, {
          "code": "bb_visa",
          "docType": "visa",
          "name": "Barbados visa 5x5 cm"
        }]
      },
      "JO": {
        "code": "JO",
        "docs": [{
          "code": "jo_passport",
          "docType": "passport",
          "name": "Jordan passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "jo_visa_35x45mm",
          "docType": "visa",
          "name": "Jordan visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "jo_id_card_35x45mm",
          "docType": "id",
          "name": "Jordan ID card 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "jo_residence_35x45mm",
          "docType": "id",
          "name": "Jordan residence 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "jo_work_permit_35x45mm",
          "docType": "other",
          "name": "Jordan work permit 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "jo_passport_2x2",
          "docType": "passport",
          "name": "Jordan passport 2x2 inch from USA (51x51 mm)"
        }, {
          "code": "jo_id_card_2x2",
          "docType": "id",
          "name": "Jordan 2x2 inch ID card in USA (51x51 mm)"
        }]
      },
      "LB": {
        "code": "LB",
        "docs": [{
          "code": "lb_visa_35x45mm",
          "docType": "visa",
          "name": "Lebanon visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lb_passport",
          "docType": "passport",
          "name": "Lebanon passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lb_id_card_35x45mm",
          "docType": "id",
          "name": "Lebanon ID card 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lb_residence_35x45mm",
          "docType": "id",
          "name": "Lebanon residence 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lb_work_permit_35x45mm",
          "docType": "id",
          "name": "Lebanese work permit 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lb_passport_35x43_mm",
          "docType": "passport",
          "name": "Lebanon passport 35x43 mm"
        }]
      },
      "LA": {
        "code": "LA",
        "docs": [{
          "code": "la_visa_4x6",
          "docType": "visa",
          "name": "Laos visa 4x6 cm"
        }, {
          "code": "la_visa_3x4",
          "docType": "visa",
          "name": "Laos visa 3x4 cm"
        }, {
          "code": "la_passport_4x6",
          "docType": "passport",
          "name": "Laos passport 4x6 cm"
        }, {
          "code": "la_adoption_visa",
          "docType": "visa",
          "name": "Laos adoption visa 2x2 inch"
        }]
      },
      "BD": {
        "code": "BD",
        "docs": [{
          "code": "bd_electronic_visa_35x45",
          "docType": "visa",
          "name": "Bangladesh e-visa 45x35 mm"
        }, {
          "code": "bd_passport_40x50",
          "docType": "passport",
          "name": "Bangladesh passport 40x50 mm (4x5 cm)"
        }, {
          "code": "bd_passport_55x45",
          "docType": "passport",
          "name": "Bangladesh passport 55x45 mm (5.5x4.5 cm)"
        }, {
          "code": "bd_passport_45x35",
          "docType": "passport",
          "name": "Bangladesh passport application 45x35 mm (4.5x3.5 cm)"
        }, {
          "code": "bd_passport_30x25",
          "docType": "passport",
          "name": "Bangladesh passport 30x25 mm (3x2.5 cm)"
        }, {
          "code": "bd_driving_license",
          "docType": "driving",
          "name": "Bangladesh driving license 35x45 mm"
        }, {
          "code": "bd_dual_nationality_40x50",
          "docType": "passport",
          "name": "Bangladesh dual nationality 40x50 mm (4x5 cm)"
        }, {
          "code": "bd_visa_45x35",
          "docType": "visa",
          "name": "Bangladesh visa 45x35 mm"
        }, {
          "code": "bd_visa_37x37",
          "docType": "visa",
          "name": "Bangladesh visa 37x37 mm"
        }]
      },
      "CO": {
        "code": "CO",
        "docs": [{
          "code": "co_visa_online_3x4cm",
          "docType": "visa",
          "name": "Colombian visa online 3x4 cm (4x3 cm)"
        }, {
          "code": "co_id_cedula_4x5",
          "docType": "id",
          "name": "Colombia citizenship card (cedula) 4x5 cm (40x50 mm)"
        }, {
          "code": "co_visa_residente_3x4cm",
          "docType": "visa",
          "name": "Colombian residence visa 3x4 cm"
        }, {
          "code": "co_tarjeta_de_identidad",
          "docType": "ID card",
          "name": "Colombia ID card 4x5 cm"
        }, {
          "code": "co_nacionalidad",
          "docType": "other",
          "name": "Colombia nationallity 4x5 cm"
        }, {
          "code": "co_driving_license",
          "docType": "driving",
          "name": "Colombia driving license 3x4 cm"
        }]
      },
      "CM": {
        "code": "CM",
        "docs": [{
          "code": "cm_passport_4x4",
          "docType": "passport",
          "name": "Cameroon passport 4x4 cm (40x40 mm)"
        }, {
          "code": "cm_passport_4x5",
          "docType": "passport",
          "name": "Cameroon passport 4x5 cm (40x50 mm)"
        }, {
          "code": "cm_passport_35x45",
          "docType": "passport",
          "name": "Cameroon passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "cm_passport_2x2inch",
          "docType": "passport",
          "name": "Cameroon passport 2x2 inch"
        }, {
          "code": "cm_visa_4x4",
          "docType": "visa",
          "name": "Cameroon visa 4x4 cm (40x40 mm)"
        }, {
          "code": "cm_visa_2x2inch",
          "docType": "visa",
          "name": "Cameroon visa 2x2 inch"
        }, {
          "code": "cm_visa_online_500x500px",
          "docType": "visa",
          "name": "Cameroon visa online 500x500 px"
        }]
      },
      "MZ": {
        "code": "MZ",
        "docs": [{
          "code": "mz_visa_35x45mm",
          "docType": "visa",
          "name": "Mozambique visa 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "BW": {
        "code": "BW",
        "docs": [{
          "code": "bw_visa_3x4cm",
          "docType": "visa",
          "name": "Botswana visa 3x4 cm (30x40 mm)"
        }, {
          "code": "bw_passport",
          "docType": "passport",
          "name": "Botswana passport 3x4 cm (30x40 mm)"
        }, {
          "code": "bw_residence_permit_3x4cm",
          "docType": "id",
          "name": "Botswana residence permit 3x4 cm (30x40 mm)"
        }]
      },
      "GQ": {
        "code": "GQ",
        "docs": [{
          "code": "gq_visa_35x54mm",
          "docType": "visa",
          "name": "Equatorial Guinea visa 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "LR": {
        "code": "LR",
        "docs": [{
          "code": "lr_passport",
          "docType": "passport",
          "name": "Liberia passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "lr_seafarer_certification",
          "docType": "id",
          "name": "Liberia Seafarer's Certification 45x45 mm (1.75x1.75 inch)"
        }]
      },
      "NA": {
        "code": "NA",
        "docs": [{
          "code": "na_passport_37x52mm",
          "docType": "passport",
          "name": "Namibia passport 37x52mm (3.7x5.2 cm)"
        }, {
          "code": "na_passport_2x2_inch",
          "docType": "passport",
          "name": "Namibia passport 2x2 inch (51x51 mm)"
        }, {
          "code": "na_visa_37x52mm",
          "docType": "visa",
          "name": "Namibia visa 37x52mm (3.7x5.2 cm)"
        }, {
          "code": "na_visa_35x45mm",
          "docType": "visa",
          "name": "Namibia visa from Europe 35x45mm (3.5x4.5 cm)"
        }]
      },
      "AR": {
        "code": "AR",
        "docs": [{
          "code": "ar_dni_4x4_cm",
          "docType": "id",
          "name": "Argentina DNI 4x4 cm (40x40 mm)"
        }, {
          "code": "ar_passport_4x4_cm",
          "docType": "passport",
          "name": "Argentina passport 4x4 cm (40x40 mm)"
        }, {
          "code": "ar_visa_4x4_cm",
          "docType": "visa",
          "name": "Argentina visa 4x4 cm (40x40 mm)"
        }, {
          "code": "ar_passport_15x15_inch",
          "docType": "passport",
          "name": "Argentina passport in USA 1.5x1.5 inch"
        }, {
          "code": "ar_visa_15x15_inch",
          "docType": "visa",
          "name": "Argentina visa in USA 1.5x1.5 inch"
        }]
      },
      "AF": {
        "code": "AF",
        "docs": [{
          "code": "af_passport_40x45",
          "docType": "passport",
          "name": "Afghanistan passport 4x4.5 cm (40x45 mm)"
        }, {
          "code": "af_e_tazkira_3x4cm",
          "docType": "id",
          "name": "Afghanistan ID card (e-tazkira) 3x4 cm"
        }, {
          "code": "af_passport_5x5",
          "docType": "passport",
          "name": "Afghanistan passport 5x5 cm (50x50 mm)"
        }, {
          "code": "af_visa_35x45",
          "docType": "visa",
          "name": "Afghanistan visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "af_visa_2x2",
          "docType": "visa",
          "name": "Afghanistan visa 2x2 inch (from the USA)"
        }]
      },
      "ET": {
        "code": "ET",
        "docs": [{
          "code": "et_visa",
          "docType": "visa",
          "name": "Ethiopia e-visa online 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "et_visa_3x4",
          "docType": "visa",
          "name": "Ethiopia visa offline 3x4 cm (30x40 mm)"
        }, {
          "code": "et_passport_3x4",
          "docType": "passport",
          "name": "Ethiopia passport 3x4 cm (30x40 mm)"
        }, {
          "code": "et_origin_card_3x4",
          "docType": "id",
          "name": "Ethiopia origin card 3x4 cm (30x40 mm)"
        }, {
          "code": "et_origin_card_2x3",
          "docType": "id",
          "name": "Identification Card for Ethiopian Origin 2x3 cm (20x30 mm)"
        }]
      },
      "LS": {
        "code": "LS",
        "docs": [{
          "code": "ls_evisa_2x2inch",
          "docType": "visa",
          "name": "Lesotho e-visa 2x2 inches"
        }]
      },
      "ZM": {
        "code": "ZM",
        "docs": [{
          "code": "zm_visa",
          "docType": "visa",
          "name": "Zambia visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "zm_visa_2x2inch",
          "docType": "visa",
          "name": "Zambia visa 2x2 inches (from USA)"
        }, {
          "code": "zm_passport_1_5x2inch",
          "docType": "passport",
          "name": "Zambia passport 1.5x2 inches (51x38 mm)"
        }]
      },
      "MN": {
        "code": "MN",
        "docs": [{
          "code": "mn_visa_3x4cm",
          "docType": "visa",
          "name": "Mongolia visa 3x4 cm (30x40 mm)"
        }, {
          "code": "mn_passport_35x45mm",
          "docType": "passport",
          "name": "Mongolia passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "mn_citizenship_4x6cm",
          "docType": "id",
          "name": "Mongolia citizenship 4x6 cm (40x60 mm)"
        }, {
          "code": "mn_residence_permit_3x4cm",
          "docType": "id",
          "name": "Mongolia residence permit 3x4 cm (30x40 mm)"
        }]
      },
      "LK": {
        "code": "LK",
        "docs": [{
          "code": "lk_visa_35x45mm",
          "docType": "visa",
          "name": "Sri Lanka visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lk_passport_35x45mm",
          "docType": "passport",
          "name": "Sri Lanka passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lk_id_card_35x45mm",
          "docType": "id",
          "name": "Sri Lanka ID card 35x45 mm (3.5x4.5 cm) blue background"
        }, {
          "code": "lk_dual_citizenship_35x45mm",
          "docType": "id",
          "name": "Sri Lanka dual citizenship 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "lk_driving_licence_35x45mm",
          "docType": "driving",
          "name": "Sri Lanka driving licence 3.5x4.5 cm (35x45 mm)"
        }]
      },
      "AO": {
        "code": "AO",
        "docs": [{
          "code": "ao_visa",
          "docType": "visa",
          "name": "Angola visa 3x4 cm (30x40 mm)"
        }, {
          "code": "ao_visa_online",
          "docType": "visa",
          "name": "Angola visa online 381x496 pixels"
        }]
      },
      "NG": {
        "code": "NG",
        "docs": [{
          "code": "ng_visa_online",
          "docType": "visa",
          "name": "Nigeria online visa 200-450 pixels"
        }, {
          "code": "ng_visa_35x45mm",
          "docType": "visa",
          "name": "Nigeria visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "ng_nnpc_recruitment",
          "docType": "other",
          "name": "NNPC recruitement 5x5 cm (600x600 px)"
        }]
      },
      "MG": {
        "code": "MG",
        "docs": [{
          "code": "mg_visa_35x45mm",
          "docType": "visa",
          "name": "Madagascar visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "mg_visa_40x40_mm",
          "docType": "visa",
          "name": "Madagascar visa 40x40 mm"
        }, {
          "code": "mg_carte_didentite_40x40_mm",
          "docType": "ID",
          "name": "Madagascar ID card 40x40 mm"
        }, {
          "code": "mg_passport_40x40_mm",
          "docType": "passport",
          "name": "Madagascar passport 40x40 mm"
        }, {
          "code": "mg_visa_5x5cm",
          "docType": "visa",
          "name": "Madagascar visa 5x5 cm (50x50 mm)"
        }, {
          "code": "mg_visa_2x2inch",
          "docType": "visa",
          "name": "Madagascar visa 2x2 inches"
        }]
      },
      "BT": {
        "code": "BT",
        "docs": [{
          "code": "bt_passport_45x35mm",
          "docType": "passport",
          "name": "Bhutan passport 45x35mm (4.5x3.5 cm)"
        }]
      },
      "PG": {
        "code": "PG",
        "docs": [{
          "code": "pg_passport_35x45mm",
          "docType": "passport",
          "name": "Papua New Guinea passport 35x45mm (3.5x4.5 cm)"
        }, {
          "code": "pg_citizenship_35x45mm",
          "docType": "id",
          "name": "Papua New Guinea citizenship 35x45mm (3.5x4.5 cm)"
        }]
      },
      "TG": {
        "code": "TG",
        "docs": [{
          "code": "tg_visa_45x35mm",
          "docType": "visa",
          "name": "Togo visa 4.5x3.5 cm (45x35mm)"
        }, {
          "code": "tg_passport_45x35mm",
          "docType": "passport",
          "name": "Togo passport 4.5x3.5 cm (45x35mm)"
        }]
      },
      "GY": {
        "code": "GY",
        "docs": [{
          "code": "gy_passport_32x26mm",
          "docType": "passport",
          "name": "Guyana passport 32x26 mm (1.26x1.02 inch)"
        }, {
          "code": "gy_passport_45x35mm",
          "docType": "passport",
          "name": "Guyana passport 45x35 mm (1.77 x 1.38 inch)"
        }]
      },
      "FJ": {
        "code": "FJ",
        "docs": [{
          "code": "fj_passport_35x45mm",
          "docType": "passport",
          "name": "Fiji passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "JM": {
        "code": "JM",
        "docs": [{
          "code": "jm_passport35x45mm",
          "docType": "passport",
          "name": "Jamaica passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "jm_passport35x45mm_blue_bg",
          "docType": "passport",
          "name": "Jamaica passport 35x45 mm pale blue background"
        }]
      },
      "DM": {
        "code": "DM",
        "docs": [{
          "code": "dm_passport_45x38mm",
          "docType": "passport",
          "name": "Dominica passport 45x38 mm (1 3/4 x 1 1/2 inches)"
        }]
      },
      "SC": {
        "code": "SC",
        "docs": [{
          "code": "sc_passport_35x45mm",
          "docType": "passport",
          "name": "Seychelles passport 35x45 mm (up to 45x50 mm)"
        }]
      },
      "MU": {
        "code": "MU",
        "docs": [{
          "code": "mu_passport_35x45mm",
          "docType": "passport",
          "name": "Mauritius passport 35x45 mm (up to 40x50mm)"
        }]
      },
      "CY": {
        "code": "CY",
        "docs": [{
          "code": "cy_id_card_35x45mm",
          "docType": "id",
          "name": "Cyprus ID card (Cypriot identity card) 35x45 mm"
        }, {
          "code": "cy_passport_4x5cm",
          "docType": "passport",
          "name": "Cyprus passport 4x5 cm (40x50 mm)"
        }, {
          "code": "cy_visa_35x45mm",
          "docType": "visa",
          "name": "Cyprus visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "cy_id_card_4x3cm",
          "docType": "id",
          "name": "Cyprus ID card (Cypriot identity card) 4x3 cm"
        }, {
          "code": "cy_visa_2x2in",
          "docType": "visa",
          "name": "Cyprus visa 2x2 inches from USA"
        }]
      },
      "BN": {
        "code": "BN",
        "docs": [{
          "code": "bn_passport_52x40mm",
          "docType": "passport",
          "name": "Brunei passport 5.2x4 cm (52x40 mm)"
        }, {
          "code": "bn_sijil_darurat",
          "docType": "other",
          "name": "Brunei Emergency Certificate (Sijil Darurat) 3.5x4.2 cm (35x42 mm)"
        }]
      },
      "UN": {
        "code": "UN",
        "docs": [{
          "code": "un_us_berkley",
          "docType": "uni",
          "name": "Berkeley Cal 1 Card photo 1.5x2 inch or 600x800px"
        }, {
          "code": "un_peru_ucv",
          "docType": "uni",
          "name": "Universidad César Vallejo (Peru) 240x288 pixels"
        }, {
          "code": "un_240x288_pixeles_universidad_nacional_de_canete",
          "docType": "other",
          "name": "The National University of Cañete 240x288 px"
        }, {
          "code": "un_240x288_pixeles_universidad_de_lima",
          "docType": "other",
          "name": "The University of Lima 240x288 px"
        }, {
          "code": "un_university_of_edinburgh",
          "docType": "uni",
          "name": "The University of Edinburgh 413x531 px"
        }, {
          "code": "un_us_uva",
          "docType": "uni",
          "name": "University of Virginia ID Card 500x500 px"
        }, {
          "code": "un_us_harvard",
          "docType": "uni",
          "name": "Harvard University ID Card 280x296 px"
        }, {
          "code": "un_gb_nottingham",
          "docType": "uni",
          "name": "Nottingham University Card 420x420 px"
        }, {
          "code": "un_nz_auckland",
          "docType": "uni",
          "name": "University of Auckland ID Card 1125x1500 px"
        }, {
          "code": "un_us_columbia",
          "docType": "uni",
          "name": "Columbia University ID Card 500x500 px"
        }, {
          "code": "un_us_lehigh",
          "docType": "uni",
          "name": "Lehigh University ID 600x600 px"
        }, {
          "code": "un_us_washington",
          "docType": "uni",
          "name": "American University One Card 300x375 px"
        }, {
          "code": "un_us_connecticut",
          "docType": "uni",
          "name": "Connecticut University UConn HuskyOne Card 300x400 px"
        }, {
          "code": "un_gb_bristol",
          "docType": "uni",
          "name": "University of Bristol UCard 390x520 px"
        }, {
          "code": "un_us_letourneau",
          "docType": "uni",
          "name": "LeTourneau University Photo ID Card 360x375 px"
        }, {
          "code": "un_us_mary_washington",
          "docType": "uni",
          "name": "University of Mary Washington EagleOne Card 300x330 px"
        }, {
          "code": "un_us_wayne",
          "docType": "uni",
          "name": "Wayne State University OneCard 300x300 px"
        }, {
          "code": "un_us_millersville",
          "docType": "uni",
          "name": "Millersville University ID Card 300x300 px"
        }, {
          "code": "un_us_southeastern_louisiana",
          "docType": "uni",
          "name": "Southeastern's ID Card Online 300x300 px"
        }, {
          "code": "un_us_miami",
          "docType": "uni",
          "name": "Miami University ID 300x300 px"
        }, {
          "code": "un_ca_guelph_humber",
          "docType": "uni",
          "name": "University of Guelph-Humber Student ID 400x533 px"
        }, {
          "code": "un_us_west_virginia_university",
          "docType": "uni",
          "name": "West Virginia University 300x300 px"
        }, {
          "code": "un_us_clemson",
          "docType": "uni",
          "name": "Clemson University TigerOne Card 400x400 px"
        }, {
          "code": "un_us_pittsburgh",
          "docType": "uni",
          "name": "University of Pittsburgh Panther Card 260x300 px"
        }, {
          "code": "un_us_northwestern",
          "docType": "uni",
          "name": "Northwestern University WildCARD 600x600 px"
        }]
      },
      "TM": {
        "code": "TM",
        "docs": [{
          "code": "tm_visa_5x6cm",
          "docType": "visa",
          "name": "Turkmenistan visa 5x6 cm (50x60 mm)"
        }, {
          "code": "tm_passport_30x40mm",
          "docType": "passport",
          "name": "Turkmenistan passport 3x4 cm (30x40 mm)"
        }]
      },
      "SR": {
        "code": "SR",
        "docs": [{
          "code": "sr_visa_online",
          "docType": "visa",
          "name": "Suriname visa online"
        }, {
          "code": "sr_passport_45x35mm",
          "docType": "passport",
          "name": "Suriname passport 45x35 mm (1.77x1.37 inch)"
        }, {
          "code": "sr_visa_45x35mm",
          "docType": "visa",
          "name": "Suriname visa 45x35 mm (1.77x1.37 inch)"
        }, {
          "code": "sr_passport_50x35mm",
          "docType": "passport",
          "name": "Suriname passport 50x35 mm"
        }]
      },
      "UZ": {
        "code": "UZ",
        "docs": [{
          "code": "uz_visa_35x45mm",
          "docType": "visa",
          "name": "Uzbekistan visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "uz_passport_35x45",
          "docType": "passport",
          "name": "Uzbekistan passport 35x45 mm"
        }, {
          "code": "uz_citizenship",
          "docType": "id",
          "name": "Uzbekistan citizenship 35x45 mm"
        }]
      },
      "GH": {
        "code": "GH",
        "docs": [{
          "code": "gh_visa_35x45mm",
          "docType": "visa",
          "name": "Ghana visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "gh_passport_35x45mm",
          "docType": "passport",
          "name": "Ghana passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "gh_visa_3x4cm",
          "docType": "visa",
          "name": "Ghana visa 3x4 cm (30x40 mm) from Brazil"
        }]
      },
      "BJ": {
        "code": "BJ",
        "docs": [{
          "code": "bj_visa_35x45mm",
          "docType": "visa",
          "name": "Benin visa 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "bj_passport_35x45mm",
          "docType": "passport",
          "name": "Benin passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "bj_passport_2x2in",
          "docType": "passport",
          "name": "Benin passport 2x2 inch from USA"
        }]
      },
      "AL": {
        "code": "AL",
        "docs": [{
          "code": "al_visa_47x36mm",
          "docType": "visa",
          "name": "Albania visa and e-visa 47x36mm"
        }, {
          "code": "al_driving",
          "docType": "driving",
          "name": "Albania driving licence 4x5 cm"
        }]
      },
      "MV": {
        "code": "MV",
        "docs": [{
          "code": "mv_passport_35x45mm",
          "docType": "passport",
          "name": "Maldives passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "WS": {
        "code": "WS",
        "docs": [{
          "code": "ws_visa_45x35mm",
          "docType": "visa",
          "name": "Samoa visa 45x35 mm (4.5x3.5 cm)"
        }, {
          "code": "ws_passport_45x35mm",
          "docType": "passport",
          "name": "Samoa passport 45x35 mm (4.5x3.5 cm)"
        }]
      },
      "CI": {
        "code": "CI",
        "docs": [{
          "code": "ci_visa_45x35mm",
          "docType": "visa",
          "name": "Cote d'Ivoire visa 4.5x3.5 cm (45x35 mm)"
        }]
      },
      "SL": {
        "code": "SL",
        "docs": [{
          "code": "sl_visa_35x45mm",
          "docType": "visa",
          "name": "Sierra Leone visa 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "MT": {
        "code": "MT",
        "docs": [{
          "code": "mt_passport_40x30mm",
          "docType": "passport",
          "name": "Malta passport 40x30 mm (4x3 cm)"
        }, {
          "code": "mt_visa",
          "docType": "visa",
          "name": "Malta visa 35x45 mm"
        }, {
          "code": "mt_passport_disabled_35x45mm",
          "docType": "passport",
          "name": "Malta passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "SD": {
        "code": "SD",
        "docs": [{
          "code": "sd_passport_4x5cm",
          "docType": "passport",
          "name": "Sudan passport 40x50 mm (4x5 cm)"
        }, {
          "code": "sd_id_card_4x5cm",
          "docType": "id",
          "name": "Sudan ID card 40x50 mm (4x5 cm)"
        }, {
          "code": "sd_visa_4x5cm",
          "docType": "visa",
          "name": "Sudan visa 40x50 mm (4x5 cm)"
        }]
      },
      "CD": {
        "code": "CD",
        "docs": [{
          "code": "cd_passport_35x45mm",
          "docType": "passport",
          "name": "Democratic Republic of Congo passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "BF": {
        "code": "BF",
        "docs": [{
          "code": "bf_passport_45x35mm",
          "docType": "passport",
          "name": "Burkina Faso passport 4.5x3.5 cm (45x35 mm)"
        }, {
          "code": "bf_visa_45x35mm",
          "docType": "visa",
          "name": "Burkina Faso visa 4.5x3.5 cm (45x35 mm)"
        }]
      },
      "MW": {
        "code": "MW",
        "docs": [{
          "code": "mw_passport_45x35mm",
          "docType": "passport",
          "name": "Malawi passport 4.5x3.5 cm (45x35 mm)"
        }]
      },
      "CG": {
        "code": "CG",
        "docs": [{
          "code": "cg_evisa",
          "docType": "visa",
          "name": "Congo (Brazzaville) e-visa"
        }, {
          "code": "cg_visa_4x4cm",
          "docType": "visa",
          "name": "Congo (Brazzaville) visa 4x4 cm (40x40 mm)"
        }, {
          "code": "cg_visa_2x2in",
          "docType": "visa",
          "name": "Congo (Brazzaville) visa 2x2 inches (from US, Canada, Mexico)"
        }, {
          "code": "cg_passport_35x45mm",
          "docType": "passport",
          "name": "Congo (Brazzaville) passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "cg_passport_4x4cm",
          "docType": "passport",
          "name": "Congo (Brazzaville) passport 4x4 cm (40x40 mm)"
        }, {
          "code": "cg_passport_2x2in",
          "docType": "passport",
          "name": "Congo (Brazzaville) passport 2x2 inches (from US, Canada, Mexico)"
        }]
      },
      "GW": {
        "code": "GW",
        "docs": [{
          "code": "gw_visa_3x4cm",
          "docType": "visa",
          "name": "Guinea-Bissau visa 3x4 cm (30x40 mm)"
        }, {
          "code": "gw_evisa",
          "docType": "visa",
          "name": "Guinea-Bissau e-visa"
        }]
      },
      "NE": {
        "code": "NE",
        "docs": [{
          "code": "ne_visa_2x2inch",
          "docType": "visa",
          "name": "Niger visa 2x2 inches (from USA)"
        }]
      },
      "TD": {
        "code": "TD",
        "docs": [{
          "code": "td_passport_50x50mm",
          "docType": "passport",
          "name": "Chad passport 50x50mm (5x5 cm)"
        }]
      },
      "TJ": {
        "code": "TJ",
        "docs": [{
          "code": "tj_passport_35x45mm",
          "docType": "passport",
          "name": "Tajikistan passport 3.5x4.5 cm (35x45 mm)"
        }, {
          "code": "tj_visa_5x6cm",
          "docType": "visa",
          "name": "Tajikistan e-visa 5x6 cm (50x60 mm)"
        }]
      },
      "KG": {
        "code": "KG",
        "docs": [{
          "code": "kg_passport_4x6cm",
          "docType": "passport",
          "name": "Kyrgyzstan passport 4x6 cm (40x60 mm)"
        }, {
          "code": "kg_evisa",
          "docType": "visa",
          "name": "Kyrgyzstan visa 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "OM": {
        "code": "OM",
        "docs": [{
          "code": "om_passport_4x6cm",
          "docType": "passport",
          "name": "Oman passport 4x6 cm (40x60 mm)"
        }, {
          "code": "om_visa_4x6cm",
          "docType": "visa",
          "name": "Oman visa 4x6 cm (40x60 mm)"
        }, {
          "code": "om_id_card_4x6cm",
          "docType": "id",
          "name": "Oman ID card 4x6 cm (40x60 mm)"
        }, {
          "code": "om_residence_4x6cm",
          "docType": "id",
          "name": "Oman residence 4x6 cm (40x60 mm)"
        }, {
          "code": "om_work_permit_4x6cm",
          "docType": "other",
          "name": "Oman work permit 4x6 cm (40x60 mm)"
        }]
      },
      "PS": {
        "code": "PS",
        "docs": [{
          "code": "ps_passport_35x45mm",
          "docType": "passport",
          "name": "Palestine passport 35x45mm blue background"
        }, {
          "code": "ps_visa_3x4cm",
          "docType": "visa",
          "name": "Palestine visa 30x40mm (3x4 cm)"
        }, {
          "code": "ps_id_card_35x45mm",
          "docType": "id",
          "name": "Palestine ID card 35x45mm blue background"
        }]
      },
      "SA": {
        "code": "SA",
        "docs": [{
          "code": "sa_evisa_200x200px",
          "docType": "visa",
          "name": "Saudi Arabia e-visa online 200x200 px for visitsaudi.com"
        }, {
          "code": "sa_evisa_200x200_enjazit",
          "docType": "visa",
          "name": "Saudi Arabia e-visa online via enjazit.com.sa"
        }, {
          "code": "sa_passport_4x6cm",
          "docType": "passport",
          "name": "Saudi Arabia passport 4x6 cm"
        }, {
          "code": "sa_visa_2x2in",
          "docType": "visa",
          "name": "Saudi Arabia visa 2x2 inches (51x51 mm)"
        }, {
          "code": "sa_id_card_4x6cm",
          "docType": "id",
          "name": "Saudi Arabia ID card 4x6 cm"
        }, {
          "code": "sa_work_permit_4x6cm",
          "docType": "other",
          "name": "Saudi Arabia work permit 4x6 cm"
        }]
      },
      "YE": {
        "code": "YE",
        "docs": [{
          "code": "ye_passport_6x4cm",
          "docType": "passport",
          "name": "Yemen passport 6x4 cm"
        }, {
          "code": "ye_id_card_4x6cm",
          "docType": "id",
          "name": "Yemen ID card 4x6 cm"
        }, {
          "code": "ye_visa_4x6cm",
          "docType": "visa",
          "name": "Yemen visa 4x6 cm"
        }]
      },
      "EE": {
        "code": "EE",
        "docs": [{
          "code": "ee_id_card_40x50mm",
          "docType": "id",
          "name": "Estonia ID card (ID-kaart) 40x50 mm (4x5 cm)"
        }, {
          "code": "ee_passport_40x50mm",
          "docType": "passport",
          "name": "Estonia passport 40x50 mm (4x5 cm)"
        }, {
          "code": "ee_residents_digital_identity_card_1300x1600px",
          "docType": "id",
          "name": "Estonia resident digital identity card 1300x1600 pixels"
        }, {
          "code": "ee_driving_license",
          "docType": "driving",
          "name": "Estonia driving license 35x45 mm"
        }, {
          "code": "ee_aliens_passport_40x50mm",
          "docType": "passport",
          "name": "Estonia aliens passport (välismaalase pass) 40x50 mm (4x5 cm)"
        }, {
          "code": "ee_visa_40x50mm",
          "docType": "visa",
          "name": "Estonia visa 40x50 mm (4x5 cm)"
        }, {
          "code": "ee_long_stay_visa_35x45mm",
          "docType": "visa",
          "name": "Estonia long stay D visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "ee_weapons_permit_30x40mm",
          "docType": "other",
          "name": "Estonia weapons permit 30x40 mm (3x4 cm)"
        }]
      },
      "KM": {
        "code": "KM",
        "docs": [{
          "code": "km_visa",
          "docType": "visa",
          "name": "Comoros visa 2x2 inches"
        }, {
          "code": "km_id_card",
          "docType": "id",
          "name": "Comoros ID card 2x2 inches"
        }]
      },
      "LY": {
        "code": "LY",
        "docs": [{
          "code": "ly_visa_4x6cm",
          "docType": "visa",
          "name": "Libya visa 4x6 cm (40x60 mm)"
        }, {
          "code": "ly_passport_4x6cm",
          "docType": "passport",
          "name": "Libya passport 4x6 cm (40x60 mm)"
        }, {
          "code": "ly_id_card_4x6cm",
          "docType": "id",
          "name": "Libya ID card 4x6 cm (40x60 mm)"
        }]
      },
      "MR": {
        "code": "MR",
        "docs": [{
          "code": "mr_visa",
          "docType": "visa",
          "name": "Mauritania visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "mr_passport",
          "docType": "passport",
          "name": "Mauritania passport 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "mr_id_card",
          "docType": "id",
          "name": "Mauritania ID card 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "QA": {
        "code": "QA",
        "docs": [{
          "code": "qa_hayya_card",
          "docType": "other",
          "name": "Hayya card World Cup 2022 3x4 cm"
        }, {
          "code": "qa_visa_38x48mm",
          "docType": "visa",
          "name": "Qatar visa 38x48 mm (3.8x4.8 cm)"
        }, {
          "code": "qa_passport_2x2in",
          "docType": "passport",
          "name": "Qatar passport 2x2 inches (51x51 mm)"
        }, {
          "code": "qa_passport_38x48mm",
          "docType": "passport",
          "name": "Qatar passport 38x48 mm (3.8x4.8 cm)"
        }, {
          "code": "qa_passport_38x48mm_blue",
          "docType": "passport",
          "name": "Qatar passport 38x48 mm blue background"
        }, {
          "code": "qa_id_card_38x48mm",
          "docType": "id",
          "name": "Qatar ID card 38x48 mm (3.8x4.8 cm)"
        }, {
          "code": "qa_driving_licence",
          "docType": "driving",
          "name": "Qatar driving license 38x48 mm"
        }]
      },
      "SO": {
        "code": "SO",
        "docs": [{
          "code": "so_visa_35x45mm",
          "docType": "visa",
          "name": "Somalia visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "so_id_card",
          "docType": "id",
          "name": "Somalia ID card 4x6 cm"
        }]
      },
      "MD": {
        "code": "MD",
        "docs": [{
          "code": "md_buletin_de_identitate_3x4cm",
          "docType": "id",
          "name": "Moldova ID card (Buletin de identitate) 3x4 cm"
        }, {
          "code": "md_buletin_de_identitate_10x15cm",
          "docType": "id",
          "name": "Moldova ID card (Buletin de identitate) 10x15 cm"
        }, {
          "code": "md_visa_35x45mm",
          "docType": "visa",
          "name": "Moldova visa 35x45 mm (3.5x4.5 cm)"
        }, {
          "code": "md_dreptul_munca_sedere_50x60mm",
          "docType": "id",
          "name": "Moldova work and residence permit 50x60 mm (5x6 cm)"
        }]
      },
      "LT": {
        "code": "LT",
        "docs": [{
          "code": "lt_atk_40x60mm",
          "docType": "id",
          "name": "Lithuanian ID card 40x60 mm (4x6 cm)"
        }, {
          "code": "lt_pasas_40x60mm",
          "docType": "passport",
          "name": "Lithuania passport 40x60 mm (4x6 cm)"
        }, {
          "code": "lt_passport_35x45mm",
          "docType": "passport",
          "name": "Lithuanian passport 35x45 mm (3.5x4.5 cm)"
        }]
      },
      "TZ": {
        "code": "TZ",
        "docs": [{
          "code": "tz_passport",
          "docType": "passport",
          "name": "Tanzania passport 40x45 mm (4x4.5 cm)"
        }, {
          "code": "tz_visa",
          "docType": "visa",
          "name": "Tanzania visa 40x45 mm (4x4.5 cm)"
        }, {
          "code": "tz_azania_bank_2x2",
          "docType": "other",
          "name": "Tanzania Azania Bank 2x2 inch blue backgroound"
        }]
      },
      "AZ": {
        "code": "AZ",
        "docs": [{
          "code": "az_visa",
          "docType": "visa",
          "name": "Azerbaijan visa 30x40mm (3x4 cm)"
        }, {
          "code": "az_id",
          "docType": "id",
          "name": "Azerbaijan ID card 30x40mm (3x4 cm)"
        }]
      },
      "GN": {
        "code": "GN",
        "docs": [{
          "code": "gn_visa_online_150x214",
          "docType": "visa",
          "name": "Guinea Conakry e-visa for paf.gov.gn"
        }, {
          "code": "gn_visa",
          "docType": "visa",
          "name": "Guinea Conakry visa 35x50mm"
        }]
      },
      "PA": {
        "code": "PA",
        "docs": [{
          "code": "pa_visa",
          "docType": "visa",
          "name": "Panama Visa 2x2 inch"
        }, {
          "code": "pa_passport",
          "docType": "passport",
          "name": "Panama passport 35x45 mm"
        }, {
          "code": "pa_seamans_book_3x3cm",
          "docType": "other",
          "name": "Panama Seaman’s book 3x3 cm"
        }, {
          "code": "pa_seamans_book_4x4cm",
          "docType": "id",
          "name": "Panama Seaman’s book 4x4 cm"
        }, {
          "code": "pa_passport_canada",
          "docType": "passport",
          "name": "Panama passport from Canada"
        }, {
          "code": "pa_passport_usa",
          "docType": "passport",
          "name": "Panama passport from the USA"
        }]
      },
      "CR": {
        "code": "CR",
        "docs": [{
          "code": "cr_cedula_de_identidad_40x45_mm",
          "docType": "id",
          "name": "Costa Rica ID card 4x4.5 cm"
        }, {
          "code": "cr_passport",
          "docType": "passport",
          "name": "Costa Rica passport 2x2 inch, 5x5 cm, 51x51 mm"
        }, {
          "code": "cr_visa",
          "docType": "visa",
          "name": "Costa Rica visa 2x2 inch, 5x5 cm"
        }, {
          "code": "cr_cedula_de_identidad_30x35_mm",
          "docType": "id",
          "name": "Costa Rica ID card 3x3.5 cm"
        }]
      },
      "BO": {
        "code": "BO",
        "docs": [{
          "code": "bo_cedula_de_identidad",
          "docType": "id",
          "name": "Bolivia ID card 3x3 cm"
        }, {
          "code": "bo_visa",
          "docType": "visa",
          "name": "Bolivia visa 3x3 cm"
        }, {
          "code": "bo_passport",
          "docType": "passport",
          "name": "Bolivia passport 4x5 cm"
        }, {
          "code": "bo_certificado_de_vivencia",
          "docType": "visa",
          "name": "Bolivia certificate of residence 4x4 cm"
        }, {
          "code": "bo_salvoconducto",
          "docType": "other",
          "name": "Bolivia Safe conduct 3x4 cm"
        }, {
          "code": "bo_registro_de_nacimiento_de_adolescente",
          "docType": "other",
          "name": "Bolivia registration of birth 4x4 cm"
        }]
      },
      "PE": {
        "code": "PE",
        "docs": [{
          "code": "pe_dni",
          "docType": "id",
          "name": "Peru ID card 35x45 mm"
        }, {
          "code": "pe_visa_35x45",
          "docType": "visa",
          "name": "Peru visa 35x45 mm"
        }, {
          "code": "pe_driving_35x45",
          "docType": "driving",
          "name": "Peru driving license 35x45 mm"
        }, {
          "code": "pe_driving_25x35",
          "docType": "driving",
          "name": "Peru driving license 25x35 mm"
        }, {
          "code": "pe_visa_2x2",
          "docType": "visa",
          "name": "Peru visa 2x2 inch"
        }]
      },
      "PY": {
        "code": "PY",
        "docs": [{
          "code": "py_visa",
          "docType": "visa",
          "name": "Paraguay visa 5x5 cm"
        }, {
          "code": "py_passport",
          "docType": "passport",
          "name": "Paraguay passport 35x45 mm"
        }]
      },
      "BS": {
        "code": "BS",
        "docs": [{
          "code": "bs_passport_480x640",
          "docType": "passport",
          "name": "Bahamas passport 480x640 pixels"
        }, {
          "code": "bs_passport",
          "docType": "passport",
          "name": "Bahamas passport from USA 2x2 inch"
        }, {
          "code": "bs_visa",
          "docType": "visa",
          "name": "Bahamas visa 2x2 inch"
        }]
      },
      "IS": {
        "code": "IS",
        "docs": [{
          "code": "is_nafnskirteini",
          "docType": "id",
          "name": "Iceland ID card 35x45 mm"
        }, {
          "code": "is_visa",
          "docType": "visa",
          "name": "Iceland visa 35x45 mm"
        }, {
          "code": "is_atvinnuskirteini",
          "docType": "other",
          "name": "Iceland work licence 35x45 mm"
        }, {
          "code": "is_okuskirteini",
          "docType": "driving",
          "name": "Iceland driver's license 35x45 mm"
        }, {
          "code": "is_debetkort",
          "docType": "other",
          "name": "Iceland debit card 35x45 mm"
        }, {
          "code": "is_skirteini",
          "docType": "other",
          "name": "Iceland certificate 35x45 mm"
        }, {
          "code": "is_cv",
          "docType": "other",
          "name": "Iceland CV 35x45 mm"
        }, {
          "code": "is_byssuleyfi",
          "docType": "other",
          "name": "Iceland gun licence 35x45 mm"
        }, {
          "code": "is_vegabref",
          "docType": "passport",
          "name": "Iceland passport 35x45 mm"
        }]
      },
      "GD": {
        "code": "GD",
        "docs": [{
          "code": "gd_passport",
          "docType": "passport",
          "name": "Grenada passport 1.5x2 inch"
        }]
      },
      "LV": {
        "code": "LV",
        "docs": [{
          "code": "lv_passport",
          "docType": "passport",
          "name": "Latvia passport 35x45 mm"
        }, {
          "code": "lv_visa",
          "docType": "visa",
          "name": "Latvia visa 35x45 mm"
        }, {
          "code": "lv_residence",
          "docType": "visa",
          "name": "Latvia residence 35x45 mm"
        }, {
          "code": "lv_seamans_discharge_book",
          "docType": "other",
          "name": "Latvia Seaman's Discharge Book 35x45 mm"
        }]
      },
      "VE": {
        "code": "VE",
        "docs": [{
          "code": "ve_visa",
          "docType": "visa",
          "name": "Venezuela visa 3x4 cm"
        }, {
          "code": "ve_licencia_para_conducir",
          "docType": "driving",
          "name": "Venezuela driving licence 336x448 pixels"
        }]
      },
      "CU": {
        "code": "CU",
        "docs": [{
          "code": "cu_visa",
          "docType": "visa",
          "name": "Cuba visa 45x45 mm"
        }, {
          "code": "cu_tarjeta_de_turista",
          "docType": "visa",
          "name": "Cuba tourist card 45x45 mm"
        }, {
          "code": "cu_residence_abroad",
          "docType": "id",
          "name": "Cuba Residence Abroad 45x45 mm"
        }]
      },
      "GT": {
        "code": "GT",
        "docs": [{
          "code": "gt_passport_26x32",
          "docType": "passport",
          "name": "Guatemala passport 2.6x3.2 cm"
        }]
      },
      "LU": {
        "code": "LU",
        "docs": [{
          "code": "lu_visa",
          "docType": "visa",
          "name": "Luxembourg visa 35x45 mm"
        }, {
          "code": "lu_passport",
          "docType": "passport",
          "name": "Luxembourg passport 35x45 mm"
        }, {
          "code": "lu_driving_license",
          "docType": "driving",
          "name": "Luxembourg driving license 35x45 mm"
        }, {
          "code": "lu_residence_permit",
          "docType": "id",
          "name": "Luxembourg residence 35x45 mm"
        }]
      },
      "MK": {
        "code": "MK",
        "docs": [{
          "code": "mk_visa",
          "docType": "visa",
          "name": "North Macedonia visa 35x45 mm"
        }, {
          "code": "mk_vozacka_dozvola_kniska",
          "docType": "driving",
          "name": "Macedonia driving license 35x45 mm"
        }]
      },
      "ME": {
        "code": "ME",
        "docs": [{
          "code": "me_visa",
          "docType": "visa",
          "name": "Montenegro visa 35x45 mm"
        }]
      },
      "EC": {
        "code": "EC",
        "docs": [{
          "code": "ec_visa",
          "docType": "visa",
          "name": "Ecuador visa 5x5 cm"
        }]
      },
      "SI": {
        "code": "SI",
        "docs": [{
          "code": "si_osebna_izkaznica",
          "docType": "id",
          "name": "Slovenia ID card 35x45 mm"
        }, {
          "code": "si_visa",
          "docType": "visa",
          "name": "Slovenia visa 35x45 mm"
        }, {
          "code": "si_passport",
          "docType": "passport",
          "name": "Slovenia passport 35x45 mm"
        }, {
          "code": "si_voznisko_dovoljenje",
          "docType": "driving",
          "name": "Slovenia driving license 35x45 mm"
        }, {
          "code": "si_dovoljenje_za_prebivanje",
          "docType": "id",
          "name": "Slovenia residence 35x45 mm"
        }, {
          "code": "si_orozni_list",
          "docType": "other",
          "name": "Slovenia weapon certificate 35x45 mm"
        }]
      },
      "BA": {
        "code": "BA",
        "docs": [{
          "code": "ba_visa",
          "docType": "visa",
          "name": "Bosnia visa 35x45 mm"
        }]
      },
      "NI": {
        "code": "NI",
        "docs": [{
          "code": "ni_passport",
          "docType": "passport",
          "name": "Nicaragua passport 4x5 cm"
        }]
      },
      "BZ": {
        "code": "BZ",
        "docs": [{
          "code": "bz_passport",
          "docType": "passport",
          "name": "Belize passport 2x2 inch"
        }, {
          "code": "bz_visa",
          "docType": "visa",
          "name": "Belize visa 2x2 inch"
        }, {
          "code": "bz_residence",
          "docType": "visa",
          "name": "Belize residence 2x2 inch"
        }]
      },
      "DO": {
        "code": "DO",
        "docs": [{
          "code": "do_visa",
          "docType": "visa",
          "name": "Dominican Republic visa 4x5 cm"
        }]
      }
    },
    changeCountry: function(sel) {
      if (!sel) {
        return false;
      }
      if (sel.selectedIndex < 0) {
        return false;
      }
      var cnt = sel.options[sel.selectedIndex].value;
      var types = this.docTypes[cnt];
      var $dts = $('#selDocType');
      if (!$dts.length) {
        return;
      }
      $dts.empty();
      var L = types.docs.length;
      $dts.append($("<option></option>").attr("value", '').text('Choose an option'));

      for (var i = 0; i < L; i++) {
        var t = types.docs[i];
        $dts.append($("<option></option>").attr("value", t.code).text(t.name));
        if (this.userDocType === t.code) {
          $dts.get(0).selectedIndex = i;
        }
      }
      return false;
    },
    fillCountries: function() {
      var $sel = $('#selCountry');
      var sel = $sel.get(0);
      if (!sel) {
        return;
      }
      var ct;
      var i = 0;
      for (ct in countryList) {
        countryList[ct] = {
          i: i++,
          n: countryList[ct]
        };
      }
      var cts = [];
      for (ct in this.docTypes) {
        cts.push({
          ct: ct,
          i: countryList[ct].i
        });
      }
      cts.sort(function(a, b) {
        return a.i - b.i;
      });
      var firstC = cts[0].ct;
      var L = cts.length;
      for (i = 0; i < L; i++) {
        ct = cts[i].ct;
        $sel.append($('<option></option>').attr('value', ct).text(countryList[ct].n));
        if (ct === this.countryNeeded) {
          this.country = ct;
          sel.selectedIndex = sel.options.length - 1;
        }
      }
      if (this.country === null) {
        this.country = firstC;
        sel.selectedIndex = 0;
      }
      this.changeCountry(sel);
      sel.onclick = sel.onchange = sel.onkeyup = function() {
        return SelectionUI.changeCountry(sel);
      };
    }
  };
  $(function() {
    SelectionUI.fillCountries();
  });
</script>

</html>