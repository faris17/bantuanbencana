<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class kebutuhan extends Resources\Controller
{
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting = new Libraries\Setting;
		$this->kebutuhan = new Models\M_kebutuhan;
		$this->instansi = new Models\M_instansi;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['kebutuhan'] = $this->kebutuhan->getAll();

        $this->output('content/kebutuhan', $data);
    }
	
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		$data['instansi'] = $this->instansi->getAll();
		if($this->request->post('save')=="Save"){
			$this->kebutuhan->save();
			$this->session->setValue(array('success'=>'Data Berhasil Disimpan.'));
		}
        $this->output('content/form/kebutuhan', $data);
	}
	
	public function edit($id=null){
		$data['title'] = 'Edit Data';
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$data['instansi'] = $this->instansi->getAll();
			$data['edit'] = "edit";
			if($this->request->post('update')=='Update'){ //kalau ada proses/klik update
					$id = $this->request->post('id');
					$this->kebutuhan->update();
					$this->session->setValue(array('success'=>'Data Berhasil Diperbaharui'));
					$this->redirect('admin/kebutuhan/edit/'.$id);
			}
			$data['settingUrl'] = $this->setting;
			$data['row']= $this->kebutuhan->getId($id);
			$this->output('content/form/kebutuhan',$data);
		}
		else {
			$data['settingUrl'] = $this->setting;
			$data['error']="Edit tidak bisa dilakukan karena masalah hak ases.";
			$this->output('content/form/kebutuhan', $data);
		}
	}
	
	public function delete($id){
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$this->kebutuhan->delete($id);
			$this->redirect('admin/kebutuhan/index');
		}
		else {
			$this->redirect('admin/kebutuhan/index');
		}
	}
	
	public function getnama(){
		$keyword = $this->request->post('term');
        $data['response'] = 'true'; 
        $query = $this->kebutuhan->getnama($keyword); 
        if(!empty($query))
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
			   $data['message'][] = array( 
                                      'value' => $row->namakebutuhan);  
			 
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
