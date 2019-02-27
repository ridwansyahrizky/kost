<?php 

/**
 * class App (kelas Utama)
 */
class App
{
	protected $controller = "Home";
	protected $method = "index";
	protected $params = [];	

	//__construct : function yang otomatis dijalankan ketika ada intansi class
	public function __construct(){				
		$this->controller = isset($_SESSION["user"]) ? "Home" : "Login";
		$url = $this->parseURL();
		//URL CONTROLLER
		//cek apakah url index 0 itu ada di file controller?
		if(file_exists('../app/controllers/' . $url[0] .'.php')){
			//set property controller dari url index 0
			$this->controller = isset($_SESSION["user"]) ? $url[0] : "Login";
			//hilangkan array url[0] agar tersisa parameter aja
			unset($url[0]);
		}
		require_once '../app/controllers/' . $this->controller .'.php';
		$this->controller = new $this->controller;//instansiasi class nya biar bisa pake method nya	

		//URL METHOD
		if(isset( $url[1])){
			//cek apakah ada method dari controller di atas?
			if(method_exists($this->controller, $url[1])){
				//set property method dari url index 1
				$this->method = $url[1];
				//hilangkan array url[1]
				unset($url[1]);

			}
		}

		//URL PARAMS
		if( !empty($url)){
			$this->params = array_values($url);			
		}

		//JALANKAN CONTROLLER,METHOD DAN PARAMETER YANG DIKIRIMKAN
		//call_user_func_array adalah fungsi untuk menjalankan method,controller,dan parameter
		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	public function parseURL()
	{
		if(isset($_GET['url']))
		{
			//jangan ada tanda / di akhir url
			$url = rtrim($_GET['url']);
			//bersihkan url dari tanda2 aneh
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//pecah url yang didapat menjadi array
			$url = explode('/', $url);
			return $url;
		}
	}
		
}