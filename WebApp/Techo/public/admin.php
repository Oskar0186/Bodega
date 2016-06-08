<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <h2>Menu</h2>
    <p>Administracion de Bodegas</p>
    <ul>
      <li><a href="manage_herramienta.php">Bodega de Herramientas</a></li>
      <li><a href="manage_insumos.php">Bodega de Insumos</a></li>
      <li><a href="manage_admins.php">Administrar Usuarios</a></li>
      <li><a href="logout.php">Desconectar</a></li>
    </ul>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
