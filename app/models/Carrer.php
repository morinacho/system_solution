<?php  

	class Carrer{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getAll(){ 
			$this->db->query('SELECT * FROM carrera');  
			$result   = $this->db->getRecords();
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->carrera_id] = $value->carrera_desc;
			} 
			return $response;
		} 
	}
