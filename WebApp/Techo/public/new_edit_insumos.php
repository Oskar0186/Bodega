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
		
		<h2>Modificar Insumos</h2>
		<form action="edit_insumos.php" method="post">
		  <p>Id:
		    <input type="text" name="Id" value="" />
		  </p>
          <p>Producto:
		    <input type="text" name="Producto" value="" />
		  </p>
		  <p>Presentacion:
		      <input type="text" name="Presentacion" value="Unidad" />
		  </p>
		  <input type="submit" name="submit" value="Modificar Productos" />
		</form>
		<br />
		<a href="manage_insumos.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
