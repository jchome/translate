<?php 

namespace App\Controllers;


class Welcome extends HtmlController {

	private $userModel;

	public function index(){
		helper(['form', 'security']);
		$formSend = $this->request->getPost('formSend');

		$session = session();

		// on est déjà connecté et on repart sur l'accueil
		if($formSend == ""){
			// The form is not sent

		 	if( $session->get('user_id') != null){
				 if($session->get('user_id') == -1){
					return redirect()->to('user/listusers/index');
				}else{
					return redirect()->to('app/listapps/index');
				}
			 }else{
				echo view('welcome');
				return;
			 }
		}


		if (! $this->validate([
			'login' => 'required',
			'password' => 'required',
		])) {
			log_message('debug','[welcome.php] : no parameter.');
			echo view('welcome');
			return;
		}
		
		$login = $this->request->getPost('login'); 
		$password = $this->request->getPost('password');
		$data = Array();
	
		if ($login == "admin" && $password == "/xx*xx*xx/") {
			$session->set('user_id', -1);
			log_message('debug','[welcome.php] : ADMIN is connected.');
			return redirect()->to('Generated/User/Listusers/index'); 
			
		} else {
			$this->userModel = new \App\Models\UserModel();
			$allUsers = $this->userModel->where('login', $login)
				->findAll();
			if(sizeOf($allUsers) != 1){
				$data['message'] = 'Identifiant ['.$login.'] ou mot de passe incorrect...';
				log_message('debug','[welcome.php] : too much users with this login');
				$session->setFlashdata('error', 'Identifiant ['.$login.'] ou mot de passe incorrect...');
				return $this->view('welcome', $data, "Welcome");
			}
			$user = end($allUsers);
			// Check password
			if($password != $user['password'] && ! verify($password, $user['password'])){
				$data['message'] = 'Identifiant ['.$login.'] ou mot de passe incorrect...';
				log_message('debug','[welcome.php] : incorrect login or password');
				$session->setFlashdata('error', 'Identifiant ['.$login.'] ou mot de passe incorrect...');
				return $this->view('welcome', $data, "Welcome");
			}
			$session->set('user_id', $user['id']);
			$session->set('currentUser', (object)$user);
			log_message('debug','[welcome.php] : user connected: '. $login);
			log_message('debug','[welcome.php] session/userid = ' . $session->get('user_id'));

			// Add the token for the user
			if($user['profile'] == 'ADMIN'){
				return redirect()->to('Generated/User/listusers/index');
			}else{
				return redirect()->to('WebMaster/App/listapps/');
			}
			
		}
		
	}
	
	/**
	 * Deconnexion
	 */
	function logout(){
		$session = session();
		$session->remove('user_id');
		$session->remove('currentUser');
		return redirect()->to('welcome/index'); 
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */