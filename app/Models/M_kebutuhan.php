<?php 
	
namespace Models;
use Resources;

class M_kebutuhan {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		$this->request = new Resources\Request;
		$this->tb = "kebutuhanmendesak"; //nama tabel database
    }
  
	public function getAll(){
		$results = $this->db->select()->from('kebutuhanmendesak', 'biodata')->where('biodata.idbiodata', '=', 'kebutuhanmendesak.biodata_idbiodata')->getAll();
        return $results;
	}
	
	public function getnama($id){ 
		$query = $this->db->results("SELECT namakebutuhan FROM kebutuhanmendesak where namakebutuhan like '%$id%' ");
		return $query;
	}
	
	
	public function save(){
		//mengambil data dari input html
		$namakebutuhan = $this->request->post('namakebutuhan');
		$terpenuhi = $this->request->post('terpenuhi');
		$tanggalterbantunya = date('Y-m-d',strtotime($this->request->post('tanggalterbantunya')));
		$namakeluarga = $this->request->post('namakeluarga');
		//MENCARI ID KELUARGA
		$query = $this->db->select('idbiodata')->from('biodata')->where('namalengkap','=',"$namakeluarga")->getOne();
		$idbiodata = $query->idbiodata;
		$keterangan = $this->request->post('keterangan');
		
		$data = array('namakebutuhan'=>$namakebutuhan,
					  'terpenuhi'=>$terpenuhi,
					  'tanggalterbantunya'=>$tanggalterbantunya,
					  'biodata_idbiodata'=>$idbiodata,
					  'keterangan'=>$keterangan);
		$this->db->insert($this->tb,$data);
		
	}
	
	public function getId($id){ 
		$query = $this->db->select()->from($this->tb, 'biodata')->where('idkebutuhanmendesak','=',"$id",'and')->where('biodata.idbiodata', '=', 'kebutuhanmendesak.biodata_idbiodata')->getOne();
		return $query;
	}
	
	public function update(){
		$id = $this->request->post('id');
		$namakebutuhan = $this->request->post('namakebutuhan');
		$terpenuhi = $this->request->post('terpenuhi');
		$tanggalterbantunya = date('Y-m-d',strtotime($this->request->post('tanggalterbantunya')));
		$namakeluarga = $this->request->post('namakeluarga');
		//MENCARI ID KELUARGA
		$query = $this->db->select('idbiodata')->from('biodata')->where('namalengkap','=',"$namakeluarga")->getOne();
		$idbiodata = $query->idbiodata;
		$keterangan = $this->request->post('keterangan');
		
		$data = array('namakebutuhan'=>$namakebutuhan,
					  'terpenuhi'=>$terpenuhi,
					  'tanggalterbantunya'=>$tanggalterbantunya,
					  'biodata_idbiodata'=>$idbiodata,
					  'keterangan'=>$keterangan);
	
		$id = array("idkebutuhanmendesak"=>$id);
		
		
		$this->db->update($this->tb,$data,$id);
	}
	
	public function delete($id){
		$id = array("idkebutuhanmendesak"=>$id);
		$this->db->delete($this->tb, $id);
		$this->session->setValue(array('success'=>'Berhasil Delete'));
	}
}