<?php 

/**
 * 
 */
class Customer_model
{
	private $table = 'ms_customer';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getCustomerAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->rs();
	}

	public function getCustomerBlankUser()
	{
		$this->db->query("SELECT * FROM " . $this->table . " WHERE id_user = '' ");
		return $this->db->rs();
	}

	public function getCustomerbyId($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_customer=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahCustomer($data)
	{
		if($this->validasi($this->getCustomerAll(),$_POST))
		{
			$tgljoin = date('Y-m-d');
			$query = "INSERT INTO ms_customer VALUES ('', :nama,:noktp,'A',:tempat,:tgllahir,:nohp,:email,:namakerabat,:nohpkerabat,:hubungan,:marital,:kewarganegaraan,'','$tgljoin','$tgljoin',0)";
			$this->db->query($query);
			$this->db->bind('nama',$data["nama"]);
			$this->db->bind('noktp',$data["ktp"]);		
			$this->db->bind('tempat',$data["tempat"]);
			$this->db->bind('tgllahir',$data["tgllahir"]);
			$this->db->bind('nohp',$data["hp"]);
			$this->db->bind('email',$data["email"]);
			$this->db->bind('namakerabat',$data["namakerabat"]);
			$this->db->bind('nohpkerabat',$data["hpkerabat"]);
			$this->db->bind('hubungan',$data["hubungankerabat"]);
			$this->db->bind('marital',$data["marital"]);
			$this->db->bind('kewarganegaraan',$data["kewarganegaraan"]);

			//execute query
			$this->db->execute();
			return $this->db->rowAffect();		
		}
		else
			return 0;
	}

	public function hapusCustomer($id)
	{
		$query = "DELETE FROM '.$this->table.' WHERE id_custmer = :sn";
		$this->db->query($query);
		$this->db->bind('sn',$id);
		$this->db->execute();

		return $this->db->rowAffect();
	}

	public function ubahCustomer($data)
	{
		$tgljoin = date('Y-m-d');//tanggal join set today		
		//insert kecuali id
		$query = "UPDATE ms_kost SET 
					nama_customer = :nama,
					no_ktp = :noktp,	
					tempat_lahir = :tempat,
					tgl_lahir = :tgllahir,
					no_hp = :nohp,
					email = :email,
					nama_kerabat = :namakerabat,
					no_hp_kerabat = :nohpkerabat,
					hubungan_kerabat = :hubungan,
					marital = :marital,							
					kewarganegaraan = :kewarganegaraan,
					tglupdate = '$tgljoin'
					WHERE id_customer = :id";

		$this->db->query($query);
		// //binding
		$this->db->bind('nama',$data["nama"]);
		$this->db->bind('noktp',$data["ktp"]);		
		$this->db->bind('tempat',$data["tempat"]);
		$this->db->bind('tgllahir',$data["tgllahir"]);
		$this->db->bind('nohp',$data["hp"]);
		$this->db->bind('email',$data["email"]);
		$this->db->bind('namakerabat',$data["namakerabat"]);
		$this->db->bind('nohpkerabat',$data["hpkerabat"]);
		$this->db->bind('hubungan',$data["hubungankerabat"]);
		$this->db->bind('marital',$data["marital"]);
		$this->db->bind('kewarganegaraan',$data["kewarganegaraan"]);
		$this->db->bind('id',$data["id"]);
		//execute query
		$this->db->execute();
		
		return $this->db->rowAffect();		
	}

	public function cariCustomer()
	{
		$keyword = $_POST["keyword"];
		$this->db->query('SELECT * FROM '.$this->table.' WHERE nama_customer LIKE :key OR id_customer LIKE :key OR id_user LIKE :key');
		$this->db->bind('key',"%$keyword%");
		return $this->db->rs();
	}

	public function validasi($datas,$datacompares)
	{
		$x = true;

		foreach ($datas as $data) 
		{
			if($data["no_ktp"] == $datacompares["ktp"] || $data["email"] == $datacompares["email"] || $data["no_hp"] == $datacompares["hp"])
				$x = false;
		}	

		return $x;
	}
}
