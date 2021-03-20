<?php  

	class DocumentType{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getAll(){ 
			$this->db->query('SELECT * FROM  tipo_documento');   
			$result   = $this->db->getRecords();
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->tipo_documento_id] = $value->tipo_documento_nombre;
			}
			return $response;
		} 
	}
 ?>
