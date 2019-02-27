<?php 
/**
 * 
 */
class Home extends Controller
{
	public function index()
	{
		$data['judul'] = 'Home';			
		$data['session'] = isset($_SESSION["user"]) ? $_SESSION["user"] : "";
		$data["user"] = isset($_SESSION["user"]) ? $this->model('User_model')->getUserbyId($_SESSION["user"]) : "";
		$this->view('templates/header',$data);
		$this->view('home/index',$data);
		$this->view('templates/footer');
	}
}