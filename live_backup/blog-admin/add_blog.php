<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';


//serve POST method, After successful insert, redirect to blogs.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	
	$data_to_store = array_filter($_POST);
	if (!array_key_exists("video",$data_to_store))
    {
     $data_to_store['video'] ='';
    }
	///print_r($data_to_store);
	//die;
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
	          if($data_to_store['video'] == '')
			  {
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
	
	           $data_to_store['blog_image'] = $imgname;
			   $data_to_store['video'] == '';
			  }
			  else {
				   $data_to_store['blog_image'] = '';
			  }
    

    //Insert timestamp
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
	
	
    $db = getDbInstance();
    
    $last_id = $db->insert('blogs', $data_to_store);

    if($last_id)
    {
    	$_SESSION['success'] = "Blog added successfully!";
    	header('location: blogs.php');
    	exit();
    }
    else
    {
        echo 'insert failed: ' . $db->getLastError();
        exit();
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Blogs</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('./forms/customer_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            blog_title: {
                required: true,
                minlength: 3
            },
            top_content: {
                required: true,
                minlength: 3
            },   
        }
    });
});

</script>

<?php include_once 'includes/footer.php'; ?>