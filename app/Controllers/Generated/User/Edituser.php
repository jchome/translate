<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\User;

class EditUser extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$userModel = new \App\Models\UserModel();
		$model = $userModel->find($id);

		$data['user'] = $model;

		return $this->view('Generated/User/edituser', $data, 'User');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'login' => 'trim|required',
			'password' => 'trim|required',
			'name' => 'trim',
			'profile' => 'trim|required',
		])) {
			log_message('debug','[Edituser.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/User/edituser/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$userModel = new \App\Models\UserModel();
		$key = $this->request->getPost('id');
		$oldModel = $userModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'login' => $this->request->getPost('login'),
			'password' => generateHash($this->request->getPost('password')),
			'name' => $this->request->getPost('name'),
			'profile' => $this->request->getPost('profile'),
		];

		if($data['name'] == ""){
			$data['name'] = null;
		}

		$userModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/User.message.confirm.modified'));
		return redirect()->to('Generated/User/listusers/index');
	}


}
?>
