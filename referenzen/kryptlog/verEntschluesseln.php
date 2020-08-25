<?php require 'Microservices_de/session.php';?>
<?php include 'Microservices_de/headerFooter.php';?>
<?php require 'Microservices_de/kryptForm.php';?>

<?php
	if (!isset($_SESSION["uname"])) {
		print '<script>
					if (confirm("first Log-In please!") == true) {
						location.replace("log_In.php");
					} else {
						location.replace("index.php");
					}
				</script>';
	}
?>

<html lang=de>
	<head>
		<?php include 'Microservices_de/meta.php';?>
		<title>Ver/Entschlüsseln</title>
	</head>
	<body>
		<div class="header">
		  <h1>Ver/Entschlüsseln</h1>
		  <?php headi();?>
		</div>
		<div class="row">

		<div class="col-2 col-m-2 menu">
		  <?php include 'Microservices_de/navigation.php';?>
		</div>
		<div class="col4- col-m-6">
			<div class="responsive">
			  <div class="img">
				<h5><p>1.Text einschreiben bzw. einfügen.</p>
				<p>2.Ver/Entschlüsseln auswählen.</p>
				<p>3.Verfahren auswählen.</p>
				<p>4.Schlüssel eingeben.</p>
				<p>5.Auf submit drücken.</p>
				<p><span class="error">* required field.</span></p></h5>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
					<textarea name="text" rows="10" cols="90"><?php echo $text;?></textarea>
					<fieldset id="group1">
						Bitte wählen Sie aus ob Sie den Text Ver- oder Entschlüsseln möchten! <span class="error">* <?php echo $verEntErr;?></span> <br>
						<input type="radio" value="verschluesseln" <?php if (isset($verEntRadio) && $verEntRadio=="verschluesseln") echo "checked";?> name="verEntRadio" checked> Verschlüsseln
						<input type="radio" value="entschluesseln" <?php if (isset($verEntRadio) && $verEntRadio=="entschluesseln") echo "checked";?> name="verEntRadio"> Entschlüsseln
					</fieldset>

					<fieldset id="group2">
						Bitte wählen Sie ein Verfahren aus! <span class="error">* <?php echo $verfahrenErr;?></span> <br>
						<?php require 'Microservices_de/verfahren.php';?>
					</fieldset><br>
					Bitte Schlüssel auswählen! <br>
					<textarea name="key" rows="1" cols="10"><?php echo $key;?></textarea> <span class="error">* <?php echo $keyErr;?></span><br>
					Bitte nur für Affine-Chiffre eintragen <br>
					<textarea name="t" rows="1" cols="10"><?php echo $t;?></textarea> <span class="error">* <?php echo $tErr;?></span><br>
				  <input type="submit" name="submit" value="Submit">  
				</form>
			  </div>
			</div>
		</div>

		<div class="col-4 col-m-6">
			<div class="responsive">
			  <h1>Der Prozess</h1>
			  <p>Verschlüsselung (auch: Chiffrierung) ist die von einem Schlüssel abhängige 
			  Umwandlung von „Klartext“ genannten Daten in einen „Geheimtext“
			  (auch: „Chiffrat“), so dass der Klartext aus dem Geheimtext nur unter 
			  Verwendung eines geheimen Schlüssels wiedergewonnen werden kann.</p>
			  <img src="Images/Bachelorarb2.jpg" width="460" height="345">
			</div>
		</div>

		<div class="col-9 col-m-12">
		  <div class="nochnicht">
			<?php verfahrenBeschreibung(); ?>
		  </div>
		</div>


		<div class="col-3 col-m-12">
		  <div class="aside">
		    <?php schluesselBeschreibung(); ?>
		  </div>
		</div>

		</div>
		

		<div class="footer">
		  <p><?php footi();?></p>
		</div>


	</body>
</html>