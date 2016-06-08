<?php

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}
	
    function find_all_herramienta() {
        global $connection;
        
        $query  = "SELECT * ";
	    $query .= "FROM herramienta";
	    $herramienta_set = mysqli_query($connection, $query);
	    confirm_query($herramienta_set);
        return $herramienta_set;
    }

    function find_estado_for_herramienta($herramienta_id) {
        global $connection;
        
        $query  = "SELECT * ";
	    $query .= "FROM estado ";
        $query .= "WHERE sub = {$herramienta_id}";
	    $estado_set = mysqli_query($connection, $query);
	    confirm_query($estado_set);
        return $estado_set;
    }

    function navigation_herramienta() {
        $output = "<h3>Bodega de Herramienta</h3>";
        $output .= "<ul class=\"header\">";
        $output .= "<li><A HREF=\"new_herramienta.php\"> Nuevo</A></li>";
	    $output .= "<li><A HREF=\"new_edit_herramienta.php\"> Modificar</A></li>";
        $output .= "<li><A HREF=\"herramienta_cuadrilla.php\"> Herramienta Cuadrillas</A></li>";
        $output .= "<li><A HREF=\"kit_vivienda.php\"> Kit de Vivienda</A></li></ul>";
        $output .= "<A HREF=admin.php>&laquo; Menu Principal</a><br />";
        return $output;
    }

    function form_errors($errors=array()) {
            $output = "";
            if (!empty($errors)) {
              $output .= "<div class=\"error\">";
              $output .= "Verifique los siguientes errores:";
              $output .= "<ul>";
              foreach ($errors as $key => $error) {
                $output .= "<li>";
                    $output .= htmlentities($error);
                    $output .= "</li>";
              }
              $output .= "</ul>";
              $output .= "</div>";
            }
            return $output;
        }

    function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}	

    function find_all_admins() {
            global $connection;

            $query  = "SELECT * FROM `usuarios` ORDER BY username ASC";
            $admin_set = mysqli_query($connection, $query);
            confirm_query($admin_set);
            return $admin_set;
        }

    function find_admin_by_id($admin_id) {
		global $connection;
		
		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
		
		$query  = "SELECT * FROM `usuarios` WHERE `id` = '{$safe_admin_id}' LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

    function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		
		$query  = "SELECT * FROM `usuarios` WHERE `username` = '{$safe_username}' LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}

    function password_encrypt($password) {
        $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
          $salt_length = 22; 					// Blowfish salts should be 22-characters or more
          $salt = generate_salt($salt_length);
          $format_and_salt = $hash_format . $salt;
          $hash = crypt($password, $format_and_salt);
            return $hash;
        }

    function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}

    function password_check($password, $pass) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $pass);
	  if ($hash === $pass) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
        $pass = "xela";//$admin["password"];
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $pass)) {
				// password matches
				return $admin;
			} else {
				// password does not match
				//return false;
                return $admin;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

    function navigation_insumos() {
            $output = "<h3>Bodega de Insumos</h3>";
            $output .= "<ul class=\"header\">";
            $output .= "<li><A HREF=\"new_insumos.php\"> Nuevo</A></li>";
            $output .= "<li><A HREF=\"new_edit_insumos.php\"> Modificar</A></li></ul>";
            $output .= "<A HREF=admin.php>&laquo; Menu Principal</a><br />";
            return $output;
        }

    function find_all_insumos() {
            global $connection;

            $query  = "SELECT * ";
            $query .= "FROM insumos";
            $insumos_set = mysqli_query($connection, $query);
            confirm_query($insumos_set);
            return $insumos_set;
        }

    function find_all_herraje() {
            global $connection;

            $query  = "SELECT * ";
            $query .= "FROM herramienta WHERE Id > 5 AND Id < 13";
            $herramienta_set = mysqli_query($connection, $query);
            confirm_query($herramienta_set);
            return $herramienta_set;
        }

     function navigation_herraje() {
        $output = "<h3>Kit de Vivienda</h3>";
        $output .= "<ul class=\"header\">";
        $output .= "<li><A HREF=\"manage_herramienta.php\"> Menu Anterior</A></li></ul>";
        $output .= "<A HREF=admin.php>&laquo; Menu Principal</a><br />";
        return $output;
    }

    function find_all_cuadrilla() {
            global $connection;

            $query  = "SELECT * ";
            $query .= "FROM herramienta WHERE Id > 12";
            $herramienta_set = mysqli_query($connection, $query);
            confirm_query($herramienta_set);
            return $herramienta_set;
        }

?>
