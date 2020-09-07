<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
	public function index()
	{
	   echo "<h1>Belajar CI 4</h1>";
		//return view('welcome_message');
	}

	public function select()
	{
	   $data = [
	       'judul' => 'SELECT DATA DARI controller',
	       'kategori' => ['Makanan','Minuman','Buah']
	   ];
	   
	   echo "<pre>";
	   print_r($data);
	   echo "</pre>";
	   
	   echo view("template/header");
	   echo view("kategori/select",data);
	   echo view("template/footer");
	}

	public function selectWhere($id = null)
	{
	   echo "Menampilkan data yang dipilih  $id";
	}

	public function formInsert()
	{
	   echo view("template/header");
	   echo view("kategori/forminsert");
	   echo view("template/footer");
	}

	public function formUpdate()
	{
	   echo view("template/header");
	   echo view("kategori/update");
	   echo view("template/footer");
	}

	public function update($id = null)
	{
	   echo "Menampilkan proses update $id";
	}

	public function delete($id = null)
	{
	   echo "Menampilkan proses delete";
	}

	//--------------------------------------------------------------------

}
