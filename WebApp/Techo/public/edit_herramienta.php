<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
	// Process the form
	
	// validations
	$required_fields = array("Id","Producto", "Presentacion", "Kit");
	validate_presences($required_fields);
	
	if (empty($errors)) {
		
		// Perform Update

		$Id = (int) $_POST["Id"];
		$Producto = mysql_prep($_POST["Producto"]);
		$Presentacion = mysql_prep($_POST["Presentacion"]);
        $Kit = (int) $_POST["Kit"];
        
		
		$query  = "UPDATE `herramienta` SET `Producto`='{$Producto}',`Presentacion`='{$Presentacion}',`Kit`='{$Kit}' WHERE `Id` = '{$Id}' LIMIT 1";
		$result = mysqli_query($connection, $query);

		if ($result && mysqli_affected_rows($connection) >= 0) {
			// Success
			$_SESSION["message"] = "Herramienta Modificada";
			redirect_to("manage_herramienta.php");
		} else {
			// Failure
			$message = "Error al Modificar Herramienta";
		}
	
	}
} else {
	// This is probably a GET request
	
} // end: if (isset($_POST['submit']))

?>

<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php //echo navigation($current_subject, $current_page); ?>
  </div>
  <div id="page">
		<?php // $message is just a variable, doesn't use the SESSION
			if (!empty($message)) {
				echo "<div class=\"message\">" . htmlentities($message) . "</div>";
			}
		?>
		
		<br />
		<a href="manage_herramienta.php">Cancel</a>
		
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
