<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class Instansi extends Resources\Controller
{
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting = new Libraries\Setting;
		$this->instansi = new Models\M_instansi;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['instansi'] = $this->instansi->getAll();

        $this->output('content/instansi', $data);
    }
	
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		if($this->request->post('save')=="Save"){
			$this->instansi->save();
			$this->session->setValue(array('success'=>'Data Berhasil Disimpan.'));
		}
        $this->output('content/form/instansi', $data);
	}
	
	public function edit($id=null){
		$data['title'] = 'Edit Data';
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			
			$data['edit'] = "edit";
			if($this->request->post('update')=='Update'){ //kalau ada proses/klik update
					$id = $this->request->post('id');
					$this->instansi->update();
					$this->session->setValue(array('success'=>'Data Berhasil Diperbaharui'));
					$this->redirect('admin/instansi/edit/'.$id);
			}
			$data['settingUrl'] = $this->setting;
			$data['row']= $this->instansi->getId($id);
			$this->output('content/form/instansi',$data);
		}
		else {
			$data['settingUrl'] = $this->setting;
			$data['error']="Edit tidak bisa dilakukan karena masalah hak ases.";
			$this->output('content/form/instansi', $data);
		}
	}
	
	public function delete($id){
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$this->instansi->delete($id);
			$this->redirect('admin/instansi/index');
		}
		else {
			$this->redirect('admin/instansi/index');
		}
	}
}
