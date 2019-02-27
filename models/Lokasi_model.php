<?php 
/**
 * 
 */
class Lokasi_model
{
	
	private $table = 'ref_lokasi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getLokasiAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->rs();
	}

	public function getLokasibyId($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE sn=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getLokasibyKost($idKost)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kost=:id');
		$this->db->bind('id',$idKost);
		return $this->db->rs();
	}

	public function tambahlokasi($data)
	{
		if($data["namakost"] != "0")
		{			
			$this->db->query("SELECT COUNT(*) FROM ref_lokasi WHERE id_lokasi = :id1 AND id_kost = :idkost1");			
			$this->db->bind('id1',$data["idlokasi"]);
			$this->db->bind('idkost1',$data["namakost"]);
			$this->db->execute();
			$cek = $this->db->count();
	
			$fasilitaskamar = "";
			$fasilitaskamarmandi = "";
			$fasilitasparkir = "";
			$fasilitasumum = "";
			$akseslingkungan = "";

			//CEK DULU APAKAH TERCEKLIS SALAH SATU ATAU NGGA SAMA SEKALI
			if(isset($_POST["fasilitaskamar"]))
			{
				// KALO TERCEKLIS, LOOPING
				foreach ($_POST["fasilitaskamar"] as $val) {
					$fasilitaskamar .= $val.';';
				}
			}

			if(isset($_POST["fasilitaskamarmandi"]))
			{
				foreach ($_POST["fasilitaskamarmandi"] as $val) {
					$fasilitaskamarmandi .= $val.';';
				}
			}

			if(isset($_POST["fasilitasparkir"]))
			{
				foreach ($_POST["fasilitasparkir"] as $val) {
					$fasilitasparkir .= $val.';';
				}
			}

			if(isset($_POST["fasilitasumum"]))
			{
				foreach ($_POST["fasilitasumum"] as $val) {
					$fasilitasumum .= $val.';';
				}
			}

			if(isset($_POST["akses"]))
			{
				foreach ($_POST["akses"] as $val) {
					$akseslingkungan .= $val.';';
				}
			}

			if($cek == 0)
			{			

				$this->db->query("INSERT INTO ref_lokasi VALUES ('',:idlokasi,:namalokasi,:idkost,:ukuran,:harga,:faskamar,:fasmandi,:fasparkir,:fasumum,:akses,:keterangan)");
				$this->db->bind('idlokasi',$data["idlokasi"]);
				$this->db->bind('namalokasi',$data["namalokasi"]);
				$this->db->bind('idkost',$data["namakost"]);
				$this->db->bind('ukuran',$data["ukurankamar"]);
				$this->db->bind('harga',$data["hargasewa"]);
				$this->db->bind('keterangan',$data["keterangan"]);
				$this->db->bind('faskamar',rtrim($fasilitaskamar,';'));
				$this->db->bind('fasmandi',rtrim($fasilitaskamarmandi,';'));
				$this->db->bind('fasparkir',rtrim($fasilitasparkir,';'));
				$this->db->bind('fasumum',rtrim($fasilitasumum,';'));
				$this->db->bind('akses',rtrim($akseslingkungan,';'));
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

	public function ubahLokasi($data)
	{		
			$fasilitaskamar = "";
			$fasilitaskamarmandi = "";
			$fasilitasparkir = "";
			$fasilitasumum = "";
			$akseslingkungan = "";

			//CEK DULU APAKAH TERCEKLIS SALAH SATU ATAU NGGA SAMA SEKALI
			if(isset($_POST["fasilitaskamar"]))
			{
				// KALO TERCEKLIS, LOOPING
				foreach ($_POST["fasilitaskamar"] as $val) {
					$fasilitaskamar .= $val.';';
				}
			}

			if(isset($_POST["fasilitaskamarmandi"]))
			{
				foreach ($_POST["fasilitaskamarmandi"] as $val) {
					$fasilitaskamarmandi .= $val.';';
				}
			}

			if(isset($_POST["fasilitasparkir"]))
			{
				foreach ($_POST["fasilitasparkir"] as $val) {
					$fasilitasparkir .= $val.';';
				}
			}

			if(isset($_POST["fasilitasumum"]))
			{
				foreach ($_POST["fasilitasumum"] as $val) {
					$fasilitasumum .= $val.';';
				}
			}

			if(isset($_POST["akses"]))
			{
				foreach ($_POST["akses"] as $val) {
					$akseslingkungan .= $val.';';
				}
			}

		//insert kecuali id
		$query = "UPDATE ref_lokasi SET nama_lokasi = :namalokasi,
					ukuran_kamar = :ukuran,
					harga = :harga,
					keteranganlainnya = :keterangan,
					fasilitas_kamar	= :faskamar,
					fasilitas_kmrmandi = :fasmandi,
					fasilitas_parkir = :fasparkir,
					fasilitas_umum = :fasumum,
					akses_lingkungan = :akses
					WHERE id_lokasi = :id";
		$this->db->query($query);
		// //binding	
		$this->db->bind('namalokasi',$data["namalokasi"]);				
		$this->db->bind('id',$data["id"]);
		$this->db->bind('ukuran',$data["ukurankamar"]);
		$this->db->bind('harga',$data["hargasewa"]);
		$this->db->bind('keterangan',$data["keterangan"]);
		$this->db->bind('faskamar',rtrim($fasilitaskamar,';'));
		$this->db->bind('fasmandi',rtrim($fasilitaskamarmandi,';'));
		$this->db->bind('fasparkir',rtrim($fasilitasparkir,';'));
		$this->db->bind('fasumum',rtrim($fasilitasumum,';'));
		$this->db->bind('akses',rtrim($akseslingkungan,';'));
		//execute query
		$this->db->execute();
		
		return $this->db->rowAffect();		
	}

	public function hapusLokasi($id,$idlokasi,$idkost)
	{
		$this->db->query("SELECT COUNT(*) FROM ms_unit WHERE id_lokasi = :id1 AND id_kost = :idkost1");			
		$this->db->bind('id1',$idlokasi);
		$this->db->bind('idkost1',$idkost);
		$this->db->execute();
		$cek = $this->db->count();		

		if($cek == 0)
		{
			$query = "DELETE FROM ref_lokasi WHERE sn = :sn";
			$this->db->query($query);
			$this->db->bind('sn',$id);
			$this->db->execute();

			return $this->db->rowAffect();
		}
		else
			return 0;		
	}

	public function cariLokasi()
	{
		$keyword = $_POST["list"];
		$query = $keyword != "" ? "SELECT * FROM ref_lokasi WHERE id_kost = :key" : "SELECT * FROM ref_lokasi";
		$this->db->query($query);
		$this->db->bind('key',$keyword);
		return $this->db->rs();
	}

}