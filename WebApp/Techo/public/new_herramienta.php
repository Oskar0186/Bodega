<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php echo navigation_herramienta(); ?>
  </div>
  <div id="page">
		<?php echo message(); ?>
		<?php $errors = errors(); ?>
		<?php echo form_errors($errors); ?>
		
		<h2>Crear Herramienta</h2>
		<form action="create_herramienta.php" method="post">
		  <p>Producto:
		    <input type="text" name="Producto" value="" />
		  </p>
		  <p>Presentacion:
		      <input type="text" name="Presentacion" value="Unidad" />
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
            <p>Cantidad por Kit:
		      <input type="text" name="Kit" value="" />
		  </p>
		  <input type="submit" name="submit" value="Crear Herramienta" />
		</form>
		<br />
		<a href="manage_herramienta.php">Cancel</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
