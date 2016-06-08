<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    $password = password_encrypt($_POST["password"]);
    
    $query  = "INSERT INTO usuarios (";
    $query .= "  username, password";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$password}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Usuario Creado";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "ERROR al crear Usuario";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Crear Usuario</h2>
    <form action="new_admin.php" method="post">
      <p>Usuario:
        <input type="text" name="username" value="" />
      </p>
      <p>Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Crear Usuario" />
    </form>
    <br />
    <a href="manage_admins.php">Cancelar</a>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
