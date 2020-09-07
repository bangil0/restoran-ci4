<?= $this->extend('template/admin')?>

<?= $this->section('content')?>

<div class="col">
	<?php
		if (!empty(session()->getFlashdata('info'))) {
			echo '<div class="alert alert-danger" role="alert">';
			$error = session()->getFlashdata('info');
			foreach ($error as $key => $value) {
				echo $key." => ".$value;
				echo "<br>";
			}
			echo '</div>';
		}
	?>
</div>

<div class="col">
	<h3>INSERT DATA</h3>
</div>

<div class="col-8">
	<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="kategori">Kategori</label>
    		<select class="form-control" name="idkategori" id="idkategori">
        		<?php foreach($kategori as $key => $value):?>
            		<option value="<?= $value['idkategori']?>"><?= $value['kategori']?></option>
        		<?php endforeach;?>
    		</select>
		</div>
		<label for="menu">Menu</label>
		<div class="form-group">
			<input type="text" name="menu" required class="form-control">
		</div>
		<label for="harga">Harga</label>
		<div class="form-group">
			<input type="text" name="harga" required class="form-control">
		</div>
		<label for="gambar">Gambar</label>
		<div class="form-group">
			<input type="file" name="gambar" required class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
		</div>
	</form>
</div>

<?= $this->endsection()?>