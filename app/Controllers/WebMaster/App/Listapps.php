<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\WebMaster\App;

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
		// $pager = \Config\Services::pager();
		// recuperation des donnees
		$userId = session()->get('user_id');
		$appModel = new \App\Models\AppModel();

		$data['apps'] = $appModel->asObject()->where('owner_id', $userId)
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $appModel->pager;

		return $this->view('WebMaster/App/listapps', $data, 'App');
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
