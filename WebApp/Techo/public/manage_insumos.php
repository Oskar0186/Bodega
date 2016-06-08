<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
		<?php echo navigation_insumos();?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php $insumos_set = find_all_insumos();?>    
        <?php
			while($insumos = mysqli_fetch_assoc($insumos_set)) {
        ?>
            <ul class="insumos">
                <table>
                    <tr>
                    <th style="text-align: left; width: 300px;"></th>
                    </tr>
                    <li>
                        <tr>
                            <td><?php echo htmlentities($insumos["Producto"] . " (Id: " . $insumos["Id"] . ")"); ?></td>
                            <td><a href="new_update_insumos.php?id=<?php echo urlencode($insumos["Id"]); ?>">Ingreso/Egreso</a></td>
                        </tr>
                    </li>
                </table>    
                <ul>
                    <li>Presentacion: <?php echo $insumos["Presentacion"]; ?></li>   
                    <li>Cantidad: <?php echo $insumos["Cantidad"]; ?></li>
                    <li>Vencimiento: <?php echo $insumos["Expira"]; ?></li>
                </ul>
            </ul>
            <?php } ?>
    <?php mysqli_free_result($insumos_set); ?>	
  </div>
</div>
<?php include("../includes/layouts/footer.php");?>