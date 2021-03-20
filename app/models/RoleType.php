<?php  

	class RoleType{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getAll(){ 
			$this->db->query('SELECT * FROM tipo_rol');  
			$result   = $this->db->getRecords();
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->tipo_rol_id] = $value->tipo_rol_nombre;
			}
			return $response;
			return $response;
		} 
	}
 ?>
