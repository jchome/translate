<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\App;

class EditApp extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$appModel = new \App\Models\AppModel();
		$model = $appModel->find($id);

		$data['app'] = $model;

		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = $userModel->orderBy('name', 'asc')->findAll();
		return $this->view('Generated/App/editapp', $data, 'App');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'name' => 'trim|required',
			'owner_id' => 'trim|required',
			'server' => 'trim',
		])) {
			log_message('debug','[Editapp.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/App/editapp/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$appModel = new \App\Models\AppModel();
		$key = $this->request->getPost('id');
		$oldModel = $appModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'name' => $this->request->getPost('name'),
			'owner_id' => $this->request->getPost('owner_id'),
			'server' => $this->request->getPost('server'),
		];

		if($data['server'] == ""){
			$data['server'] = null;
		}

		$appModel->update($key, $data);
		


		session()->setFlashData('msg_confirm', lang('generated/App.message.confirm.modified'));
		return redirect()->to('Generated/App/listapps/index');
	}


}
?>
