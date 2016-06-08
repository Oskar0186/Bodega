<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php echo navigation_herramienta();?>
  </div>
  <div id="page" style="overflow: scroll;" >
    <?php echo message(); ?>
<ul class="herramienta">
    <?php $herramienta_set = find_all_herramienta();?>    
    <?php
        while($herramienta = mysqli_fetch_assoc($herramienta_set)) {
        ?>        
        <table>
            <tr>
                <th style="text-align: left; width: 300px;"></th>  
            </tr>
            <li>
                <tr>
                    <td><?php echo htmlentities($herramienta["Producto"] . " " .  " (Id: " . $herramienta["Id"] .")"); ?></td>
                    <td><a href="new_update_herramienta.php?id=<?php echo urlencode($herramienta["Id"]); ?>">Ingreso/Egreso</a></td>
                </tr>
            </li>
        </table>
        <?php $estado_set = find_estado_for_herramienta($herramienta["Id"]);?>    
        <ul class="estado">
        <?php
			 while($estado = mysqli_fetch_assoc($estado_set)) {
                ?>
                <li>Buen Estado: <?php echo $estado["Buen_Estado_Cantidad"]; ?></li>   
                <li>Mal Estado: <?php echo $estado["Mal_Estado_Cantidad"]; ?></li>
                <li>Reparar: <?php echo $estado["Reparar_Cantidad"]; ?></li>
            <?php } ?>
        <?php mysqli_free_result($estado_set); ?>
        </ul>
	   <?php } ?>
    <?php mysqli_free_result($herramienta_set); ?>
</ul>
</div>
</div>

<?php include("../includes/layouts/footer.php");?>