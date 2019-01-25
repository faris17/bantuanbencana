<?php
namespace Controllers;
use Resources, Models, Libraries;

class Home extends Resources\Controller
{
	//fungsi yang berjalan saat controler home sdh dipanggil
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request; 
		$this->setting = new Libraries\Setting;
 	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
		$data['title'] = "Sistem Informasi";
        $this->output('content/home', $data);
    }
	
	public function logout(){
		$this->session->destroy();
		$this->redirect('login');
	}
}