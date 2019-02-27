<?php 

/**
 * 
 */
class Matrikulasi_model
{

	private $table = 'ms_user';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	
	public function updateMatrikulasi($data)
	{
		$this->db->query("UPDATE ms_user SET id_kost = ''");
		$this->db->execute();
		
		$cek = 0;
		$hasil = 0;
		foreach ($_POST["data"] as $data) 
		{
			$arrdata = explode(';', $data);
			for ($i=0; $i < 2; $i++) 
			{ 
				$query = "UPDATE ms_user SET id_kost = :idkost WHERE id_user = :id";
				$this->db->query($query);
						// //binding
				$this->db->bind('id',$arrdata[0]);
				$this->db->bind('idkost',$arrdata[1]);
				//execute query
				$this->db->execute();

				if($this->db->rowAffect() > 0)
					$hasil++;
			}

			$cek++;
		}
		if($hasil == $cek)
			return 1;
		else
			return 0;
	}
}