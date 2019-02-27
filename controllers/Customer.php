<?php 

/**
 * 
 */
class Customer extends Controller
{
	public function index()
	{
		$data['judul'] = 'Customer';
		$data['customer'] = $this->model('Customer_model')->getCustomerAll();
		$data['customer2'] = $this->model('Customer_model')->getCustomerBlankUser();
		$this->view('templates/header',$data);
		$this->view('customer/index',$data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		$data['judul'] = 'Customer';
		$data['customer'] = $this->model('Customer_model')->getCustomerbyId($id);
		$this->view('templates/header',$data);
		$this->view('customer/detail',$data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		if($this->model('Customer_model')->tambahCustomer($_POST) > 0)
		{			
			FlashMsg::setFlash('Customer','berhasil','ditambahkan','success','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Customer','gagal','ditambahkan','danger','<br>Kemungkinan Karena : <br><ol><li>No. Identitas / No. Handphone / Email sudah dimiliki Customer lain.</li></ol>');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
	}

	public function hapus($id)
	{
		if($this->model('Customer_model')->hapusCustomer($id) > 0)
		{			
			FlashMsg::setFlash('Customer','berhasil','dihapuskan','success','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Customer','gagal','dihapuskan','danger','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
	}
	
	public function getubah()
	{
		echo json_encode($this->model('Customer_model')->getKostbyId($_POST["id"]));
	}

	public function ubah()
	{
		if($this->model('Customer_model')->ubahCustomer($_POST) > 0)
		{			
			FlashMsg::setFlash('Customer','berhasil','diubah','success','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
		else
		{
			FlashMsg::setFlash('Customer','gagal','diubah','danger','');
			header('Location: ' . BASEURL .'/customer');
			exit;
		}
	}

	public function cari()
	{
		$data['judul'] = 'Customer';
		$data['customer'] = $this->model('Customer_model')->cariCustomer();
		$this->view('templates/header',$data);
		$this->view('customer/index',$data);
		$this->view('templates/footer');
	}
}	