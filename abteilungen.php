<?php
	include("config/db.php");
	include("config/funktionen.php");
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
      		<li class="nav-item">
        		<a class="nav-link" href="mitarbeiter.php">Mitarbeiter </a>
			</li>
      		<li class="nav-item active">
        		<a class="nav-link" href="abteilungen.php">Abteilungen </a>
			</li>
		<ul>
	</nav>

	<div class="container-sm p-5 my-5 border">
		<h1>Abteilungen</h1>
	</div>

	<div class="container-sm p-2 my-5 border">
		<form action="config/funktionen.php" method="POST">
			<div class="mb-3">
				<label class="form-label" required>Bezeichnung</label>
				<input class="form-control" type="text" name="bezeichnung">
				<button type="submit" class="btn m-2 btn-primary" name="abteilungInsert">Hinzufügen</button>
			</div>
		</form>

		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">ID Nummer</th>
				<th scope="col">Bezeichnung</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>

<?php
	$sql = $conn->query("SELECT * FROM abteilung");

	while($line = $sql->fetch_assoc()){
?>
			<tr>
			<th scope="row"><?=$line['abtID']?></th>
				<td><?=$line['bezeichnung']?></td>
				<td class="btn">
					<a href="config/funktionen.php?abtDelid=<?=$line['abtID'];?>">delete</a>
				</td>
				<td class="btn">
					<a href="abtBearbeiten.php?abtID=<?=$line['abtID'];?>">edit</a>
				</td>
			</tr>
<?php
	}
?>

			</tbody>
		</table>

	</div>
</body>
