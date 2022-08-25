<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$blog_id = filter_input(INPUT_GET, 'blog_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get customer id form query string parameter.
    $blog_id = filter_input(INPUT_GET, 'blog_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    $allow = array("jpg", "jpeg", "gif", "png");

					$todir = 'uploads/';

					if ( !!$_FILES['blog_image']['tmp_name'] ) // is the file uploaded yet?
					{
						$info = explode('.', strtolower( $_FILES['blog_image']['name']) ); // whats the extension of the file

						if ( in_array( end($info), $allow) ) // is this file allowed
						{
							if ( move_uploaded_file( $_FILES['blog_image']['tmp_name'], $todir . basename($_FILES['blog_image']['name'] ) ) )
							{
								//echo  "the file has been moved correctly" ;
				                //print_r($_FILES);
								$imgname = $_FILES['blog_image']['name'];
								
								
								
							}
						}
						else
						{
							echo "<div class='msgerror'> Error this file extension is not allowed ! Please upload Correct file </div>";
						}
					}
	
	
	
	
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
	$data_to_update['blog_image'] = $imgname;
    $db = getDbInstance();
    $db->where('id',$blog_id);
    $stat = $db->update('blogs', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "Blog updated successfully!";
        //Redirect to the listing page,
        header('location: blogs.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('id', $blog_id);
    //Get data to pre-populate the form.
    $customer = $db->getOne("blogs");
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Blog</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/customer_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>