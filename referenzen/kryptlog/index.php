<?php require 'Microservices_de/session.php';?>
<?php include 'Microservices_de/headerFooter.php';?>
<?php require 'Microservices_de/dbConfig.php';?>
<!DOCTYPE html>

<?php
	if (!isset($_SESSION["welcome"])) {
		echo '<script>
				window.alert("Willkommen zu Kryptlog");
			</script>';
		sessionWelcome("welc");
	}
?>
<html lang=de>
	<head>
		<?php include 'Microservices_de/meta.php';?>
		<title>Home</title>
	</head>
	<body>
		<div class="header">
		  <h1>Kryptlog</h1>
				<?php
					if (isset($_SESSION["uname"])) {
						echo "<h3>Willkommen " . $_SESSION["uname"] . " !</h3>";
					} else {
						echo "<h3>Willkommen zu meinem blog</h3>";
					}
					
				?>
		  <?php headi();?>
		</div>
		<div class="row">

		<div class="col-2 col-m-2 menu">
		  <?php include 'Microservices_de/navigation.php';?>
		</div>

		<div class="col4- col-m-6">
			<div class="responsive">
			  <div class="img">
				<a target="_blank" href="Images/logo.jpg">
				  <img src="Images/logo.jpg" alt="logo" width="600" height="400">
				</a>
				<div class="desc">
					<h2>Kryptografie</h2>
					<p>Kryptographie bzw. Kryptografie ist ursprünglich die Lehre der Verschlüsselung von Informationen.
					Heute befasst sie sich auch allgemein mit dem Thema Informationssicherheit, also der Konzeption,
					Definition und Konstruktion von Informationssystemen, die widerstandsfähig gegen Manipulation und
					unbefugtes Lesen sind. Schutz der Privatsphäre ist ein Grundrecht.</p>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-4 col-m-6">
			<div class="responsive">
			  <h1>Über mich</h1>
			  <p>Mein Name ist <strong>Shayan Shamseddin</strong>. Ich bin am <strong>17.04.1989</strong> geboren. 
			  Ich studiere <strong>Media Systems</strong> an der <strong>HAW-Hamburg</strong>
			  und arbeite bei der <strong>ISA-Hamburg</strong>.</p>
			  <img src="Images/fc.JPG" width="460" height="345">
			</div>
		</div>

		<div class="col-9 col-m-12">
		  <div class="nochnicht">
			<h1>Satz des Tages</h1>
			<h3>
			<?php
				$myfile = fopen("tagesblog.txt", "r") or die("Unable to open file!");
				echo fread($myfile,filesize("tagesblog.txt"));
				fclose($myfile);
			?>
			</h3>		
				<?php
					if (isset($_SESSION["uname"])) {
						echo $_SESSION["uname"] . " Infos : <br>";
						getKomment($_SESSION["uname"]);
					}
					
				?>
		  </div>
		</div>


		<div class="col-3 col-m-12">
		  <div class="aside">
			<h2>Tel</h2>
			<p>015783634915</p>
			<h2>Email</h2>
			<p>shayan2013@hotmail.de</p>
			<h2>Anschrift</h2>
			<p>Prisdorfer Str. 20. 25495 Kummerfeld</p>
		  </div>
		</div>

		</div>

		<div class="footer">
		  <p><?php footi();?></p>
		</div>


	</body>
</html>