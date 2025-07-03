<?php
	include("config/db.php");
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
		<h1>Mitarbeiter</h1>
	</div>

	<div class="container-sm p-2 my-5 border">
		<form action="config/funktionen.php" method="POST">
			<div class="mb-3">
				<label class="form-label">Vorname</label>
				<input class="form-control" type="text" name="vorname">
				<label class="form-label">Nachname</label>
				<input class="form-control" type="text" name="nachname">
				<label class="form-label">Abteilung</label>
				<select class="form-select" name="abteilung">
				<option disabled selected>Wählen sie eine Abteilung</option>";

<?php
	$sql = $conn->query("SELECT * FROM abteilung");

	while($zeile = $sql->fetch_assoc()){
		echo "<option value='$zeile[abtID]'>$zeile[bezeichnung]</option>";
	}
?>

				</select>
				<button type="submit" class="btn btn-primary m-2" name="mitarbeiterInsert">Hinzufügen</button>
			</div>
		</form>

		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">ID Nummer</th>
				<th scope="col">Vorname</th>
				<th scope="col">Nachname</th>
				<th scope="col">Abteilung</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>

<?php
	$sql = $conn->query("SELECT * FROM mitarbeiter JOIN abteilung ON mitarbeiter.abteilungsID=abteilung.abtID ");

	while($zeile = $sql->fetch_assoc()){
		echo "<tr>";
		echo "<th scope='row'>$zeile[idnummer]</th>";
		echo "<td>$zeile[vorname]</td>";
		echo "<td>$zeile[nachname]</td>";
		echo "<td>$zeile[bezeichnung]</td>";
?>
				<td class="btn">
					<a href="config/funktionen.php?maDelid=<?=$zeile['idnummer'];?>">delete</a>
				</td>
				<td class="btn">
					<a href="mitarbeiterBearbeiten.php?maID=<?=$zeile['idnummer'];?>">edit</a>
				</td>

<?php
	}
?>

			</tbody>
		</table>

	</div>
</body>
