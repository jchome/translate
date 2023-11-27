<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Language;

class EditLanguage extends \App\Controllers\HtmlController {

	/**
	 * Affichage des infos
	 */
	public function index($id){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['form', 'database']);
		$languageModel = new \App\Models\LanguageModel();
		$model = $languageModel->find($id);

		$data['language'] = $model;

		return $this->view('Generated/Language/editlanguage', $data, 'Language');
	}

	/**
	 * Sauvegarde des modifications
	 */
	public function save(){
		helper(['form', 'database', 'security']);

		$validation =  \Config\Services::validation();
		
		if (! $this->validate([
'label' => 'trim|required',
			'code' => 'trim|required',
		])) {
			log_message('debug','[Editlanguage.php] : Error in the form !');
			session()->setFlashData('error', $validation->listErrors());
			return redirect()->to('Generated/Language/editlanguage/index/' 
				. $this->request->getPost('id'));
		}

		// Mise a jour des donnees en base
		$languageModel = new \App\Models\LanguageModel();
		$key = $this->request->getPost('id');
		$oldModel = $languageModel->find($key);

		$data = [

			'id' => $this->request->getPost('id'),
			'label' => $this->request->getPost('label'),
			'code' => $this->request->getPost('code'),
			'flag' => $this->request->getPost('flag'),
		];

		if($data['flag'] == ""){
			$data['flag'] = null;
		}

		$languageModel->update($key, $data);
		

		
		log_message('debug','[Editlanguage.php] : DEMARRAGE de l\'upload');
		// Suppression de l'ancien fichier flag : Image du drapeau
		if( $oldModel['flag'] != "" && $data['flag'] == ""){
			unlink(PUBLIC_PATH . '/uploads/' . $oldModel['flag']);
		}
		// Upload du nouveau fichier flag : Image du drapeau
		$flag_file = $this->request->getFile('flag_file');
		if($flag_file != "") {
			$flag_ext = $flag_file->guessExtension();

			if (! $flag_file->hasMoved()) {
				$filepath = WRITEPATH . 'uploads/' . $flag_file->store();
				// Rename file to match with this object
				$data['flag'] = 'language_' . $data['id'] . '_flag.' . $flag_ext;
				rename($filepath, PUBLIC_PATH . '/uploads/' . $data['flag']);

				// Remove uploaded file temp name
				if( file_exists($filepath) ){
					unlink($filepath);
				}
				// Autre fichier a telecharger (autre extension)
				if($oldModel['flag'] != $data['flag'] 
					&& $oldModel['flag'] != ""
					&& file_exists(PUBLIC_PATH . '/uploads/' . $oldModel['flag'])
					){
					unlink(PUBLIC_PATH . '/uploads/' . $oldModel['flag']);
				}
			} else {
				session()->setFlashData('msg_error', lang('App.message.upload-failed'));
				return redirect()->to('Language/editlanguage/index/' 
					. $this->request->getPost('id)'));
			}
		}
		$languageModel->update($key, $data);


		session()->setFlashData('msg_confirm', lang('generated/Language.message.confirm.modified'));
		return redirect()->to('Generated/Language/listlanguages/index');
	}


}
?>
