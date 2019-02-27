<?php 

/**
 * 
 */
class Sewa extends Controller
{
	public function index(){
		$data['judul'] = 'Sewa';
		$this->view('templates/header',$data);
		$this->view('sewa/index',$data);
		$this->view('templates/footer');
	}
}