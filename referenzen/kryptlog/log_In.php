<?php require 'Microservices_de/session.php';?>
<?php include 'Microservices_de/headerFooter.php';?>
<?php require 'Microservices_de/dbConfig.php';?>
<!DOCTYPE HTML>  
<html lang=de>
	<head>
		<?php include 'Microservices_de/meta.php';?>
		<title>Log In/Out</title>
	</head>
	<body>  
		<div class="header">
		  <h1>Log In/Out</h1>
		  <?php headi();?>
		</div>
		<div class="row">

		<div class="col-2 col-m-2 menu">
		  <?php include 'Microservices_de/navigation.php';?>
		</div>

	<?php
	// Variablen mit leeren Values erstellen
	$nameErr = $kennwortErr = "";
	$name = $kennwort = "";
	$x = 0;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['logOut'])) {
			sessionUnset("uname");
		} else {
			if (empty($_POST["name"])) {
				$nameErr = "Name erforderlich!";
				 // testen ob der Name nur aus Buchstaben und Leertaste besteht
			 } elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				  $nameErr = "Nur Buchstaben und Leertaste erlaubt!"; 
			 }else {
				$name = test_input($_POST["name"]);
				$x++;
			 }
			  
			 if (empty($_POST["kennwort"])) {
				$kennwortErr = "kennwort erforderlich!";
			 } else {
				$kennwort = $_POST["kennwort"];
				$x++;
		     }
			  
		     if ($x == 2) {
				create();
				$y = logInCheck($name, $kennwort);
			    if ($y == 1){
					sessionSetName($name);
					echo "<script> location.replace('index.php'); </script>";
				}
				$x = 0;
			  }
			  		  
			}

		}
		
			function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			 }	
	
	?>
		<div class="col4- col-m-6">
			<div class="responsive">
				<p><span class="error">* Pflichtfeld.</span></p>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				  Username: <input type="text" name="name" value="<?php echo $name;?>">
				  <span class="error">* <?php echo $nameErr;?></span>
				  <br><br>
				  Kennwort: <input type="password" name="kennwort" value="<?php echo $kennwort;?>">
				  <span class="error">* <?php echo $kennwortErr;?></span>
				  <br><br>
				  <?php 
					if (isset($_SESSION["uname"])) { 
					 echo '<input type="submit" name="logOut" value="Log Out">';  
				   } else { 
					 echo '<input type="submit" name="LogIn" value="Log In">';  
				   } 
				   ?>
				  <p>noch nicht registriert? <a style="color:red;" href="register.php">klick hier!</a></P>
			</form>
			</div>
		</div>
		</div>
		<div class="footer">
		  <p><?php footi();?></p>
		</div>


	</body>
</html>