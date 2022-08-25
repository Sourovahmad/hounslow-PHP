<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, noarchive">
    <meta name="format-detection" content="telephone=no">
    <title>Royal Landan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
	<link class="jsbin" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	 <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <link href="https://fonts.googleapis.com/css2?family=Roboto:ital" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<?php
require_once './blog-admin/config/config.php';
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');
//Get DB instance. function is defined in config.php
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'blog_name', 'blog_top_content', 'blog_content','video','blog_image','publish','created_at', 'updated_at');
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}
if ($order_by) {
	$db->orderBy($filter_col, $order_by);
}
// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.
$rows = $db->arraybuilder()->paginate('blogs', $page, $select);
$total_pages = $db->totalPages;
?>
<body>
    <div class="whole">
     <section>
        <div class="container-background-blog">
            <div class="container">
                <div class="list-menu" style="padding:0px 0px 0px 0px;">
                    <ul class="menuline">
                        <li> <span class="btn-span"><a href="./"> Home </a></span> </li>
                        <li> <span class="btn-span"><a href="./about.html"> About Us </a></span> </li>
                        <li> <span class="btn-span"> <a href="./contact.php"> Contact Us </a></span> </li>
                        
                    </ul>
                </div>
                <div class="passport-bg">
                    <div>
                        <h2> All Blogs </h2>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    	
	<section class="inner-box-blog">
    <div class="container">
      <div class="d-flex flex-wrap catagories-bx animated fadeInUpShort" id="video-container">
      <?php
			foreach ($rows as $row): ?>
			<div class="col-md-4 p-0 cata-img cat-vd">
			  <div class="cssnew">
				<a data-gallery="blog" target="_blank" href="https://hounslowpassportphotoshop.co.uk/blog-view.php?blog_id=<?php echo xss_clean($row['id']); ?> ">
				     <?php if($row['video']==""){ ?>
							<img class="img-fluid" src="/blog-admin/uploads/<?php echo xss_clean($row['blog_image']); ?>">
							<?php } else { ?>
						<iframe src="<?php echo $row['video'];?>" frameborder="0" width="100%" height="240"></iframe>
						<?php } ?>
						
					  <div class="cat-hover11">
						<div class="cat-hv mycss">
							<h5><?php echo xss_clean($row['blog_name']); ?></h5>
						</div> 			
						<div class="cat-hv mycss">
						     <?php $txt = htmlentities(($row['blog_top_content']), null, 'utf-8');   
                 $txt = htmlspecialchars_decode($txt); 
				 ?>
							 <h6><?php echo substr_replace($txt, "...", 50);?></h6>
						 </div>   
					  </div>
											
				 </a>
			  </div>	 
			</div><!--desktop-video-->
			<?php endforeach;?>
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