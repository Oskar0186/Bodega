<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
		<?php echo navigation_insumos(); ?>
  </div>
  <div id="page">
		<?php echo message(); ?>
		<?php $errors = errors(); ?>
		<?php echo form_errors($errors); ?>
		<?php $supplies = $_GET["id"]; ?>
      <h2>Ingreso/Egreso Herramienta</h2>
		<form action="update_insumos.php" method="post">
		  <p>Id:
		    <input type="text" name="Id" value="<?php echo $supplies; ?>" onfocus="this.blur()" />
		  </p>
            <p>Cantidad:
		      <input type="text" name="Cantidad" value="" />
		  </p>
            <p>Vencimiento:
		      <input type="date" name="Vencimiento" value="" />
		  </p>
		  <input type="submit" name="submit" value="Actualizar Productos" />
		</form>
		<br />
		<a href="manage_insumos.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
