<?php  

	class School{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getAll(){ 
			$this->db->query('SELECT * FROM escuela');  
			$result   = $this->db->getRecords();
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->escuela_id] = $value->escuela_desc;
			} 
			return $response;
		} 
	}
 ?>
