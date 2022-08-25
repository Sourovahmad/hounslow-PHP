<script src="https://cdn.tiny.cloud/1/m1158jok2hrviezjutphkl4uf4fyo7nhymwgkt3ay7pkso78/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
				                            <script type="text/javascript">
											tinymce.init({
												selector: "textarea",
												plugins: [
													"advlist", "anchor", "autolink", "charmap", "code", "fullscreen", 
													"help", "image", "insertdatetime", "link", "lists", "media", 
													"preview", "searchreplace", "table", "visualblocks", 
												],
												toolbar: "undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
											});
											</script>
<fieldset>
    <div class="form-group">
        <label for="blog_name">Blog Title *</label>
          <input type="text" name="blog_name" value="<?php echo htmlspecialchars($edit ? $customer['blog_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Title" class="form-control" required="required" id = "blog_name" >
    </div> 

    <div class="form-group">
        <label for="blog_top_content">Top Content *</label>
        <textarea name="blog_top_content" class="form-control" id="blog_top_content"><?php echo htmlspecialchars(($edit) ? $customer['blog_top_content'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div> 
   <div class="form-group">
        <label for="blog_content">Blog Content *</label>
        <textarea name="blog_content" class="form-control" id="blog_content"><?php echo htmlspecialchars(($edit) ? $customer['blog_content'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div> 
   <div class="form-group">
        <label for="video">Video Url</label>
           <input type="text" name="video" value="<?php echo htmlspecialchars($edit ? $customer['video'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="" class="form-control"  id = "video" >
    </div> 

	 <div class="form-group">
        <label for="Image">Blog Image</label>
           <input type="file" name="blog_image" value="<?php echo htmlspecialchars($edit ? $customer['blog_image'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="" class="form-control"  id = "blog_image" >
    </div> 


    //meta tag desctioption 

   <div class="form-group">
        <label for="video">Meta Title </label>
           <input type="text" name="meta_title" value="<?php echo htmlspecialchars($edit ? $customer['meta_title'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="" class="form-control"  id = "meta_title" >
    </div> 



    
   <div class="form-group">
        <label for="video">Meta desctioption </label>
           <input type="text" name="meta_description" value="<?php echo htmlspecialchars($edit ? $customer['meta_description'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="" class="form-control"  id = "meta_description" >
    </div> 
	
	


	<div class="form-group">
	<?php if($edit == 1) {?>
     			<img width="350px" height="auto" id="image" class="slide-img-upload" src="../blog-admin/uploads/<?php echo $customer['blog_image'] ?>"/>
	<?php } else {?>
	  			<img width="350px" height="auto" id="image" class="slide-img-upload"/>
	<?php }?>
	</div>





	<div class="form-group">
	<?php if($edit == 1) {?>
        <label for="publish">Publish <input type="checkbox" name="publish" <?= ($customer['publish'] == 1)?"checked":""; ?> value="<?php echo htmlspecialchars($edit ? $customer['publish'] : '1', ENT_QUOTES, 'UTF-8'); ?>"  placeholder="" class="form-control"  id = "publish" ></label>
    <?php } else {?>
	   <label for="publish">Publish <input type="checkbox" name="publish"  value="<?php echo htmlspecialchars($edit ? $customer['publish'] : '1', ENT_QUOTES, 'UTF-8'); ?>"  placeholder="" class="form-control"  id = "publish" ></label>
    
	<?php }?>
	</div>

   <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
<script>
	    jQuery('#blog_image').change(function(){
	        jQuery("#image").attr("src",URL.createObjectURL(event.target.files[0]));
	    })
	</script>
