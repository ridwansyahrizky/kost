<?php 

/**
 * 
 */
class Login extends Controller
{

	public function index()
	{		
		$this->view('login/index');		
	}
	
	public function signin()
	{		
		$arrhasil = explode(';', $this->model('Login_model')->logIn($_POST));
		$hasil = $arrhasil[0];
		if($hasil == "success")
		{					
			$_SESSION["user"] = $_POST["id"];
			$_SESSION["lvl"] = $arrhasil[1];
			echo "<script>alert('Login Berhasil');
			document.location.href = '".BASEURL."/home'</script>";						
			exit;
		}
		else if($hasil == "blokir")
		{
			echo "<script>alert('User Sudah Di Blokir!');
			document.location.href = '".BASEURL."/login'</script>";						
			exit;
		}
		else if($hasil == "notfound")
		{
			echo "<script>alert('User Tidak Ada!');
			document.location.href = '".BASEURL."/login'</script>";						
			exit;
		}
		else
		{						
			$msg = $hasil < 3 ? "User Akan Diblokir jika salah password 3x!" : "User Sudah Di Blokir, hubungi Administrator";

			echo "<script>alert('Password Salah ".$hasil."x. ".$msg."');
			document.location.href = '".BASEURL."/login'</script>";						
			exit;
		}		
	}	
}