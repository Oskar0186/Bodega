<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	// Process the form
	
	$Producto = mysql_prep($_POST["Producto"]);
	$Presentacion = mysql_prep($_POST["Presentacion"]);
	$Cantidad = (int) $_POST["Cantidad"];
    $Expira = $_POST["Vencimiento"];
	// validations
	$required_fields = array("Producto", "Presentacion", "Cantidad", "Vencimiento");
	validate_presences($required_fields);
	
	if (!empty($errors)) {
		$_SESSION["errors"] = $errors;
		redirect_to("new_insumos.php");
	}
	
	$query  = "INSERT INTO `Insumos` (";
	$query .= "  `Producto`, `Presentacion`, `Cantidad`,`Expira`";
	$query .= ") VALUES (";
	$query .= "  '{$Producto}', '{$Presentacion}', '{$Cantidad}', '{$Expira}'";
	$query .= ")";
	$result = mysqli_query($connection, $query);

	if ($result) {
		// Success
		$_SESSION["message"] = "EXITO! Producto Creado";
		redirect_to("manage_insumos.php");
	} else {
		// Failure
		$_SESSION["message"] = "ERROR! al crear Producto";
		redirect_to("new_insumos.php");
	}
	
} else {
	// This is probably a GET request
	redirect_to("new_insumos.php");
}

?>


<?php
	if (isset($connection)) { mysqli_close($connection); }
?>
