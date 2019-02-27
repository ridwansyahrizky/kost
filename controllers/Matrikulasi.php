<?php 

/**
 * 
 */
class Matrikulasi extends Controller
{
	public function index()
	{
		$data['judul'] = 'Matrikulasi';
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$data['user'] = $this->model('User_model')->getUserAll();
		$this->view('templates/header',$data);
		$this->view('matrikulasi/index',$data);
		$this->view('templates/footer');
	}

	public function simpanMatrikulasi()
	{
		if($this->model('Matrikulasi_model')->updateMatrikulasi($_POST) > 0)
		{			
			FlashMsg::setFlash('Matrikulasi','berhasil','diproses','success','');
			header('Location: ' . BASEURL .'/matrikulasi');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Matrikulasi','gagal','diproses','danger','');
			header('Location: ' . BASEURL .'/matrikulasi');
			exit;
		}
	}
}	