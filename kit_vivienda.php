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
    <?php $herraje_set = find_all_herraje();?>    
    <?php
        while($herraje = mysqli_fetch_assoc($herraje_set)) {
        ?>        
        <table>
            <tr>
                <th style="text-align: left; width: 300px;"></th>       
            </tr>
                <tr>
                    <td><?php echo htmlentities("(Id:" . $herraje["Id"] .") " . $herraje["Producto"]); ?></td>
                    <td><?php 
                            $Cantidad = $herraje["Cantidad"]; 
                            $Kit = $herraje["Kit"];
                            $Cant = round($Cantidad / $Kit, 0, PHP_ROUND_HALF_DOWN);   
                            echo htmlentities("Cantidad de Viviendas: " . $Cant);
                        ?></td>
                </tr>
        </table>
	   <?php } ?>
    <?php mysqli_free_result($herraje_set); ?>
</ul>
</div>
</div>
<?php include("../includes/layouts/footer.php");?>