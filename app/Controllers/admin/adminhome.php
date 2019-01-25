<?php
namespace Controllers\admin;
use Resources, Models, Libraries;

class Adminhome extends Resources\Controller
{
	//fungsi yang berjalan saat controler home sdh dipanggil
	public function __construct(){
		parent::__construct();
		$this->session = new Resources\Session();
		$this->request = new Resources\Request; 
		$this->setting = new Libraries\Setting;
		$this->user = new Models\M_user;
 	}
	
    public function index()
    {
		$data['settingUrl'] = $this->setting;
        $this->output('content/home', $data);
    }
	
	
}