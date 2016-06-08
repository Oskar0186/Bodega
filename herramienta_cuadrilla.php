<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php echo navigation_herraje();?>
  </div>
  <div id="page">
    <?php echo message(); ?>
<ul class="herramienta">
    <?php $cuadrilla_set = find_all_cuadrilla();?>    
    <?php
        while($cuadrilla = mysqli_fetch_assoc($cuadrilla_set)) {
        ?>        
        <table>
            <tr>
                <th style="text-align: left; width: 300px;"></th>       
            </tr>
                <tr>
                    <td><?php echo htmlentities("(Id:" . $cuadrilla["Id"] .") " . $cuadrilla["Producto"]); ?></td>
                    <td><?php 
                            $cantidad = $cuadrille["Id"]; 
                            if ($cantidad == 6){
                                $cant = $cuadrilla["Cantidad"] / 4; 
                                echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                            }
                            elseif ($cantidad == 7) {
				                $cant = $cuadrilla["Cantidad"] / 9; 
                                echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                            }
			                 elseif ($cantidad == 8) {
				                    $cant = $cuadrilla["Cantidad"] / 2;
                                    echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                             }
                            elseif ($cantidad == 9) {
				                $cant = $cuadrilla["Cantidad"] / 9; 
                                echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                            }
                            elseif ($cantidad == 10) {
				                $cant = $cuadrilla["Cantidad"] / 9; 
                                echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                            }
                            elseif ($cantidad == 11) {
				                $cant = $cuadrilla["Cantidad"] / 9; 
                                echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                            }
                            else {
                                    $cant = $cuadrilla["Cantidad"] / 9; 
                                    echo htmlentities("Cantidad de Cuadrillas: " . $cant);
                                }
                        ?></td>
                </tr>
        </table>
	   <?php } ?>
    <?php mysqli_free_result($herraje_set); ?>
</ul>
</div>
</div>
<?php include("../includes/layouts/footer.php");?>