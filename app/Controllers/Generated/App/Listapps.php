<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\App;

class ListApps extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Apps
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'name';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();

		$data['apps'] = $appModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $appModel->pager;


		$userModel = new \App\Models\UserModel();
		$data['userCollection'] = index_data($userModel->orderBy('name', 'asc')
			->findAll(), 'id');

		return $this->view('Generated/App/listapps', $data, 'App');
	}

	
	/**
	 * Suppression d'un App
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$appModel = new \App\Models\AppModel();
		$appModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/App.message.confirm.deleted'));
		return redirect()->to('Generated/App/listapps/index'); 
	}

}
?>
