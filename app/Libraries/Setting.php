<?php
namespace Libraries;
use Resources;

class Setting {
	
	public function __construct(){
		$this->folder = "http://localhost/bantuan/public/";
	}
    
   public function siteUrl($uri){
	   // contoh siteUrl = localhost/bantuan/index.php/
	   
	   $alamat = $this->folder.'index.php/'.$uri;
	   return $alamat;
   }
   
   public function baseUrl(){
	   // contoh baseUrl = localhost/bantuan/

		return $this->folder ;
   }

}
?>


