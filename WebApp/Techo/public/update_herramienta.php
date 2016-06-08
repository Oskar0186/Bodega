<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
if (isset($_POST['submit'])) {
	// Process the form
	
	// validations
	$required_fields = array("Id", "Cantidad_Buen_Estado", "Cantidad_Mal_Estado", "Cantidad_Reparar");
	validate_presences($required_fields);
	
	if (empty($errors)) {
		
		// Perform Update

		$Id = (int) $_POST["Id"];
		$Cantidad_Buen_Estado = (int) $_POST["Cantidad_Buen_Estado"];
		$Cantidad_Mal_Estado = (int) $_POST["Cantidad_Mal_Estado"];
		$Cantidad_Reparar = (int) $_POST["Cantidad_Reparar"];
		$Cantidad = $Cantidad_Buen_Estado + $Cantidad_Mal_Estado + $Cantidad_Reparar;
        $Kit = (int) $_POST["Kit"];
	
		$query  = "UPDATE `herramienta` SET ";
		$query .= "`Cantidad` = {$Cantidad} ";
		$query .= "WHERE `Id` = {$Id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($connection, $query);
		
		$Sub = $Id;
    	$query  = "UPDATE `estado` SET ";
		$query .= "`Buen_Estado_Cantidad` = '{$Cantidad_Buen_Estado}', ";
		$query .= "`Mal_Estado_Cantidad` = '{$Cantidad_Mal_Estado}', ";
		$query .= "`Reparar_Cantidad` = '{$Cantidad_Reparar}' ";
		$query .= "WHERE `Sub` = '{$Sub}' ";
		$query .= "LIMIT 1";
		$result1 = mysqli_query($connection, $query);

		if ($result && $result1 && mysqli_affected_rows($connection) >= 0) {
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
