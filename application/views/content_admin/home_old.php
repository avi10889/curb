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
 <script src="<?php echo base_url().ADMIN_ASSETS;?>/js/ajax-upload.js"></script>
 <style type="text/css">
        
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        
        .img-zone {
            background-color: #F2FFF9;
            border: 5px dashed #4cae4c;
            border-radius: 5px;
            padding: 20px;
        }
        
        .img-zone h2 {
            margin-top: 0;
        }
        
        .progress,
        #img-preview {
            margin-top: 15px;
        }
    </style>
 <script>
 $(function(){
	$("#img-preview").load('<?php echo site_url(ADMINCP.'/pages/get_image_list/home/section');?>');
 });
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
			<div class="col-12">
				<div class="card card-primary card-outline">
				  <div class="card-header">
					<h5 class="card-title m-0">Banner</h5>
				  </div>
				  <div class="card-body">
				  <div class="row">
					<div class="col-6">
						<h6 class="card-title">Special title treatment</h6>

						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
					<div class="col-6">
						<div class="img_container">
							<input type="file" name="file" id="img_file">

							<!-- Drag and Drop container-->
							<div class="img_upload-area"  id="uploadfile">
								<h5>Drag and Drop file here<br/>Or<br/>Click to select file</h5>
							</div>
						</div>
					</div>
					</div>
				  </div>
				</div>
			</div>
		</div>
        <!-- /.row -->
		
		<div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
				  <div class="card-header">
					<h5 class="card-title m-0">Section Images</h5>
				  </div>
				  <div class="card-body">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="img-zone text-center" id="img-zone">
								<div class="img-drop">
									<h2><small>Drag &amp; Drop Photos Here</small></h2>
									<p><em>- or -</em></p>
									<h2><i class="glyphicon glyphicon-camera"></i></h2>
									<span class="btn btn-success btn-file">
									Click to Open File Browser<input type="file" multiple="" accept="image/*">
								</span>
								</div>
							</div>
							<div class="progress hidden">
								<div style="width: 0%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" role="progressbar" class="progress-bar progress-bar-success progress-bar-striped active">
									<span class="sr-only">0% Complete</span>
								</div>
							</div>
						</div>
					</div>
						<div id="img-preview" class="row">
				  </div>
				</div>
			</div>
		</div>
        <!-- /.row -->
		
      </div><!-- /.container-fluid -->
	</div>
	
<?php require_once('footer.php');?>
</div>
</body>
</html>