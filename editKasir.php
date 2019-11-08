<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$id_kasir    = $_GET['id_kasir'];
$queryEdit = mysql_query("SELECT * FROM kasir WHERE id_kasir = '$id_kasir'");
$isiEdit   = mysql_fetch_array($queryEdit);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>EDIT DATA <?php echo $isiEdit[1]; ?></h3>
		</div>
		<div class="modal-body">
			<label>ID KASIR : <b><?php echo $isiEdit[0]; ?></b></label>
			<input type="hidden" id="newid_kasir" value="<?php echo $isiEdit[0]; ?>"><br>
			<label>NAMA</label>
			<input type="text" id="newnama" class="form-control" value="<?php echo $isiEdit[1]; ?>">
			<label>ALAMAT</label>
			<input type="text" id="newalamat" class="form-control" value="<?php echo $isiEdit[2]; ?>">
			<label>TELEPON</label>
			<input type="text" id="newtelepon" class="form-control" value="<?php echo $isiEdit[3]; ?>">
			<label>USERNAME</label>
			<input type="text" id="newusername" class="form-control" value="<?php echo $isiEdit[5]; ?>">
			<label>PASSWORD</label>
			<input type="password" id="newpassword" class="form-control" value="<?php echo $isiEdit[6]; ?>">
			<label>KONFIRMASI PASSWORD</label>
			<input type="password" id="newkonfirm" class="form-control" value="<?php echo $isiEdit[6]; ?>">
			<label>AKSES</label>
			<select class="form-control" id="newakses">
				<option <?php if($isiEdit[7] == "ADMIN"){echo "selected";} ?> value="ADMIN">ADMIN</option>
				<option <?php if($isiEdit[7] == "KASIR"){echo "selected";} ?> value="KASIR">KASIR</option>
			</select>
			<hr>
			<button type="button" id="update" class="btn btn-flat btn-primary pull-right">
				UPDATE <i class="fa fa-save"></i>
			</button><br>
			<div id="hasilUpdate" style="display: none"></div>
		</div>
	</div>
</div>