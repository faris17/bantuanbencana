<?php 
	
namespace Models;
use Resources;

class M_user {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		$this->request = new Resources\Request;
		$this->tb = "users"; //nama tabel database
    }
    public function login($user,$pw){
    	$query = $this->db->results("select * from ".$this->tb." where username='".$user."' and password='".$pw."'"); //query cek ke table admin
		
		return $query[0];
	}
	public function getAll(){
		$results = $this->db->select()->from($this->tb)->getAll();
        return $results;
	}
	
	public function save(){
		
		$username = $this->request->post('username');
		$password = $this->request->post('password');
		$level = $this->request->post('level');
		
		$data = array("username"=>$username,
					  "password"=>md5($password),
					  "level"=>$level);
		
		$this->db->insert("users",$data);
	}
	
	public function getId($id){ //fungsi mendapatkan ID obat, digunakan untuk mengedit.
		$query = $this->db->select()->from($this->tb)->where('idusers','=',"$id")->getOne();
		return $query;
	}
	
	public function update(){
		$id = $this->request->post('id');
		$username = $this->request->post('username');
		$password = $this->request->post('password');
		
		$level = $this->request->post('level');
		
		
		//kalau ada password baru maka
		if($password != "" ){
			$password= md5($password);
			$data["password"] = $password;
		}
		$level = $this->request->post('level');
		$data["username"]=$username;
		$data["level"]=$level;
		
		$id = array("idusers"=>$id);
		
		$this->db->update($this->tb,$data,$id);
	}
	
	public function delete($id){
		$this->db->delete($this->tb, array('idusers' => $id));
		$this->session->setValue(array('success'=>'Berhasil Delete'));
	}
}