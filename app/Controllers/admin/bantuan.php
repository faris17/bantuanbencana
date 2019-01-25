<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class bantuan extends Resources\Controller
{
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting = new Libraries\Setting;
		$this->bantuan = new Models\M_bantuan;
		$this->instansi = new Models\M_instansi;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['bantuan'] = $this->bantuan->getAll();

        $this->output('content/bantuan', $data);
    }
	
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		$data['instansi'] = $this->instansi->getAll();
		if($this->request->post('save')=="Save"){
			$this->bantuan->save();
			$this->session->setValue(array('success'=>'Data Berhasil Disimpan.'));
		}
        $this->output('content/form/bantuan', $data);
	}
	
	public function edit($id=null){
		$data['title'] = 'Edit Data';
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$data['instansi'] = $this->instansi->getAll();
			$data['edit'] = "edit";
			if($this->request->post('update')=='Update'){ //kalau ada proses/klik update
					$id = $this->request->post('id');
					$this->bantuan->update();
					$this->session->setValue(array('success'=>'Data Berhasil Diperbaharui'));
					$this->redirect('admin/bantuan/edit/'.$id);
			}
			$data['settingUrl'] = $this->setting;
			$data['row']= $this->bantuan->getId($id);
			$this->output('content/form/bantuan',$data);
		}
		else {
			$data['settingUrl'] = $this->setting;
			$data['error']="Edit tidak bisa dilakukan karena masalah hak ases.";
			$this->output('content/form/bantuan', $data);
		}
	}
	
	public function delete($id){
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$this->bantuan->delete($id);
			
			$this->session->setValue(array('success'=>'Berhasil Delete'));
			$this->redirect('admin/bantuan/index');
		}
		else {
			
		$this->session->setValue(array('error'=>'Gagal Delete'));
			$this->redirect('admin/bantuan/index');
		}
	}
	
	public function getnama(){
		$keyword = $this->request->post('term');
        $data['response'] = 'true'; 
        $query = $this->bantuan->getnama($keyword); 
        if(!empty($query))
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
			   $data['message'][] = array( 
                                      'value' => $row->namabantuan);  
			 
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); 
            
        }
        else
        {
            $this->load->view('index');
        }
	}
}
