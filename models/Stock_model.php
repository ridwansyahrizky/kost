<?php 

/**
 * 
 */
class Stock_model
{

	private $table = 'ms_unit';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getStockAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->rs();
	}

	public function getStockbyId($id)
	{
		$this->db->query('SELECT *,(SELECT nama_lokasi FROM ref_lokasi WHERE id_lokasi = '.$this->table.'.id_lokasi) AS NamaLokasi FROM ' . $this->table . ' WHERE sn=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getStockbyKostLokasi($idkost,$idlokasi)
	{
		$strLokasi = $idlokasi != "" && $idlokasi != "0" ? "AND id_lokasi=:idlokasi " : "";
		$strKost = $idkost != "" ? "AND id_kost=:idkost " : "";

		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE 1=1 ' .$strLokasi . $strKost);
		if($strLokasi != "")
			$this->db->bind('idlokasi',$idlokasi);

		if($strKost != "")
			$this->db->bind('idkost',$idkost);

		return $this->db->rs();				
	}

	public function filterLokasibyKost($id)
	{
		$this->db->query('SELECT * FROM ref_lokasi WHERE id_kost=:id');
		$this->db->bind('id',$id);
		return $this->db->rs();
	}
	
	public function tambahStock($data)
	{
		if($data["namakost"] != "0" && $data["namalokasi"] != "0")
		{
			// Get Harga dr Lokasi Yang dipilih
			$this->db->query("SELECT * FROM ref_lokasi WHERE id_lokasi = :idlokasi AND id_kost = :idkost");
			$this->db->bind('idlokasi',$data["namalokasi"]);
			$this->db->bind('idkost',$data["namakost"]);
			$result = $this->db->single();

			$idunit = $data["namalokasi"].'-'.$data["nostock"];
			$pricelist = $result["harga"];
			$this->db->query("INSERT INTO ms_unit VALUES ('',:idunit,:idlokasi,:idkost,:nostock,:pricelist,'A')");
			$this->db->bind('idunit',$idunit);			
			$this->db->bind('idlokasi',$data["namalokasi"]);
			$this->db->bind('idkost',$data["namakost"]);
			$this->db->bind('nostock',$data["nostock"]);
			$this->db->bind('pricelist',$pricelist);
			$this->db->execute();
			return $this->db->rowAffect();
		}		
		else
		{
			return 0;
		}
	}

	public function ubahStock($data)
	{		
		//insert kecuali id
		$query = "UPDATE ms_unit SET no_stock = :noStock, pricelist = :harga, id_lokasi = :idlokasi,id_kost = :idkost
					WHERE sn = :id";
		$this->db->query($query);
		// //binding	
		$this->db->bind('noStock',$data["nostock"]);				
		$this->db->bind('harga',$data["pricelist"]);				
		$this->db->bind('idlokasi',$data["namalokasi"]);				
		$this->db->bind('idkost',$data["namakost"]);				
		$this->db->bind('id',$data["id"]);
		//execute query
		$this->db->execute();
		
		return $this->db->rowAffect();				
	}

	public function hapusStock($id)
	{
		$this->db->query("SELECT COUNT(*) FROM ms_sewa WHERE sn_unit = :id");
		$this->db->bind('id',$id);		
		$this->db->execute();
		$cek = $this->db->count();		

		if($cek == 0)
		{
			$query = "DELETE FROM ms_unit WHERE sn = :id";
			$this->db->query($query);
			$this->db->bind('id',$id);
			$this->db->execute();

			return $this->db->rowAffect();
		}
		else
			return 0;		
	}

}