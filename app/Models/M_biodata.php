<?php 
	
namespace Models;
use Resources;

class M_biodata {
    public function __construct(){
		// DB koneksi default
		$this->db = new Resources\Database;
		$this->request = new Resources\Request;
		$this->tb = "biodata"; //nama tabel database
    }
  
	public function getAll(){
		$results = $this->db->select()->from($this->tb)->getAll();
        return $results;
	}
	
	public function save(){
		//mengambil data dari input html
		$nama = $this->request->post('nama');
		$tempatlahir = $this->request->post('tempatlahir');
		$tanggallahir = date('Y-m-d',strtotime($this->request->post('tanggallahir')));
		$status = $this->request->post('status');
		$jk = $this->request->post('jk');
		$jumlahkeluarga = $this->request->post('jumlahkeluarga');
		$keterangan = $this->request->post('keterangan');
		
		if(isset($_FILES["file"]["type"])) {
			
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
			) && ($_FILES["file"]["size"] < 900000) //Approx. 100kb files can be uploaded. for validation
				 && in_array($file_extension, $validextensions)) {
				if ($_FILES["file"]["error"] > 0) {
					echo "Return Code: " . $_FILES["file"]["error"] . "";
				} 
				else {
					if (file_exists("../upload/" . $_FILES["file"]["name"])) {
						 $_FILES["file"]["name"] . " already exists. ";
						 return false;
					} 
					else {
						$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = "../upload/" . $_FILES['file']['name']; // Target path where file is to be stored
						move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file				
						// replace $host,$username,$password,$dbname with real info
						
						//insert ke database	
						//proses menyimpan data ke database.
						$data = array("namalengkap"	=>$nama,
									  "tempatlahir"	=>$tempatlahir,
									  "tanggallahir"	=>$tanggallahir,
									  "status"		=>$status,
									  "jk" 		=>$jk,
									  "jumlahkeluarga"=>$jumlahkeluarga,
									  'foto'=>$_FILES['file']['name'],
									  "keterangan"=>$keterangan);
						
						$this->db->insert($this->tb,$data);		  
						return true;
					}
				}
		}
		} else {
				
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("namalengkap"	=>$nama,
					  "tempatlahir"	=>$tempatlahir,
					  "tanggallahir"	=>$tanggallahir,
					  "status"		=>$status,
					  "jk" 		=>$jk,
					  "jumlahkeluarga"=>$jumlahkeluarga,
					  "keterangan"=>$keterangan);
				$this->db->insert($this->tb,$data);
				return true;
		}
		
		
	}
	
	public function getnama($id){ 
		$query = $this->db->results("SELECT * FROM biodata where namalengkap like '%$id%' ");
		return $query;
	}
	
	public function getId($id){ 
		$query = $this->db->select()->from($this->tb)->where('idbiodata','=',"$id")->getOne();
		return $query;
	}
	
	public function update(){
		$id = $this->request->post('id');
		//mengambil data dari input html
		$nama = $this->request->post('nama');
		$tempatlahir = $this->request->post('tempatlahir');
		$tanggallahir = $this->request->post('tanggallahir');
		$status = $this->request->post('status');
		$jk = $this->request->post('jk');
		$jumlahkeluarga = $this->request->post('jumlahkeluarga');
		$keterangan = $this->request->post('keterangan');
		
		
		//proses menyimpan data ke database.
		$data = array("namalengkap"	=>$nama,
					  "tempatlahir"	=>$tempatlahir,
					  "tanggallahir"	=>$tanggallahir,
					  "status"		=>$status,
					  "jk" 		=>$jk,
					  "jumlahkeluarga"=>$jumlahkeluarga,
					  "keterangan"=>$keterangan);
		
		$id = array("idbiodata"=>$id);
		
		if(isset($_FILES["file"]["type"])) {
			
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
			) && ($_FILES["file"]["size"] < 900000) //Approx. 100kb files can be uploaded. for validation
				 && in_array($file_extension, $validextensions)) {
				if ($_FILES["file"]["error"] > 0) {
					echo "Return Code: " . $_FILES["file"]["error"] . "";
				} 
				else {
					if (file_exists("../upload/" . $_FILES["file"]["name"])) {
						 $_FILES["file"]["name"] . " already exists. ";
						 return false;
					} 
					else {
						$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = "../upload/" . $_FILES['file']['name']; // Target path where file is to be stored
						move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file				
						// replace $host,$username,$password,$dbname with real info
						
						//insert ke database	
						//proses menyimpan data ke database.
						$data = array("namalengkap"	=>$nama,
									  "tempatlahir"	=>$tempatlahir,
									  "tanggallahir"	=>$tanggallahir,
									  "status"		=>$status,
									  "jk" 		=>$jk,
									  "jumlahkeluarga"=>$jumlahkeluarga,
									  'foto'=>$_FILES['file']['name'],
									  "keterangan"=>$keterangan);
						
					}
				}
		}
		} else {
				
			//insert ke database	
			//proses menyimpan data ke database.
			$data = array("namalengkap"	=>$nama,
					  "tempatlahir"	=>$tempatlahir,
					  "tanggallahir"	=>$tanggallahir,
					  "status"		=>$status,
					  "jk" 		=>$jk,
					  "jumlahkeluarga"=>$jumlahkeluarga,
					  "keterangan"=>$keterangan);
		}
		
		$this->db->update($this->tb,$data,$id);
	}
	
	public function delete($id){
		$id = array("idbiodata"=>$id);
		$this->db->delete($this->tb, $id);
		$this->session->setValue(array('success'=>'Berhasil Delete'));
	}
}