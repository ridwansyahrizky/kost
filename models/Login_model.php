<?php 

/**
 * 
 */
class Login_model
{
	private $table = 'ms_user';
	private $db;

	//untuk koneksi ke database.
	public function __construct()
	{
		$this->db=new Database;
	}

	public function getUserData($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user=:id');
		$this->db->bind('id',$id);
		return $this->db->rs();
	}

	public function logIn($data)
	{
		$this->db->query("SELECT COUNT(*) FROM ms_user WHERE id_user = :id");			
		$this->db->bind('id',htmlspecialchars($data["id"]));		
		$this->db->execute();
		$cek = $this->db->count();
		$result = $this->getUserData($data["id"]);

		if($cek > 0)
		{
			foreach ($result as $r) 
			{
				if($r["status"] == "A")//pengecekan status aktif
				{
					if(password_verify($data["password"],$r["password"])){
						$this->db->query("UPDATE ms_user SET salahpass = 0 WHERE id_user = :id");
						$this->db->bind('id',htmlspecialchars($data["id"]));		
						$this->db->execute();

						$this->db->query("SELECT * FROM ms_user WHERE id_user = :id");
						$this->db->bind('id',htmlspecialchars($data["id"]));		
						$result = $this->db->single();
						$level = $result["seclev"];
						
						return "success;".$level;//berhasil login
					}
					else{
						$this->db->query("UPDATE ms_user SET salahpass = salahpass + 1 WHERE id_user = :id");
						$this->db->bind('id',htmlspecialchars($data["id"]));		
						$this->db->execute();
						
						$jml = $r["salahpass"]  + 1;
						if($jml >= 3)
						{
							$this->db->query("UPDATE ms_user SET status = 'B' WHERE id_user = :id");
							$this->db->bind('id',htmlspecialchars($data["id"]));		
							$this->db->execute();															
						}
						return $jml;//jml salah passwordnya
					}
				}
				else
					return "blokir";//status user blokir
			}
		}
		else{
			return "notfound";//user tidak ada
		}
	}
}