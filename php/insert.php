<?php
// Only process the form if $_POST isn't empty
if (! empty($_POST)) {

	// Connect to MySQL
	$mysqli = new mysqli( '192.168.0.22', 'nama', 'djene88', 'baseVisitor' );

	// Check our connection
	if ( $mysqli->connect_error ) {
		die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
	}

	// Insert out data
	$sql = "INSERT INTO Visitor ( date_visit, l_name, f_name, company, profession, contact, v_object, obersation) VALUES ( NOW(), '{$mysqli->real_escape_string($_POST['Nom'])}', '{$mysqli->real_escape_string($_POST['Prenom'])}', '{$mysqli->real_escape_string($_POST['companyy'])}', '{$mysqli->real_escape_string($_POST['Profession'])}', '{$mysqli->real_escape_string($_POST['Numero'])}', '{$mysqli->real_escape_string($_POST['Object'])}', '{$mysqli->real_escape_string($_POST['Observe'])}' )";
	$insert = $mysqli->query($sql);

	// Print response from my NySQL
	if ( $insert ) {
		echo "<br><center>Success! Row ID: {$mysqli->insert_id}</center>";
	} else {
		die("Error: {$mysqli->errno} : {$mysqli->error}");
	}

	// Close our connection
	$mysqli->close();


}

?>

<center><br><a href="../forms/form_visitor.html"><input type="submit" value="OK"></a></center>