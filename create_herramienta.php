<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	// Process the form
	
	$Producto = mysql_prep($_POST["Producto"]);
	$Presentacion = mysql_prep($_POST["Presentacion"]);
	$Cantidad_Buen_Estado = (int) $_POST["Cantidad_Buen_Estado"];
    $Cantidad_Mal_Estado = (int) $_POST["Cantidad_Mal_Estado"];
    $Cantidad_Reparar = (int) $_POST["Cantidad_Reparar"];
	$Cantidad = $Cantidad_Buen_Estado + $Cantidad_Mal_Estado + $Cantidad_Reparar;
    $Kit = (int) $_POST["Kit"];
	// validations
	$required_fields = array("Producto", "Presentacion", "Cantidad_Buen_Estado", "Cantidad_Mal_Estado", "Cantidad_Reparar", "Kit");
	validate_presences($required_fields);
	
	if (!empty($errors)) {
		$_SESSION["errors"] = $errors;
		redirect_to("new_herramienta.php");
	}
	
	$query  = "INSERT INTO `herramienta` (";
	$query .= "  `Producto`, `Presentacion`, `Cantidad`, `Kit`";
	$query .= ") VALUES (";
	$query .= "  '{$Producto}', '{$Presentacion}', '{$Cantidad}', '{$Kit}'";
	$query .= ")";
	$result = mysqli_query($connection, $query);
    $Sub = mysqli_insert_id($connection);
    $query  = "INSERT INTO `estado` (";
	$query .= "  `Sub`,`Buen_Estado_Cantidad`, `Mal_Estado_Cantidad`, `Reparar_Cantidad`";
	$query .= ") VALUES (";
	$query .= "  '{$Sub}','{$Cantidad_Buen_Estado}', '{$Cantidad_Mal_Estado}', '{$Cantidad_Reparar}'";
	$query .= ")";
	$result1 = mysqli_query($connection, $query);


	if ($result) {
		// Success
		$_SESSION["message"] = "EXITO! Herramienta Creada";
		redirect_to("manage_herramienta.php");
	} else {
		// Failure
		$_SESSION["message"] = "ERROR! al crear Herramienta";
		redirect_to("new_herramienta.php");
	}
	
} else {
	// This is probably a GET request
	redirect_to("new_herramienta.php");
}

?>


<?php
	if (isset($connection)) { mysqli_close($connection); }
?>
