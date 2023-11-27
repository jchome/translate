<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\WebMaster\App;

use App\Models\LanguageModel;

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
		$data['app'] = $appModel->asObject()->find($id);

		$data['languages'] = (new LanguageModel())->asObject()->orderBy('label')->findAll();

		return $this->view('WebMaster/App/editapp', $data, 'App');
	}


}
?>
