<?php 

/**
 * 
 */
class Reminder extends Controller
{
	public function index()
	{
		$data['judul'] = 'Reminder';
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('kost/index',$data);
		$this->view('templates/footer');
	}

	public function penerimaan()
	{
		$data['judul'] = 'Reminder Penerimaan Pembayaran';
		$data['kost'] = $this->model('Kost_model')->getKostAll();
		$this->view('templates/header',$data);
		$this->view('reminder/penerimaan',$data);
		$this->view('templates/footer');
	}
}	