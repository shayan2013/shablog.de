<?php include 'Microservices_de/headerFooter.php';?>
<?php require 'Microservices_de/session.php';?>
<!DOCTYPE HTML>  
<html lang=de>
	<head>
		<?php include 'Microservices_de/meta.php';?>
		<title>Photos</title>
	</head>
	<body> 
		<div class="header">
		  <h1>Photos</h1>
		  <?php headi();?>
		</div>
		<div class="row">

		<div class="col-3 col-m-3 menu">
		  <?php include 'Microservices_de/navigation.php';?>
	      <?php
			if (isset($_SESSION["uname"])) {
				if ($_SESSION["uname"]=="Admin") {
					echo '<form action="Microservices_de/upload.php" method="post" enctype="multipart/form-data">
						  <br>
						  Bilder Hochladen:
							<input type="file" name="fileToUpload" id="fileToUpload">
							<br><br>
							<input type="submit" value="Upload Image" name="submit">
						</form>';
				}
			}
					
			?>
		</div>
		<div class="col4- col-m-6">
			<div class="responsive">
			  <div class="img">
			     <?php require 'Microservices_de/imageConf.php';?>
			  </div>
			</div>
		</div>
		</div>
		<div class="footer">
		  <p><?php footi();?></p>
		</div>		
	</body>
</html>