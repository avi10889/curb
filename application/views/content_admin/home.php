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
      </div><!-- /.container-fluid -->
	</div>
	
<?php require_once('footer.php');?>
</div>
</body>
</html>