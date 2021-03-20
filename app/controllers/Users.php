<?php 

	class Users extends Controller{
		 
		private $documentTypeModel;
		private $roleTypeModel;
		private $userModel;
		private $schoolModel;
		private $carrerModel;

		public function __construct(){
			# Se crea el objeto y se lo asigna al modelo
			$this->userModel         = $this->model('User'); 
			$this->schoolModel		 = $this->model('School');
			$this->carrerModel		 = $this->model('Carrer');
			$this->roleTypeModel     = $this->model('RoleType'); 
			$this->documentTypeModel = $this->model('DocumentType'); 				  
		}

		public function index(){}

		public function create(){
			$param = [
				"TipoRol"		=> $this->roleTypeModel->getAll(),
				"TipoDocumento" => $this->documentTypeModel->getAll(),
				"Escuela"		=> $this->schoolModel->getAll(),
				"Carrera"		=> $this->carrerModel->getAll()
			];
			$this->view('users/create', $param);
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user-create'])){
				if(isset($_POST['user-name']) && isset($_POST['user-lastname']) && isset($_POST['user-mail']) && 
				   isset($_POST['user-pass']) && isset($_POST['user-doc']) && isset($_POST['rol-type']) && isset($_POST['docuemt-type']) ){
					
					$document = trim($_POST['user-doc']);
					$param    = [
						'user-name'     => trim($_POST['user-name']),
						'user-lastname' => trim($_POST['user-lastname']),
						'user-mail'     => trim($_POST['user-mail']), 
						'user-doc'      => $document, 
						'docuemt-type'  => trim($_POST['docuemt-type'])
					];
															
					if($this->userModel->addDataUser($param)){
						$data_user_id = $this->userModel->getIdDataUser($document);
						$pass  =  password_hash(trim($_POST['user-pass']), PASSWORD_BCRYPT, ['cost' => 12]);
						$param = [
							'user-pass'    => $pass,
							'rol-type'     => trim($_POST['rol-type']),
							'user-data-id' => $data_user_id
						]; 
						if($this->userModel->addUser($param)){	 
							redirect('home?success=true');
							
						}
					}
				} 
			}		 
		}

		public function show(){
			$param = $this->userModel->getDataUsers();
			$this->view('users/show', $param);
		}

		public function edit($document){
			$param = [
				"user"    => $this->userModel->getDataUsersByDoc($document),
				"TipoRol" => $this->roleTypeModel->getAll(),
				"TipoDoc" => $this->documentTypeModel->getAll()
			];
			$this->view('users/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user-edit'])){
				if(isset($_POST['user-name']) && isset($_POST['user-lastname']) && isset($_POST['user-mail']) && 
				   isset($_POST['user-doc']) && isset($_POST['rol-type']) && isset($_POST['docuemt-type']) ){
					$user_id = $_POST['user-id'];
					$param    = [
						'user-name'     => trim($_POST['user-name']),
						'user-lastname' => trim($_POST['user-lastname']),
						'user-mail'     => trim($_POST['user-mail']), 
						'user-doc'      => trim($_POST['user-doc']), 
						'docuemt-type'  => trim($_POST['docuemt-type']),
						'user-id'		=> $user_id
					];
															
					if($this->userModel->updateDataUser($param)){
						if(isset($_POST['user-pass']) && $_POST['user-pass'] != ""){ 
							$pass = password_hash(trim($_POST['user-pass']), PASSWORD_BCRYPT, ['cost' => 12]); 
							$param = [
								'user-pass'    => $pass,
								'user-id' => $user_id
							];
							$this->userModel->updatePassUser($param);
						} 

						$param = [ 
							'rol-type' => trim($_POST['rol-type']),
							'user-id'  => $user_id
						]; 
						$this->userModel->updateUserRole($param);
						redirect('home'); 
					}
				} 
			}	
		}

		public function delete($document){}
	}
