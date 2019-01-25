<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class Distribusi extends Resources\Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting    = new Libraries\Setting;
		$this->distribusi = new Models\M_distribusi;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['distribusi'] = $this->distribusi->getAll();
		$this->output('content/distribusi', $data);
    }
	
	
	
	public function upload(){
		$data['settingUrl'] = $this->setting;
		$this->output('content/upload', $data);
	}
	
	public function prosesupload(){
		if($_POST['image_form_submit'] == 1)
		{
			$images_arr = array();
			foreach($_FILES['images']['name'] as $key=>$val){
				$image_name = $_FILES['images']['name'][$key];
				$tmp_name 	= $_FILES['images']['tmp_name'][$key];
				$size 		= $_FILES['images']['size'][$key];
				$type 		= $_FILES['images']['type'][$key];
				$error 		= $_FILES['images']['error'][$key];
				
				############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
				
				$target_dir = "F:/xampp/htdocs/bantuan/uploaddistribusi/";
				$target_file = $target_dir.$_FILES['images']['name'][$key];
				if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
					$images_arr[] = $target_file;
				}
			
			}
			
			echo $image_name;
		}
	}
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		if($this->request->post('save')=="Save"){
			$nama = $this->session->getValue('nama');
			$id = $this->session->getValue('id');
			$this->distribusi->save($nama, $id);
			$this->session->setValue(array('success'=>'Data Berhasil Disimpan.'));
		}
        $this->output('content/form/distribusi',$data);
		
	}
	
	
}
