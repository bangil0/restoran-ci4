<?= $this->extend('template/admin')?>

<?= $this->section('content')?>

<div class="row">
<?= view_cell('App\Controllers\Admin\Menu::option') ?>
</div>

<div class="row">


<h1>Upload Image</h1>

<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
	Gambar : <input type="file" name="gambar" required>
	<br>
	<input type="submit" name="simpan" value="SIMPAN">
</form>
</div>

<?= $this->endsection()?>