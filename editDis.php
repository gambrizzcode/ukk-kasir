<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$id_dis    = $_GET['id_dis'];
$queryEdit = mysql_query("SELECT * FROM distributor WHERE id_distributor = '$id_dis'");
$isiEdit   = mysql_fetch_array($queryEdit);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>EDIT DATA <?php echo $isiEdit[1]; ?></h3>
		</div>
		<div class="modal-body">
			<label>ID DISTRIBUTOR : <b><?php echo $isiEdit[0]; ?></b></label>
			<input type="hidden" id="newid_dis" value="<?php echo $isiEdit[0]; ?>"><br>
			<label>NAMA DISTRIBUTOR</label>
			<input type="text" id="newnama" class="form-control" value="<?php echo $isiEdit[1]; ?>">
			<label>ALAMAT DISTRIBUTOR</label>
			<input type="text" id="newalamat" class="form-control" value="<?php echo $isiEdit[2]; ?>">
			<label>TELEPON DISTRIBUTOR</label>
			<input type="text" id="newtelepon" class="form-control" value="<?php echo $isiEdit[3]; ?>">
			<hr>
			<button type="button" id="update" class="btn btn-flat btn-primary pull-right">
				UPDATE <i class="fa fa-save"></i>
			</button><br>
			<div id="hasilUpdate" style="display: none"></div>
		</div>
	</div>
</div>