<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
		<?php echo navigation_herramienta(); ?>
  </div>
  <div id="page">
		<?php echo message(); ?>
		<?php $errors = errors(); ?>
		<?php echo form_errors($errors); ?>
		<?php 
            $tool = $_GET["id"];
        ?>
      <h2>Ingreso/Egreso Herramienta</h2>
		<form action="update_herramienta.php" method="post">
		  <p>Id:
		    <input type="text" name="Id" value="<?php echo $tool; ?>" onfocus="this.blur()" />
		  </p>
            <p>Cantidad Buen Estado:
		      <input type="text" name="Cantidad_Buen_Estado" value="" />
		  </p>
            <p>Cantidad Mal Estado:
		      <input type="text" name="Cantidad_Mal_Estado" value="" />
		  </p>
            <p>Cantidad Reparar:
		      <input type="text" name="Cantidad_Reparar" value="" />
		  </p>
        <input type="submit" name="submit" value="Actualizar Herramienta" />
		</form>
		<br />
		<a href="manage_herramienta.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
