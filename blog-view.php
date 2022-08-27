<!DOCTYPE html>
<html lang="en">

<head>

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
$select = array('id', 'blog_name', 'blog_top_content', 'blog_content','meta_title','meta_description','video','blog_image','publish','created_at', 'updated_at');

// Set pagination limit

$db->pageLimit = $pagelimit;
$blog_id = filter_input(INPUT_GET, 'blog_id');

// Get result of the query.
$db->where('id', $blog_id);
$rows = $db->arraybuilder()->paginate('blogs', $page, $select);

$total_pages = $db->totalPages;

$db_all = getDbInstance();
$select = array('id', 'blog_name', 'blog_top_content', 'blog_content','meta_title','meta_description','video','blog_image','publish','created_at', 'updated_at');
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}
if ($order_by) {
	$db_all->orderBy($filter_col, $order_by);
}

$row_all = $db_all->arraybuilder()->paginate('blogs', $page, $select,'LIMIT 2');



?>






    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">

    <meta name="description" content="<?php echo xss_clean($rows[0]['meta_description']); ?>">
    <meta name="keywords" content="<?php echo xss_clean($rows[0]['meta_title']); ?>">



    <title>Royal London</title>


        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./css/blogSingle3.css" />



</head>




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
                <h2 style="color:white">Hounslow Passport Photoshop Blogs</h2>
                <a class="btn" href="./contact.php">Contact Us</a>
            </div>
        </div>




   <div class="size main-content">
           <div class="post" >
           	        <?php foreach ($rows as $row): ?>


	<h1 class="title text-center animated fadeInDownShort blogTitle" style="margin:7px"><?php echo xss_clean($row['blog_name']); ?></h1>


                <div class="blog" style="text-align:center">

                   					<p style="margin:3px"> 
                                       <?php $txt = htmlentities(($row['blog_top_content']), null, 'utf-8');   
                                             echo $txt = htmlspecialchars_decode($txt); 
				                             ?></p>


                                            <div style="margin:5px">
                                             <?php if($row['video']==""){ ?>
                                        
                                          <?php if($row['blog_image'] !=""){ ?>
							            <img class="img-fluid-full" src="/blog-admin/uploads/<?php echo xss_clean($row['blog_image']); ?>" style="width:93%">
                                            <?php }  ?>
							<?php } else { ?>
						<iframe src="<?php echo $row['video'];?>" frameborder="0" width="100%" height="400"></iframe>
						<?php } ?>	

                        </div>

                        <p> 
                        <?php $txt = htmlentities(($row['blog_content']), null, 'utf-8');   
                                             echo $txt = htmlspecialchars_decode($txt); 
				                             ?>
                                             </p>
                </div>

                <?php endforeach;?>
             
            </div>

<div class="recent_posts">
                <div class="title">
                   
                    <h2>Recent Articles</h2>
                </div>

                <div class="cards">
                    	<?php foreach ($row_all as $row): ?>

        <div class="card">
                        <div class="card-header">
                           
                        </div>
                        <div class="card-content">
                            <a class="card-title" href="https://localhost/hounslow/blog-view.php?blog_id=<?php echo xss_clean($row['id']); ?>"
                                >  <?php echo xss_clean($row['blog_name']); ?>   </a
                            >

                            <a href="https://localhost/hounslow/blog-view.php?blog_id=<?php echo xss_clean($row['id']); ?>">  
                            <p class="card-meta">
                                <p style="color:white; margin:3px; padding:3px">
                               		
                               </p>
                               
                            </p>
                                </a>
                        </div>
                    </div>


                    	<?php endforeach;?>
                  
                </div>
            </div>





		
     
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