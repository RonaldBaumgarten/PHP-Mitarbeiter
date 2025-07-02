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
        		<a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
			</li>
      		<li class="nav-item active">
        		<a class="nav-link" href="mitarbeiter.php">Mitarbeiter <span class="sr-only"></span></a>
			</li>
      		<li class="nav-item">
        		<a class="nav-link" href="abteilungen.php">Abteilungen <span class="sr-only"></span></a>
			</li>
		<ul>
	</nav>

	<div class="container-sm p-5 my-5 border">
		<h1>Mitarbeiter</h1>
	</div>

	<div class="container-sm p-2 my-5 border">
		<form action="funktionen.php" method="POST">
			<div class="mb-3">
				<label class="form-label">Vorname</label>
				<input class="form-control" type="text" name="vorname">
				<label class="form-label">Nachname</label>
				<input class="form-control" type="text" name="nachname">
				<label class="form-label">Abteilung</label>
				<select class="form-select" name="abteilung">
<?php
	$sql = $conn->query("SELECT * FROM abteilung");

	while($zeile = $sql->fetch_assoc()){
		echo "<option value='$zeile[abtID]'>$zeile[bezeichnung]</option>";
	}
?>
				</select>
				<button type="submit" class="btn btn-primary" name="mitarbeiterInsert">Hinzufügen</button>
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
			<tr>
				<th scope="row">1</th>
				<td>Thomas</td>
				<td>Thomlin</td>
				<td>Marketing</td>
				
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Finanzen</td>
				<td>delete</td>
				<td>IT</td>
			</tr>
			</tbody>
		</table>

	</div>
</body>
