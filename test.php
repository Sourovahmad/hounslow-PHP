 <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/cropper.css" rel="stylesheet">
  <link href="css/style.css?ver=<?php echo time();?>" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/cropper.js"></script>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="business" value="royalproductphotography@gmail.com"> 
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="item_name" value="Delivery Charge"> 
      <input type="hidden" name="amount" value="1.00">
      <input type="hidden" name="currency_code" value="GBP">
      <input type='hidden' name='return' value='https://hounslowpassportphotoshop.co.uk/' /> 
      <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    </form>
 <!--<form action="https://www.paypal.com/cgi-bin/webscr" id="paypal_form" method="post">
                        <input type="hidden" name="cmd" value="_xclick">
                        <INPUT TYPE="hidden" name="charset" value="UTF-8">
                        <INPUT TYPE="hidden" name="lang" value="english">
                        <input type="hidden" name="item_name" value="Delivery Charge">
                        <input type="hidden" name="amount" value="7.99">
                        <input type="hidden" name="business" value="royalproductphotography@gmail.com">
                        <INPUT TYPE="hidden" NAME="currency_code" value="GBP">
                        <INPUT TYPE="hidden" NAME="return" value="https://hounslowpassportphotoshop.co.uk/">
                        <input type="submit" id="paypal_form_submit" style="opacity: 0;" name="submit" alt="PayPal - The safer, easier way to pay online">

                        <input type="hidden" name="first_name" value="John">
                        <input type="hidden" name="last_name" value="Doe">
                        <input type="hidden" name="address1" value="756f Bath Rd">
                        <input type="hidden" name="address2" value="Apt 5"> 
                        <input type="hidden" name="city" value="Cranford"> 
                        <input type="hidden" name="state" value="Hounslow"> 
                        <input type="hidden" name="zip" value="TW5 9TY"> 
                        <input type="hidden" name="country" value="UK"> 
                        <input type="hidden" name="night_phone_a" value="610"> 
                        <input type="hidden" name="night_phone_b" value="555"> 
                        <input type="hidden" name="night_phone_c" value="1234"> 
                        <input type="hidden" name="email" value="jdoe@zyzzyu.com">

                        </form>-->
          <script>
            jQuery(document).ready(function(){ 
              //jQuery('#paypal_form_submit').click();
              jQuery('#paypal_form').submit();
            });
          </script>