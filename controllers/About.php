<?php 

class About extends Controller{
	public function index($nama = 'M. Rizky Ridwansyah',$pekerjaan='Programmer'){
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;

		$data['judul'] = 'About';
		$this->view('templates/header',$data);
		$this->view('about/index',$data);//ini manggil class view di folder core dan Controller.php
		$this->view('templates/footer');
	}
	public function page()
	{
		$data['judul'] = 'Page';
		$this->view('templates/header',$data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}