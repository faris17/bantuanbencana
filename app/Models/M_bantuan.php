<?php 
	
namespace Models;
use Resources;

class M_bantuan {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		$this->request = new Resources\Request;
		$this->tb = "bantuan"; //nama tabel database
    }
  
	public function getAll(){
		$results = $this->db->select()->from('bantuan', 'instansi')->where('instansi.idinstansi', '=', 'bantuan.instansi_idinstansi')->getAll();
        return $results;
	}
	
	public function save(){
		//mengambil data dari input html
		$kode = $this->request->post('kode');
		$namabantuan = $this->request->post('namabantuan');
		$tanggalbantuan = date('Y-m-d',strtotime($this->request->post('tanggalbantuan')));
		$keterangan = $this->request->post('keterangan');
		$instansi = $this->request->post('instansi');
		$jumlahbantuan = $this->request->post('jumlahbantuan');
		$satuan = $this->request->post('satuan');
		
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("kodebantuan"	=>$kode,
					  "namabantuan"	=>$namabantuan,
					  "tanggalbantuan"	=>$tanggalbantuan,
					  "keterangan"		=>$keterangan,
					  "instansi_idinstansi" 		=>$instansi,
					  "jumlahbantuan" 		=>$jumlahbantuan,
					  "satuan" 		=>$satuan,
					  "stok" =>$jumlahbantuan);
			
			$this->db->insert($this->tb,$data);
	}
	
	public function getId($id){ 
		$query = $this->db->select()->from($this->tb)->where('idbantuan','=',"$id")->getOne();
		return $query;
	}
	
	public function update(){
		$id = $this->request->post('id');
		//mengambil data dari input html
		$kode = $this->request->post('kode');
		$namabantuan = $this->request->post('namabantuan');
		$tanggalbantuan = date('Y-m-d',strtotime($this->request->post('tanggalbantuan')));
		$keterangan = $this->request->post('keterangan');
		$instansi = $this->request->post('instansi');
		
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("kodebantuan"	=>$kode,
					  "namabantuan"	=>$namabantuan,
					  "tanggalbantuan"	=>$tanggalbantuan,
					  "keterangan"		=>$keterangan,
					  "instansi_idinstansi"=>$instansi);
		$id = array("idbantuan"=>$id);
		
		$this->db->update($this->tb,$data,$id);
	}
	
	public function delete($id){
		$id = array("idbantuan"=>$id);
		$this->db->delete($this->tb, $id);
	}
	
	public function getnama($id){ 
		$query = $this->db->results("SELECT namabantuan FROM bantuan where namabantuan like '%$id%' ");
		return $query;
	}
}