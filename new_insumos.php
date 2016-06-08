<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php echo navigation_insumos(); ?>
  </div>
  <div id="page">
		<?php echo message(); ?>
		<?php $errors = errors(); ?>
		<?php echo form_errors($errors); ?>
		
		<h2>Crear Insumos</h2>
		<form action="create_insumos.php" method="post">
		  <p>Producto:
		    <input type="text" name="Producto" value="" />
		  </p>
		  <p>Presentacion:
		      <input type="text" name="Presentacion" value="Unidad" />
		  </p>
            <p>Cantidad:
		      <input type="text" name="Cantidad" value="" />
		  </p>
            <p>Vencimiento:
		      <input type="date" name="Vencimiento" value="" />
		  </p>
		  <input type="submit" name="submit" value="Crear Producto" />
		</form>
		<br />
		<a href="manage_insumos.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
