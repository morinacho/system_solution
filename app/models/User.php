<?php  

	class User{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getByEmail($email){
			$email =  $this->db->deleteSpecialChars($email,'email'); 
			$this->db->query('SELECT * FROM  datos_usuario du
							  INNER JOIN usuario u
							  ON du.datos_usuario_id = u.datos_usuario_id
							  WHERE du.datos_usuario_email = :email'); 
			$this->db->bind(':email', $email);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getIdDataUser($document){
			$this->db->query('SELECT datos_usuario_id FROM datos_usuario WHERE datos_usuario_documento = :document');
			$this->db->bind(':document', $document);
			$response = $this->db->getRecord();
			return $response->datos_usuario_id;
		}

		public function getDataUsers(){
			$this->db->query('SELECT datos_usuario_documento, datos_usuario_nombre, datos_usuario_apellido FROM datos_usuario');
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->datos_usuario_documento] = $value->datos_usuario_nombre ." ". $value->datos_usuario_apellido;
			} 
			return $response;
		}

		public function getDataUsersByDoc($document){
			$this->db->query('SELECT du.datos_usuario_id, du.datos_usuario_nombre, du.datos_usuario_apellido, du.datos_usuario_email, du.datos_usuario_documento, td.tipo_documento_nombre, tr.tipo_rol_nombre  
							  FROM datos_usuario du, usuario u, tipo_documento td, tipo_rol tr
							  WHERE td.tipo_documento_id = du.tipo_documento_id
							  AND  tr.tipo_rol_id = u.tipo_rol_id
							  AND u.datos_usuario_id = du.datos_usuario_id
							  AND du.datos_usuario_documento = :document');
			$this->db->bind(':document', $document);
			$response = $this->db->getRecord();
			return $response;
		}

		public function addDataUser($param){
			$this->db->query('INSERT INTO datos_usuario (datos_usuario_nombre, datos_usuario_apellido, datos_usuario_documento, datos_usuario_email, tipo_documento_id) 
							  VALUES (:user_name, :user_lastname, :user_document, :user_mail, :user_document_type)');
			
			# Link values
			$this->db->bind(':user_name', $param['user-name']);
			$this->db->bind(':user_lastname', $param['user-lastname']);
			$this->db->bind(':user_document', $param['user-doc']);
			$this->db->bind(':user_mail', $param['user-mail']);
			$this->db->bind(':user_document_type', $param['docuemt-type']);
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			} 
		}

		public function addUser($param){
			$this->db->query('INSERT INTO usuario (usuario_password, tipo_rol_id, datos_usuario_id) 
							  VALUES (:user_pass, :user_rol, :user_data_id)');
			# Link values
			$this->db->bind(':user_pass', $param['user-pass']);
			$this->db->bind(':user_rol', $param['rol-type']);
			$this->db->bind(':user_data_id', $param['user-data-id']);
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			} 
		} 

		public function updateDataUser($param){
			$this->db->query('UPDATE datos_usuario 
							  SET datos_usuario_nombre = :user_name, datos_usuario_apellido = :user_lastname, 
							  	  datos_usuario_documento = :user_doc, datos_usuario_email = :user_email, tipo_documento_id = :type_doc 
							  WHERE datos_usuario_id = :user_id');
			# Link values
			$this->db->bind(':user_name', $param['user-name']);
			$this->db->bind(':user_lastname', $param['user-lastname']);
			$this->db->bind(':user_doc', $param['user-doc']);
			$this->db->bind(':user_email', $param['user-mail']);
			$this->db->bind(':type_doc', $param['docuemt-type']);
			$this->db->bind(':user_id', $param['user-id']);
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			} 
		}

		public function updatePassUser($param){
			$this->db->query('UPDATE usuario SET usuario_password = :user_pass 
							  WHERE  datos_usuario_id = :user_id');
			$this->db->bind(':user_pass', $param['user-pass']); 
			$this->db->bind(':user_id', $param['user-id']);
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			} 
		}

		public function updateUserRole($param){
			$this->db->query('UPDATE usuario SET tipo_rol_id = :rol_tyoe 
							  WHERE  datos_usuario_id = :user_id');
			$this->db->bind(':rol_tyoe', $param['rol-type']); 
			$this->db->bind(':user_id', $param['user-id']);
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			} 
		}
	}

 ?>
