<?php 

/**
 * 
 */
class Kost_model
{
	private $table = 'ms_kost';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getKostAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->rs();
	}

	public function getKostbyId($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE sn=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahKost($data)
	{
		$tgljoin = date('Y-m-d');//tanggal join set today		
		//insert kecuali id
		$query = "INSERT INTO ms_kost(sn,nama_kost,status_kost,tgl_join,general,nama_pemilik,nokontak1,nokontak2) VALUES ('', :nama, 'A','$tgljoin',:tipe,:pemilik,:kontak1,:kontak2)";
		$this->db->query($query);
		// //binding
		$this->db->bind('nama',$data["nama"]);
		$this->db->bind('tipe',$data["tipe"]);
		$this->db->bind('pemilik',$data["namapemilik"]);
		$this->db->bind('kontak1',$data["nokontak1"]);		
		$this->db->bind('kontak2',$data["nokontak1"]);
		//execute query
		$this->db->execute();
		
		$datasn = $this->AutoID($data);

		$idkost = "KOST-". str_pad((int) $datasn["sn"], 4, "0", STR_PAD_LEFT);
		$this->db->query("UPDATE ms_kost SET id_kost = :idkost WHERE sn = '$datasn[sn]'");
		$this->db->bind('idkost',$idkost);
		$this->db->execute();

		// $data["sn"] = $this->db->single();
		return $this->db->rowAffect();		
	}

	public function AutoID($data)
	{
		$this->db->query('SELECT * FROM ms_kost ORDER BY sn DESC LIMIT 1');
		return $this->db->single();
	}

	public function hapusKost($id)
	{
		$this->db->query("SELECT COUNT(*) FROM ref_lokasi WHERE id_kost = (SELECT id_kost FROM ms_kost WHERE sn = :idkost1)");
		$this->db->bind('idkost1',$id);
		$this->db->execute();
		$cek = $this->db->count();		

		if($cek == 0)
		{
			$query = "DELETE FROM ms_kost WHERE sn = :sn";
			$this->db->query($query);
			$this->db->bind('sn',$id);
			$this->db->execute();

			return $this->db->rowAffect();
		}
		else
			return 0;
	}

	public function ubahKost($data)
	{
		$tgljoin = date('Y-m-d');//tanggal join set today		
		//insert kecuali id
		$query = "UPDATE ms_kost SET nama_kost = :nama,
					-- alamat_kost = :alamat,					
					general = :tipe,
					nama_pemilik = :pemilik,
					nokontak1 = :kontak1,
					nokontak2 = :kontak2
					WHERE id_kost = :id";
		$this->db->query($query);
		// //binding
		$this->db->bind('nama',$data["nama"]);
		// $this->db->bind('alamat',$data["alamat"]);		
		$this->db->bind('pemilik',$data["namapemilik"]);
		$this->db->bind('kontak1',$data["nokontak1"]);		
		$this->db->bind('kontak2',$data["nokontak1"]);
		$this->db->bind('tipe',$data["tipe"]);
		$this->db->bind('id',$data["id"]);
		//execute query
		$this->db->execute();
		
		return $this->db->rowAffect();		
	}

	public function cariKost()
	{
		$keyword = $_POST["keyword"];
		$this->db->query('SELECT * FROM ms_kost WHERE nama_kost LIKE :key ');
		$this->db->bind('key',"%$keyword%");
		return $this->db->rs();
	}
}
