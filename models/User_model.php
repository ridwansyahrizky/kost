<?php 


/**
 * 
 */
class User_model
{
	private $table = 'ms_user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getUserAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table. ' WHERE seclev <> "CST"');
		return $this->db->rs();
	}

	public function getUserbyId($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahUser($data)
	{
		$this->db->query("SELECT COUNT(*) FROM ms_user WHERE id_user = :id1");
		$this->db->bind('id1',$data["iduser"]);		
		$this->db->execute();
		$cek = $this->db->count();

		if($cek == 0)
		{
			if($data["pass"] == $data["konfirmpass"]){
				$password = password_hash($data["pass"],PASSWORD_DEFAULT);
				$query = "INSERT INTO ms_user VALUES (:id, :nama, :pass, :seclev,'A',0,:idkost)";
				$this->db->query($query);
				// //binding
				$this->db->bind('id',$data["iduser"]);
				$this->db->bind('nama',$data["namauser"]);
				$this->db->bind('pass',$password);		
				$this->db->bind('seclev', $data["seclev"]);
				$this->db->bind('idkost',$data["namakost"]);
				//execute query
				$this->db->execute();

				return $this->db->rowAffect();
			}
			else{
				return 0;
			}
		}
		else{
			return 0;
		}
	}

	public function tambahUserCustomer($data)
	{
		$this->db->query("SELECT COUNT(*) FROM ms_user WHERE id_user = :id1");
		$this->db->bind('id1',$data["iduser"]);		
		$this->db->execute();
		$cek = $this->db->count();

		if($cek == 0)
		{
			if($data["pass"] == $data["konfirmpass"]){
				$password = password_hash($data["pass"],PASSWORD_DEFAULT);
				$query = "INSERT INTO ms_user VALUES (:id, :nama, :pass, 'CUS','A',0)";
				$this->db->query($query);
				// //binding
				$this->db->bind('id',$data["iduser"]);
				$this->db->bind('nama',$data["namauser"]);
				$this->db->bind('pass',$password);		
				//execute query
				$this->db->execute();
		
				$tglupdate = date('Y-m-d');
				$query = "UPDATE ms_customer SET id_user = :iduser, tglupdate = '$tglupdate' WHERE id_customer = :id";
				$this->db->query($query);
				$this->db->bind('iduser',$data["iduser"]);
				$this->db->bind('id',$data["idcustomer"]);
				$this->db->execute();

				return $this->db->rowAffect();
			}
			else{
				return 0;
			}
		}
		else{
			return 0;
		}
	}

	public function hapusUser($id)
	{
		$query = "DELETE FROM ms_user WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowAffect();
	}

	public function ubahUser($data)
	{		
		$query = "UPDATE ms_user SET nama_user = :nama,
					seclev = :seclev
					WHERE id_user = :id";
		$this->db->query($query);
		// //binding
		$this->db->bind('nama',$data["namauser"]);
		$this->db->bind('seclev',$data["seclev"]);
		$this->db->bind('id',$data["id"]);
		//execute query
		$this->db->execute();
			
		return $this->db->rowAffect();		
	}

	public function Blokir($id)
	{
		$query = "UPDATE ms_user SET Status = 'B' WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowAffect();
	}

	public function Aktivasi($id)
	{
		$query = "UPDATE ms_user SET Status = 'A' WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id',$id);
		$this->db->execute();

		return $this->db->rowAffect();
	}

	public function SetPass($data)
	{
		if($data["konfirmpassbaru"] == $data["passbaru"])
		{
			$result = $this->getUserbyId($data["id"]);
			if(password_verify($data["passlama"],$result["password"]))
			{
				$password = password_hash($data["passbaru"],PASSWORD_DEFAULT);

				$query = "UPDATE ms_user SET password = :pass WHERE id_user = :id";
				$this->db->query($query);
				$this->db->bind('id',$data["id"]);
				$this->db->bind('pass',$password);
				$this->db->execute();

				return $this->db->rowAffect();
			}
			else{
				return $password;					
			}
		}
		else{
			return 0;
		}


	}

	public function cariUser()
	{
		$keyword = $_POST["keyword"];
		$this->db->query('SELECT * FROM ms_user WHERE id_user LIKE :key  OR nama_user LIKE :key');
		$this->db->bind('key',"%$keyword%");
		return $this->db->rs();
	}

}