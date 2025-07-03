<?php
include ("db.php");

if(isset($_POST{'abteilungInsert'})){
	$sql = $conn->prepare("INSERT INTO abteilung VALUES(null,?)");
	$sql->bind_param("s", $_POST['bezeichnung']);

	if($sql->execute()) {
		header("location:../index.php");
		exit();
	}else{
		echo "Fehler: ".$sql->error;
	}
}

if(isset($_POST{'mitarbeiterInsert'})){
	$sql = $conn->prepare("INSERT INTO mitarbeiter VALUES(null,?,?,?)");
	$sql->bind_param("ssi", $_POST['vorname'], $_POST['nachname'], $_POST['abteilung']);

	if($sql->execute()) {
		header("location:../mitarbeiter.php");
		exit();
	}else{
		echo "Fehler: ".$sql->error;
	}
}


if(isset($_GET{'abtDelid'})){
	$sql = $conn->prepare("DELETE FROM abteilung WHERE abtID=?;");
	$sql->bind_param("i", $_GET['abtDelid']);

	if($sql->execute()) {
		header("location:../abteilungen.php");
		exit();
	}else{
		echo "Fehler: ".$sql->error;
	}
}

if(isset($_GET{'maDelid'})){
	$sql = $conn->prepare("DELETE FROM mitarbeiter WHERE idnummer=?;");
	$sql->bind_param("i", $_GET['maDelid']);

	if($sql->execute()) {
		header("location:../index.php");
		exit();
	}else{
		echo "Fehler: ".$sql->error;
	}
}

if(isset($_POST{'abtEdit'})){
	$sql = $conn->prepare("UPDATE abteilung SET bezeichnung=? WHERE abtID=?;");
	$sql->bind_param("si", $_POST['bezeichnung'], $_POST['abtID']);

	//echo "$_POST[bezeichnung], $_POST[abtId]);";
	if($sql->execute()) {
		header("location:../abteilungen.php");
		exit();
	}else{
		echo "Fehler: ".$sql->error;
	}
}

?>
