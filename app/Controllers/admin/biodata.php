<?php
namespace Controllers\Admin;
use Resources, Models, Libraries;

class Biodata extends Resources\Controller
{
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;
		$this->setting = new Libraries\Setting;
		$this->biodata = new Models\M_biodata;
                if($this->session->getValue('level')!= 'admin'){
                 $this->redirect('login');
              }
		
	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $data['biodata'] = $this->biodata->getAll();

        $this->output('content/biodata', $data);
    }
	
	public function add(){
		$data['title'] = 'Tambah Data';
		$data['settingUrl'] = $this->setting;
		$data['side_users'] = "active";
		if($this->request->post('save')=="Save"){
			$this->biodata->save();
			$this->session->setValue(array('success'=>'Data Berhasil Disimpan.'));
		}
        $this->output('content/form/biodata', $data);
	}
	
	public function edit($id=null){
		$data['title'] = 'Edit Data';
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			
			$data['edit'] = "edit";
			if($this->request->post('update')=='Update'){ //kalau ada proses/klik update
					$id = $this->request->post('id');
					$this->biodata->update();
					$this->session->setValue(array('success'=>'Data Berhasil Diperbaharui'));
					$this->redirect('admin/biodata/edit/'.$id);
			}
			$data['settingUrl'] = $this->setting;
			$data['row']= $this->biodata->getId($id);
			$this->output('content/form/biodata',$data);
		}
		else {
			$data['settingUrl'] = $this->setting;
			$data['error']="Edit tidak bisa dilakukan karena masalah hak ases.";
			$this->output('content/form/biodata', $data);
		}
	}
	
	public function getnama(){
		$keyword = $this->request->post('term');
        $data['response'] = 'true'; 
        $query = $this->biodata->getnama($keyword); 
        if(!empty($query))
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
			   $data['message'][] = array( 
                                      'value' => $row->namalengkap);  
			 
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
	
	public function delete($id){
		if($this->session->getValue('level')=='admin' OR $this->session->getValue('id')==$id){
			$this->biodata->delete($id);
			$this->redirect('admin/biodata/index');
		}
		else {
			$this->redirect('admin/biodata/index');
		}
	}
}
