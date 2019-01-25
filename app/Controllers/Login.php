<?php
namespace Controllers;
use Resources, Models, Libraries;

class Login extends Resources\Controller
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
        $data['title'] = 'Hello world!';
		$data['nama'] = "FARIS";
        $this->output('login', $data);
    }
	
	public function proses(){
		//memanggil file content yang terdapat di folder views/content
		if($_POST['login']){
			//mengambil nilai dari variable username & password
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			
			//mengirim ke model user, fungsi login dengan 2 parameter
			//$username dan $password
			//kemudian di simpan di variable $user
			$user = $this->user->login($username, $password);
			
			//bila variable user sukses, user terdaftar
			if($user){
				//bila user dan password benar simpan nilai ke dalam session
				$data = array('isLogin'=>true,
				'nama'=>$user->username,
				'id'=>$user->idusers,
				'level'=>$user->level);
				
				//menyimpan session menggunakan setvalue
				$this->session->setValue($data); 
				
				//arahkan atau redirect ke controller home dan function dashboard
				$this->redirect('home');
			}
			
			else{
				$this->redirect('home');
			}
		}
	}
	
	public function edit(){
		$data['title'] = 'Halaman Edit';
		$this->output('content/form/edit', $data);
	}
}