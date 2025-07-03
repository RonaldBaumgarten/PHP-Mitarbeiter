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


if(isset($_POST{'abteilungGet'})){
	$sql = $conn->query("SELECT * FROM abteilung");

	while($zeile = $sql->fetch_assoc()){
		echo "<option value='$zeile[abtID]'>$zeile[bezeichnung]</option>";
	}
}

?>
