<?php
  // 1. Create a database connection
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_NAME", "Bodega");
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("ERROR en la conexion a la base de datos: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
