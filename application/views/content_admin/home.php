<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Curbsidefilms - Home</title>
 <?php require_once('head.php');?>
 
 <script>
 $(function(){
	$("#update_content_form").submit(function(e){
	e.preventDefault();
	var formData = new FormData($('#update_content_form')[0]);
		$.ajax({
		url: '<?php echo site_url(ADMINCP.'/pages/update_section_content');?>',
		data: formData,
		async: true,
		contentType: false,
		processData: false,
		cache: false,
		type: 'POST',
		dataType : 'json',
		beforeSend:function(){
			$("#update_section_btn").prop('disabled',true);
		},
		success: function(response)
		{
			if(response.status == 'success')
			{
				if(response.image)
				{
					$("#sec_update_image").attr("src",'<?php echo site_url(ADMIN_ASSETS.'/page_images/home/');?>response.image');
				}
				toastr.success(response.msg);
				location.reload();
			} 
			else
			{
				toastr.error(response.msg);
			}
			$("#update_section_btn").prop('disabled',false);
		}
		});
	});
 });
 
 function add_section()
 {
	var conf = confirm("Confirm to add new section");
	if(conf)
	{
	 $.ajax({
			url: '<?php echo site_url(ADMINCP.'/pages/add_new_section');?>',
			method: "POST",
			data: {page:'home'},
			dataType: "json",
			beforeSend:function(){
				$("#add_sec_btn").prop('disabled',true);
			},
			success: function(response)
			{
				if(response.status == 'success')
				{
					$("#add_sec_resp").html("Created Successfully");
					location.reload();
				} 
				else
				{
					$("#add_sec_resp").html(response.msg);
				}
				
				$("#add_sec_btn").prop('disabled',false);
		
			}
		});
	}
	return false;
 }
 
 function delete_section(id)
 {
	 var conf = confirm("Are you sure you want to delete section?");
	if(conf)
	{
		$.ajax({
			url: '<?php echo site_url(ADMINCP.'/pages/delete_section');?>',
			method: "POST",
			data: {page:'home',id:id},
			dataType: "json",
			beforeSend:function(){
				$("#add_sec_btn").prop('disabled',true);
			},
			success: function(response)
			{
				if(response.status == 'success')
				{
					toastr.success('Deleted');
					location.reload();
				} 
				else
				{
					toastr.error(response.msg);
				}
			}
		});
	}
 }
 
 function get_section_content(secid,subsec_no)
 {
	 $.ajax({
			url: '<?php echo site_url(ADMINCP.'/pages/get_sub_section_content');?>',
			method: "POST",
			data: {page:'home',secid:secid,subsec_no:subsec_no},
			dataType: "json",
			beforeSend:function(){
				//$("#add_sec_btn").prop('disabled',true);
			},
			success: function(response)
			{
				if(response.status == 'success')
				{
					if(response.image)
					{
						$("#sec_update_image").attr("src",response.image);
					}
					$("#sec_update_text").val(response.text);
					$("#sec_update_media").val(response.media);
					$("#secid").val(secid);
					$("#subsec_no").val(subsec_no);
					
				} 
				else
				{
					toastr.error(response.msg);
				}
		
			}
		});
 }
 </script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
<?php require_once('nav_bar.php');?>
    <div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Home</h1>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div>---><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
	<div class="content">
      <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
				  <div class="card-header">
					<h5 class="card-title m-0">Banner</h5>
				  </div>
				  <div class="card-body">
				  <div class="row">
					<div class="col-md-6">
						
					</div>
					<div class="col-md-6">
						
					</div>
					</div>
				  </div>
				</div>
			</div>
		</div>
        <!-- /.row -->
		
		<div class="row">
			<div class="col-md-12">
					<?php
						if(is_array($sec_list))
						{
							foreach($sec_list as $sl_key=>$sl)
							{
					?>
								<div class="card card-primary card-outline">
								  <div class="card-header">
									<h3 class="card-title m-0">Section Images</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
										  <i class="fas fa-minus"></i></button>
										<button type="button" class="btn btn-tool" title="Remove" onclick="delete_section('<?php echo $sl['id'];?>')">
										  <i class="fas fa-times"></i></button>
									  </div>
								  </div>
								  <div class="card-body">
								  <div class="row">
								   <?php
								  for($i=1;$i<=3;$i++)
								  {
								?>
								  <div class="col-md-4">
								  <div class="card card-danger card-outline">
								  <div class="card-body box-profile">
								  
								 <?php
								  if($sl["image_name".$i] != "")
								  {
								?>
								 <div class="text-center">
									<a href="<?php echo site_url(ADMIN_ASSETS.'/page_images/'.$sl['page_name'].'/'.$sl['image_name'.$i]);?>" target="_blank">
									<img src="<?php echo site_url(ADMIN_ASSETS.'/page_images/'.$sl['page_name'].'/'.$sl['image_name'.$i]);?>" class="img-thumbnail" alt="<?php echo $sl['image_name'.$i];?>" width="200" />
									</a>
									</div>
								<?php
								  }
								  else
								  {
								?>
									<div class="text-center">
										<img src="<?php echo site_url(ADMIN_ASSETS.'/images/noimage.png');?>" class="img-thumbnail" alt="No Image" width="200" />
									</div>
								<?php
								  }
								  ?>
									<strong>Text</strong> 
									<p class="text-muted"><?php echo $sl['image_text'.$i];?></p>
									<strong>Media</strong> 
									<p class="text-muted"><?php echo $sl['image_media'.$i];?></p>
									<div class="text-center">
										<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-section" onclick="get_section_content('<?php echo $sl['id'];?>','<?php echo $i;?>')">Update Content</button>
									</div>
									</div>
									</div>
									</div>
								<?php
								  }
								  ?>
								  </div>
								  
								  </div>
								</div>
					<?php
							}
						}
					?>
					
				
			</div>
			<div class="col-md-4 offset-md-4">
				<button type="button" id="add_sec_btn" name="add_sec_btn" onclick="add_section()" class="btn btn-md btn-primary">Add New Section</button>
				<div id="add_sec_resp"></div>
			</div>
		</div>
        <!-- /.row -->
		</div>
		
      </div><!-- /.container-fluid -->
	</div>
	
<?php require_once('footer.php');?>
</div>

<div class="modal fade" id="modal-section">
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">
		<form action="<?php site_url();?>" method="post" id="update_content_form">
		<div class="modal-header">
		  <h4 class="modal-title">Update Content</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="text-center">
				<img src="<?php echo site_url(ADMIN_ASSETS.'/images/noimage.png');?>" id="sec_update_image" class="img-thumbnail" alt="No Image" width="200" />
				<input class="form-control mt-2" type="file" name="image_file" id="image_file" />
			</div>
			<strong>Text</strong> 
			<input class="form-control" type="text" name="sec_update_text" id="sec_update_text" value="" />
			<strong>Media</strong> 
			<input class="form-control" type="text" name="sec_update_media" id="sec_update_media" value="" />
		</div>
		<div class="modal-footer justify-content-between">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary" id="update_section_btn">Save changes</button>
		</div>
		<input type="hidden" name="secid" id="secid" value="" />
		<input type="hidden" name="subsec_no" id="subsec_no" value="" />
		<input type="hidden" name="page" value="home" />
		</form>
	  </div>
	  <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
  </div>
      <!-- /.modal -->

</body>
</html>
