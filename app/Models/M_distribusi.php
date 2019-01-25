<?php 
	
namespace Models;
use Resources;

class M_distribusi {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		
		$this->request = new Resources\Request;
		$this->tb = "distribusi"; //nama tabel database
    }
  
	public function getAll(){
		$results = $this->db->select()->from('kebutuhanmendesak', 'biodata')->where('biodata.idbiodata', '=', 'kebutuhanmendesak.biodata_idbiodata')->getAll();
        return $results;
	}
	
	public function save($nama, $id){
		$tanggal = date('Y-m-d',strtotime($this->request->post('tanggal')));
		$namapenerimabantuan = $this->request->post('namalengkap');
		$kebutuhanmendesak = $this->request->post('kebutuhanmendesak');
		$keterangan = $this->request->post('keterangan');
		
		for($i =1; $i <=3 ; $i++){
		if($this->request->post('bantuan_'.$i) !=""){
			
			$bantuan = $this->request->post('bantuan_'.$i);
			$jumlahdistribusi = $this->request->post('jumlahdistribusi'.$i);
			
			//mencari idbantuan
			$query = $this->db->select('idbantuan')->from('bantuan')->where('namabantuan','=',"$bantuan")->getOne();
			$bantuan = $query->idbantuan;
					
		
			$data = array('tanggaldistribusi'=>$tanggal,
			  'nama_petugas'=>$nama,
			  'kebutuhanmendesak'=>$kebutuhanmendesak,
			  'bantuan_idbantuan'=>$bantuan,
			  'keterangan'=>$keterangan,
			  'jumlahdidistribusi'=>$jumlahdistribusi,
			  'namapenerimabantuan'=>$namapenerimabantuan);
			 
			$this->db->insert('distribusi',$data);
		  }
		}
	}
	
	
}