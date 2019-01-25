<?php 
	
namespace Models;
use Resources;

class M_instansi {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		$this->request = new Resources\Request;
		$this->tb = "instansi"; //nama tabel database
    }
  
	public function getAll(){
		$results = $this->db->select()->from($this->tb)->getAll();
        return $results;
	}
	
	public function save(){
		//mengambil data dari input html
		$nama = $this->request->post('namainstansi');
		$alamat = $this->request->post('alamatinstansi');
		
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("namainstansi"	=>$nama,
					  "alamatinstansi"	=>$alamat);
			
			$this->db->insert($this->tb,$data);
	}
	
	public function getId($id){ 
		$query = $this->db->select()->from($this->tb)->where('idinstansi','=',"$id")->getOne();
		return $query;
	}
	
	public function update(){
		$id = $this->request->post('idinstansi');
		//mengambil data dari input html
		$nama = $this->request->post('namainstansi');
		$alamat = $this->request->post('alamatinstansi');
		
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("namainstansi"	=>$nama,
					  "alamatinstansi"	=>$alamat);
		
		$id = array("idinstansi"=>$id);
		
		$this->db->update($this->tb,$data,$id);
	}
	
	public function delete($id){
		$id = array("idinstansi"=>$id);
		$this->db->delete($this->tb, $id);
		$this->session->setValue(array('success'=>'Berhasil Delete'));
	}
}