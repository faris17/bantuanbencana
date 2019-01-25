<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class Petugas extends Resources\Controller
{
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting = new Libraries\Setting;
		$this->petugas = new Models\M_petugas;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['side_users'] = "active";
        $data['user'] = $this->user->getAll();

        $this->output('content/user', $data);
    }
	
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		if($this->request->post('save')=="Save"){
			
					$this->user->save();
					$this->session->setValue(array('success'=>'Data User Berhasil Disimpan.'));
			
			
		}
        $this->output('content/form/users', $data);
	}
	
	public function edit($id=null){
		$data['title'] = 'Edit Data';
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			
			$data['edit'] = "edit";
			$data['side_users'] = "active";
			if($this->request->post('update')=='Update'){ //kalau ada proses/klik update
					$id = $this->request->post('id');
					$this->user->update();
					$this->session->setValue(array('success'=>'Data Berhasil Diperbaharui'));
					$this->redirect('admin/users/edit/'.$id);
				}
			$data['settingUrl'] = $this->setting;
			$data['user']= $this->user->getId($id);
			$this->output('content/form/users',$data);
		}
		else {
			$data['settingUrl'] = $this->setting;
			$data['error']="Edit tidak bisa dilakukan karena masalah hak ases.";
			$this->output('content/form/users', $data);
		}
	}
	
	public function delete($id){
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$this->user->delete($id);
			$this->redirect('admin/users/index');
		}
		else {
			$this->redirect('admin/users/index');
		}
	}
	
	public function getnama(){
		$keyword = $this->request->post('term');
        $data['response'] = 'true'; 
        $query = $this->petugas->getnama($keyword); 
        if(!empty($query))
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
			   $data['message'][] = array( 
                                      'value' => $row->namapetugas);  
			 
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
