<?php
/**
 * The template for displaying all pages
 * Template Name: Gallery Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package E_Blog
 */

get_header();

//Show The DATA From DB

$GetUserID = get_current_user_id();
global $wpdb;
$rows = $wpdb->get_results("SELECT * from upload_files WHERE user_id = $GetUserID");
$getUrl = get_site_url() . "/wp-content/themes/eblog/gallery/images/";
$vgetUrl = get_site_url() . "/wp-content/themes/eblog/gallery/videos/";
foreach ($rows as $row) {
	$hvData = $row->type;
	$CheckTypes = explode('/', $hvData);
}


?>

	<div id="primary" class="content-area">

		<div id="main" class="site-main">

		<h1>Gallery</h1>

	<div class="showAlldata">
		<?php
		  if(isset($CheckTypes[0]) == 'image'){
			foreach ($rows as $row) { ?>
				<img src="<?php echo $getUrl . $row->photos; ?>">  <?php
		    }
		  }else{
		  	echo "No Data Founds!";
		  }

		  if(isset($CheckTypes[0]) == 'video'){
		  	foreach ($rows as $row) { ?>
				<video width="300" height="200" controls>
					<source src="<?php echo $vgetUrl . $row->videos; ?>" type="video/mp4">
				</video>   <?php
		    }
		  }

		?>
	</div>


<form method="post" id="uploadImg" enctype="multipart/form-data">
 <input type="hidden" name="action" value="upload_file_ajax">
 <input type="hidden" name="user_id" value="<?php echo $GetUserID; ?>">
		<div class="form-group">
			<input type="file" class="form-control" id="file" name="file">
		</div>
		<div class="form-group">
			<div class="progress">
				<span class="progress-bar">
					<span class="percentage"></span>
				</span>
			</div>
		</div>
		<button type="submit" name="upload" class="btn btn-primary">Upload</button>
	</form>

		</div><!-- #main -->
	</div><!-- #primary -->

<script>
jQuery(document).ready(function($){
	$('.progress').css({'display':'none'});
	var admin_ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
	var errors = false;
   $('#uploadImg').on('submit', function(e){
   		e.preventDefault();

   		var formData = new FormData(jQuery('#uploadImg')[0]);
         $('.percentage').html();
         $('.progress-bar').css('width', "0%");

        jQuery(".errors").remove();
        
        if (jQuery("#file").val() === "") {
            jQuery("#file").after("<span class='errors'>Please Choose at list One File!</span> ");
        }else{
          $.ajax({
   			url: admin_ajax,
   			method: 'POST',
   			data: formData,
            xhr: function(){
               var xhr = new XMLHttpRequest();
               var percentage = 0;
               xhr.upload.addEventListener('progress', function(event){
               	  $('.progress').css({'display':'block'});
                  percentage = Math.round((event.loaded/event.total)*100);
                  $('.percentage').html(percentage+"%");
                  $('.progress-bar').css('width', percentage+"%");
               });

               return xhr;
            },
   			contentType: false,
   			cache: false,
   			processData: false,
   			success: function(response){
   				console.log(response);
   				// location.reload();
   			},
   			error: function(response){
   				console.log(response);
   			}
   		});

        }

        if(errors) {
            return false;
        }


   });

})

</script>

<?php
get_footer();
