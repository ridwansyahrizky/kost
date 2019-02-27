<?php 

/**
 * 
 */
class Utilitas extends Controller
{
	public function index()
	{
		$data['judul'] = 'Utilitas';
		$data['user'] = $this->model('User_model')->getUserAll();
		$this->view('templates/header',$data);
		$this->view('utilitas/index',$data);//ini manggil class view di folder core dan Controller.php
		$this->view('templates/footer');
	}
	
	public function cari()
	{
		$data['judul'] = 'Utilitas';
		$data['user'] = $this->model('User_model')->cariUser();
		$this->view('templates/header',$data);
		$this->view('utilitas/index',$data);
		$this->view('templates/footer');
	}

}