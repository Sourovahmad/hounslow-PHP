<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, noarchive">
  <meta name="format-detection" content="telephone=no">
  <title>Royal Landan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link class="jsbin" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah')
          .attr('src', e.target.result)
          .width(380)
          .height(420)
          .show();
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<body>
  <div class="whole">
    <section>
      <div class="container-background">
        <div class="container">
          <div class="list-menu" style="padding:0px 0px 0px 0px;">
            <ul class="menuline">
              <li> <span class="btn-span"><a href="./"> Home </a></span> </li>
              <li> <span class="btn-span"><a href="./about.html"> About Us </a></span> </li>
              <li> <span class="btn-span"> <a href="./contact.php"> Contact Us </a></span> </li>
              <li> <span class="btn-span"><a href="./blog.php"> Blogs </a></span> </li>
            </ul>
          </div>
          <div class="passport-bg">
            <div class="wifi-image">
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
        </div>
      </div>
    </section>

    <section class="inner-box-1">
      <div class="container">
        <div class="text-center">
          <h3>How its Work </h3>
        </div>
        <div>
          <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/cO2D4Svelz0" title="YouTube video" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">
      <?php

      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $allow = array("jpg", "jpeg", "gif", "png");

        $todir = 'uploads/';

        if (!!$_FILES['file']['tmp_name']) // is the file uploaded yet?
        {
          $info = explode('.', strtolower($_FILES['file']['name'])); // whats the extension of the file

          if (in_array(end($info), $allow)) // is this file allowed
          {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $todir . basename($_FILES['file']['name']))) {
              //echo  "the file has been moved correctly" ;
              //print_r($_FILES);
              $imgname = $_FILES['file']['name'];
              $imglink = "https://hounslowpassportphotoshop.co.uk/uploads/" . $imgname;
              $img = '<img src="' . $imglink . '" alt="" width="500" height="600">';
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
                                <p> Which country are you based in = " . $_POST['which_country'] . "</p>
                                <p> Which country passport or visa are you looking for = " . $_POST['which-country-looking'] . "</p>
                                <p> Passport and Visa = " . $_POST['pass_visa'] . "</p>
                                <p> Photo Link = " . $imglink . "</p>
                                <p> Delivery Option = " . $_POST['delivery_option'] . "</p>
                                </body>
                                </html>";

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
              $mail->addAddress('contact@hounslowpassportphotoshop.co.uk');
              $mail->addReplyTo($email);

              $mail->isHTML(true);                                  // Set email format to HTML

              $mail->Subject = 'New Photo Uploaded';
              $mail->Body    = $message;
              //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              if (!$mail->send()) {
                echo "<div class='msgerror'> Error this file extension is not allowed ! Please upload Correct file </div>";
                echo 'Mailer Error: ' . $mail->ErrorInfo;
              } else {
                echo "<div class='msgsuccess'>Your information is sent successfuly ! Thank you for Uploding </div>";
              }
            }
          } else {
            echo "<div class='msgerror'> Error this file extension is not allowed ! Please upload Correct file </div>";
          }
        }
      }
      ?>
      <section class="inner-box-1">
        <div class="text-center">
          <h3>Create Passport photo Prints </h3>
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

              <label for="postcode">Postcode <span class="required">*</span></label>
              <input type="text" id="postcode" name="postcode" required placeholder="">


              <label for="country">Which country are you based in? <span class="required">*</span></label>
              <select id="which_country" name="which_country" required>>
                <option>Select Country</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ireland">Ireland</option>
                <option value="Scotland">Scotland</option>
                <option value="United States">United States</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
                <option value="Aland Islands">Aland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Andorra">Andorra</option>
                <option value="Austria">Austria</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Croatia">Croatia</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Estonia">Estonia</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Finland">Finland</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Holy See">Holy See)</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Italy">Italy</option>
                <option value="Jersey">Jersey</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Latvia">Latvia</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Malta">Malta</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Norway">Norway</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Romania">Romania</option>
                <option value="San Marino">San Marino</option>
                <option value="Serbia">Serbia</option>
                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Spain">Spain</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Ukraine">Ukraine</option>

              </select>

              <label for="country">Which country passport or visa are you looking for <span class="required">*</span></label>
              <select id="country" name="which-country-looking" required>
                <option>Select Country</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="India">India</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Poland">Poland</option>
                <option value="Turkey">Turkey</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Portugal">Portugal</option>
                <option value="Italy">Italy</option>
                <option value="China">China</option>
                <option value="Germany">Germany</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>

              </select>
              <label for="pass_visa">Passport and Visa <span class="required">*</span></label><br>
              <div class="input-group mb-3 display_block" style="margin-top: 5px;">
                <input type="radio" id="passport" name="pass_visa" value="Passport" required>
                <label for="passport" class="radiobtn">Passport</label><br>
                <input type="radio" id="visa" name="pass_visa" value="Visa" required>
                <label for="visa" class="radiobtn">Visa </label><br>
              </div>

          </div>

          <div class="help-right">
            <div class="imgdiv">
              <img id="blah" src="images/blankimg.png" alt="your image" />
            </div>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="file" id="inputGroupFile02" required onchange="readURL(this);">
              <label class="input-group-text" for="inputGroupFile02">Upload</label>
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
            </form>
          </div>
        </div>

      </section>
    </div>
    <!--section>
        <div class="container-background">
            <div class="container">
                
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
            </div>
        </div>
    </section-->
    <section class="inner-box-1">
      <div class="container">
        <div class="text-center">
          <h3>We Received Your Photo</h3>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <img src="images/_F5A7838.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-sm-6">
            <p class="textsteps">Taken against a plain any background (NO BLACK) we have professional software and will fix your photos background </p>
            <img src="images/mg1.jpeg" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">
      <section class="inner-box-1">
        <div class="container">
          <div class="steps_css">
            <h3>Step 1 :- Setup your Country Photo Size</h3>
          </div>
          <div>
            <div class="text-center">
              <div> <img src="images/1.jpg" alt="" class="img-fluid"> </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="inner-box-1">
      <div class="container">
        <div class="steps_css">
          <h3><span class="step">Step 2 :-</span> Adjust your photo 100% grantee no rejection</h3>
        </div>
        <div>
          <div class="text-center">
            <div> <img src="images/2.jpg" alt="" class="img-fluid"> </div>
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">
      <section class="inner-box-1">
        <div class="container">
          <div class="steps_css">
            <h3>Step 3 :- Adjust your photo colour</h3>
          </div>
          <div>
            <div class="text-center">
              <div> <img src="images/3.jpg" alt="" class="img-fluid"> </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="inner-box-1">
      <div class="container">
        <div class="steps_css">
          <h3>Step 4 :- Remove your photo background feel free take your photo against any background you can fix it</h3>
        </div>
        <div>
          <div class="text-center">
            <div> <img src="images/4.jpg" alt="" class="img-fluid"> </div>
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">
      <section class="inner-box-1">
        <div class="container">
          <div class="steps_css">
            <h3>Step 5 :- Print your photo on hight quality paper</h3>
          </div>
          <div>
            <div class="text-center">
              <div> <img src="images/5.jpg" alt="" class="img-fluid"> </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="inner-box-1">
      <div class="container">
        <div class="steps_css">
          <h3>Step 6 :- Printed your photo on hight quality paper</h3>
        </div>
        <div>
          <div class="text-center">
            <div> <img src="images/_F5A8845.jpg" alt="" class="img-fluid"> </div>
          </div>
        </div>
      </div>
    </section>
    <div class="containercontact">
      <section class="inner-box-1">
        <div class="container">
          <div class="steps_css">
            <h3>Step 7 :- Six photo send to your home address next day delivery. If you are close to our studio come to our studio</h3>
          </div>
          <div>
            <div class="text-center">
              <div> <img src="images/postimage.jpeg" alt="" class="img-fluid"> </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="inner-box-1">
      <div class="container">
        <div class="steps_css">
          <h3>Step 8 :- OR sending your HMRC photo code to your email in the next two hours after we received your order</h3>
        </div>
        <div>
          <div class="text-center">
            <div> <img src="images/_F5A8846.jpg" alt="" class="img-fluid"> </div>
          </div>
        </div>
      </div>
    </section>

    <!--section>
	  <div class="container">
		    <div class="help-bg">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="images/help-you.jpeg" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                                <img src="images/_F5A7838.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p style="margin: 24px;">Taken against a plain  any  background (NO BLACK) we have professional software and will fix your  photos background </p>
                                <img src="images/mg1.jpeg" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                                <img src="images/_F5A8845.jpg" alt="" class="img-fluid">
                                <img src="images/_F5A8846.jpg" alt="" class="img-fluid">
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div> <img src="images/1.jpg" alt="" class="img-fluid"> </div>
                        <div> <img src="images/2.jpg" alt="" class="img-fluid"> </div>
                        <div> <img src="images/3.jpg" alt="" class="img-fluid"> </div>
                        <div> <img src="images/4.jpg" alt="" class="img-fluid"> </div>
                        <div> <img src="images/5.jpg" alt="" class="img-fluid"> </div>

                    </div>
                </div>
            </div>
        </div>    
	</section-->


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
          <li> <img src="images/address.png" alt="" /> <span> 756F bath Rd Cranford Middlesex TW5 TY Hounslow
            </span></li>
          <li> <img src="images/whatsapp.png" alt="" /><span> : <a style="color:#8bc165;" href="tel:02087593688">02087593688</a> , <a style="color:#8bc165;" href="tel:07553949353">07553949353</a> </span> </li>
          <li> <img src="images/mail.png" alt="" /> <span> : <a style="color:#8bc165;" href="mailto: info@royallondonproductphotography.com ">info@royallondonproductphotography.com </a></span>
          </li>
          <li> <img src="images/map.png" alt="" /> <span> : <a style="color:#8bc165;" href="https://royallondonproductphotography.com/">Product Photography</a> | <a style="color:#8bc165;" href="https://www.pixelbrandstudio.com/">Remove background from image</a></span> </li>
        </ul>
      </div>
    </div>
  </footer>
</body>

</html>