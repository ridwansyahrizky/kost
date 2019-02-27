<?php 
/**
 * 
 */
class Fasilitas_model
{
	
	private $table = 'ref_fasilitas';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getFasilitasAll()
	{
		$this->db->query('SELECT *,CASE WHEN tipe_fasilitas = 1 THEN "Fasilitas Kamar" WHEN tipe_fasilitas = 2 THEN "Fasilitas Kamar Mandi" WHEN tipe_fasilitas = 3 THEN "Fasilitas Umum" ELSE "Fasilitas Parkir" END AS Type  FROM ' . $this->table . ' ORDER BY tipe_fasilitas');
		return $this->db->rs();
	}

	public function getFasilitasbyId($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_fasilitas=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getFasilitasbyKost($idKost)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kost=:id');
		$this->db->bind('id',$idKost);
		return $this->db->rs();
	}

	public function tambahFasilitas($data)
	{
		if($data["namakost"] != "0")
		{			
			$this->db->query("SELECT COUNT(*) FROM ref_fasilitas WHERE nama_fasilitas = :nama AND tipe_fasilitas = :tipe AND id_kost = :idkost1");			
			$this->db->bind('nama',$data["namafasilitas"]);
			$this->db->bind('tipe',$data["tipe"]);
			$this->db->bind('idkost1',$data["namakost"]);
			$this->db->execute();
			$cek = $this->db->count();
	
			if($cek == 0)
			{			
				$this->db->query("INSERT INTO ref_fasilitas VALUES ('',:namafasilitas,:tipe,:idkost1)");
				$this->db->bind('namafasilitas',$data["namafasilitas"]);
				$this->db->bind('tipe',$data["tipe"]);
				$this->db->bind('idkost1',$data["namakost"]);
				$this->db->execute();
				return $this->db->rowAffect();
			}
			else{
				return 0;
			}			
		}		
		else
		{
			return 0;
		}
	}

	public function ubahFasilitas($data)
	{		
		//insert kecuali id
		$this->db->query("SELECT COUNT(*) FROM ref_fasilitas WHERE nama_fasilitas = :nama AND tipe_fasilitas = :tipe AND id_kost = :idkost1");			
		$this->db->bind('nama',$data["namafasilitas"]);
		$this->db->bind('tipe',$data["tipe"]);
		$this->db->bind('idkost1',$data["idkost"]);
		$this->db->execute();
		$cek = $this->db->count();

		if($cek == 0)
		{
			$query = "UPDATE ref_fasilitas SET nama_fasilitas = :nama,
						tipe_fasilitas = :tipe
						WHERE id_fasilitas = :id";
			$this->db->query($query);
			// //binding	
			$this->db->bind('nama',$data["namafasilitas"]);				
			$this->db->bind('id',$data["id"]);
			$this->db->bind('tipe',$data["tipe"]);
			//execute query
			$this->db->execute();
			
			return $this->db->rowAffect();		
		}
		else
			return 0;
	}

	public function hapusFasilitas($idfasilitas)
	{
		$query = "DELETE FROM ref_fasilitas WHERE id_fasilitas = :id";
		$this->db->query($query);
		$this->db->bind('id',$idfasilitas);
		$this->db->execute();

		return $this->db->rowAffect();
	}

	public function cariFasilitas()
	{
		$keyword = $_POST["list"];
		$query = $keyword != "" ? "SELECT *,CASE WHEN tipe_fasilitas = 1 THEN 'Fasilitas Kamar' WHEN tipe_fasilitas = 2 THEN 'Fasilitas Kamar Mandi' WHEN tipe_fasilitas = 3 THEN 'Fasilitas Umum' ELSE 'Fasilitas Parkir' END AS Type FROM ref_fasilitas WHERE id_kost = :key  ORDER BY tipe_fasilitas" : "SELECT *,CASE WHEN tipe_fasilitas = 1 THEN 'Fasilitas Kamar' WHEN tipe_fasilitas = 2 THEN 'Fasilitas Kamar Mandi' WHEN tipe_fasilitas = 3 THEN 'Fasilitas Umum' ELSE 'Fasilitas Parkir' END AS Type FROM ref_fasilitas ORDER BY tipe_fasilitas";
		$this->db->query($query);
		$this->db->bind('key',$keyword);
		return $this->db->rs();
	}

}