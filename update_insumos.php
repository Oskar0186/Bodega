<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	// Process the form
	
	// validations
	$required_fields = array("Id", "Cantidad", "Vencimiento");
	validate_presences($required_fields);
	
	if (empty($errors)) {
		
		// Perform Update

		$Id = (int) $_POST["Id"];
		$Cantidad = (int) $_POST["Cantidad"];
		$Expira = $_POST["Vencimiento"];
	
		$query  = "UPDATE `Insumos` SET ";
		$query .= "`Cantidad` = {$Cantidad}, ";
        $query .= "`Expira` = {$Expira} ";
		$query .= "WHERE `Id` = {$Id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($connection, $query);

		if ($result && mysqli_affected_rows($connection) >= 0) {
			// Success
			$_SESSION["message"] = "Producto Modificado";
			redirect_to("manage_insumos.php");
		} else {
			// Failure
			$message = "Error al Modificar Producto";
			
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
		<a href="manage_insumos.php">Cancel</a>
		
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
