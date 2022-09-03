<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="hounslow passport photoshop">
    <meta name="keywords" content="hounslow passport photoshop">




    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, noarchive">
    <meta name="format-detection" content="telephone=no">
    <title>Royal London</title>
   
  <link href="css/style.css?ver=<?php echo time();?>" rel="stylesheet">


        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog</title>
        <link rel="stylesheet" href="./css/new_blog.css" />
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

    <nav class="size navbar">
            <a href="./">
                <img
                    src="https://hounslowpassportphotoshop.co.uk/images/logo3.png"
                    alt="logo"
                    class="logo"
                />
            </a>
            <ul>
                <li><a href="./">Home</a></li>
                <li><a href="./blog.php">Blogs</a></li>
                <li><a href="./about.php">About Us</a></li>
                <li><a href="./contact.php">Contact Us</a></li>
            </ul>
            <img
                class="hamburger-menu"
                src="./images/hamburger.png"
                alt="menu"
            />
        </nav>

    
        <div class="hero">
            <div class="overlay size">
                <h1>Hounslow Passport Photoshop Blogs</h1>
                <a class="btn" href="./contact.php">Contact Us</a>
            </div>
        </div>

        <div class="size categories">
            <ul class="categories-list">
                <li class="active"><a href="./blog.php">Most Recent</a></li>
        
            </ul>
        </div>


        <div class="size posts">

  <?php
			foreach ($rows as $row): ?>

            <div class="card">

            <?php

                $query_string = 'blog_name=' . urlencode(xss_clean($row['blog_name']));
            
            echo  '<a data-gallery="blog" target="_blank" href="https://localhost/hounslow/blog-view.php?'. htmlentities($query_string) .  '"  style="list-style:none; text-decoration: none; color: black; background: none;" >'

            ?>
                <div class="card-header">
                    <p>
                        <span>  <?php echo xss_clean($row['created_at']); ?> </span>
                    </p>
                </div>
                <div class="card-wrapper">
                    <h3 class="card-title">
                        <?php echo xss_clean($row['blog_name']); ?>
                    </h3>
                    <div class="card-block">
                        <p>
                         <?php $txt = htmlentities(($row['blog_top_content']), null, 'utf-8');   
                 $txt = htmlspecialchars_decode($txt); 
				 ?>
                 <?php echo substr_replace($txt, "...", 300);?>
                        </p>
                        <!-- <a href="https://localhost/hounslow/blog-view.php?blog_name=<?php echo xss_clean($row['blog_name']); ?>">Read more</a> -->

                        <?php

$query_string = 'blog_name=' . urlencode(xss_clean($row['blog_name']));

echo  '<a  href="https://localhost/hounslow/blog-view.php?'. htmlentities($query_string) .  '" >  Read more</a> '

?>


                    </div>
                </div>
                <div class="card-footer">
                    <p>
                        <span><a href="./contact.php">Owners Guide</a></span>
                        <span>
                         
                        </span>
                    </p>
                </div>
                </a>
            </div>

            <?php endforeach;?>

            
        </div>





     

<footer class="footer">
            <div class="footer-wrapper size">
                <div class="left">
                    <div class="footer-nav">

                        <a href="./contact.php">Contact Us</a>
                        <a href="mailto:contact@hounslowpassportphotoshop.co.uk">Mail Us contact@hounslowpassportphotoshop.co.uk</a> <br/>
                        

                    </div>

                    <p class="text">
                       Royalproductphotography is located in Hounslow, London and consists of a team of professional photographers and photo editors. We have a studio near Heathrow airport and offer services to UB3 postcodes Hillingdon, Southall and Hayes residents, among other neighbours. We are a team of human professionals committed to ensuring that your passport and visa application does not get rejected. We use pro software to prepare and edit your photos to meet Home Office or any other guidelines.
                    </p>
                </div>
               
            </div>
        </footer>

 
       <script>
            document
                .querySelector(".hamburger-menu")
                .addEventListener("click", () => {
                    document
                        .querySelector(".navbar ul")
                        .classList.toggle("open");
                });
        </script>

</body>

</html>