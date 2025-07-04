<?php
/*
 * 	ID des Mitarbeiters wird als 'idnummer' per GET gesendet
 */
include("config/db.php");

$sql = $conn->query("SELECT * FROM mitarbeiter WHERE idnummer=".$_GET['maID']);
$zeile = $sql->fetch_assoc();

$mitID=$zeile['idnummer'];
$mitVn=$zeile['vorname'];
$mitNn=$zeile['nachname'];
$mitAbt=$zeile['abteilungsID'];
?>

<html>
<head>
   <title>Mitarbeiterverwaltung</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"><link rel="stylesheet" href="styles.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<ul class="navbar-nav">
      		<li class="nav-item">
        		<a class="nav-link" href="index.php">Home </a>
			</li>
      		<li class="nav-item active">
        		<a class="nav-link" href="mitarbeiter.php">Mitarbeiter </a>
			</li>
      		<li class="nav-item">
        		<a class="nav-link" href="abteilungen.php">Abteilungen </a>
			</li>
		<ul>
	</nav>

	<div class="container-sm p-5 my-5 border">
		<h1>Mitarbeiter bearbeiten</h1>
	</div>

	<div class="container-sm p-2 my-5 border">
		<form action="config/funktionen.php" method="POST">
			<div class="mb-3">
				<input class="form-control" type="hidden" name="maID" value=<?=$mitID?>>
				<label class="form-label" >Vorname</label>
				<input class="form-control" type="text" name="vorname" value=<?=$mitVn?>>
				<label class="form-label">Nachname</label>
				<input class="form-control" type="text" name="nachname" value=<?=$mitNn?>>
				<label class="form-label">Abteilung</label>
				<select class="form-select" name="abteilung">
				<option disabled>Wählen sie eine Abteilung</option>";

				<?php
					$sql = $conn->query("SELECT * FROM abteilung");
				
					while($zeile = $sql->fetch_assoc()){
						$selected="";
						if($zeile['abtID'] == $abtID) {
							$selected="selected";
						}
						echo "<option value='$zeile[abtID]' $selected>
							$zeile[bezeichnung]</option>";
					}
				?>

				</select>
				<button type="submit" class="btn btn-primary m-2" 
					name="mitarbeiterUpdate">
					Speichern
				</button>
			</div>
		</form>
	</div>
</body>
</html>
