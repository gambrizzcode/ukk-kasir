<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();

$id_buku    = $_GET['id_buku'];
$queryEdit = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_buku'");
$isiEdit   = mysql_fetch_array($queryEdit);
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h3>EDIT DATA <?php echo $isiEdit[1]; ?></h3>
		</div>
		<div class="modal-body">
			<label>ID BUKU : <b><?php echo $isiEdit[0]; ?></b></label>
			<input type="hidden" id="newid_buku" value="<?php echo $isiEdit[0]; ?>"><br>
			<label>JUDUL</label>
			<input type="text" id="newjudul" class="form-control" value="<?php echo $isiEdit[1]; ?>">
			<label>NO ISBN</label>
			<input type="text" id="newnoisbn" class="form-control" value="<?php echo $isiEdit[2]; ?>">
			<label>PENULIS</label>
			<input type="text" id="newpenulis" class="form-control" value="<?php echo $isiEdit[3]; ?>">
			<label>PENERBIT</label>
			<input type="text" id="newpenerbit" class="form-control" value="<?php echo $isiEdit[4]; ?>">
			<label>TAHUN</label>
			<input type="text" id="newtahun" class="form-control" value="<?php echo $isiEdit[5]; ?>">
			<label>STOK</label>
			<input type="text" id="newstok" class="form-control" value="<?php echo $isiEdit[6]; ?>">
			<label>HARGA POKOK</label>
			<input type="text" id="newhargapokok" class="form-control" value="<?php echo $isiEdit[7]; ?>">
			<label>HARGA JUAL</label>
			<input type="text" id="newhargajual" class="form-control" value="<?php echo $isiEdit[8]; ?>">
			<label>PPN</label>
			<input type="text" id="newppn" class="form-control" value="<?php echo $isiEdit[9]; ?>">
			<label>DISKON</label>
			<input type="text" id="newdiskon" class="form-control" value="<?php echo $isiEdit[10]; ?>">
			<hr>
			<button type="button" id="update" class="btn btn-flat btn-primary pull-right">
				UPDATE <i class="fa fa-save"></i>
			</button><br>
			<div id="hasilUpdate" style="display: none"></div>
		</div>
	</div>
</div>