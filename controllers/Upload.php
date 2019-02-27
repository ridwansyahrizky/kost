<?php 

/**
 * 
 */
class Upload extends Controller
{
	public function index()
	{		
		$data["judul"] = "Upload Stock";
		$this->view('templates/header',$data);
		$this->db = new Database;
		$this->view('upload/excel_reader');
		$this->view('upload/index');
		$this->view('templates/footer');		
	}
}