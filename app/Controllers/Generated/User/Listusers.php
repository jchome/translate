<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\User;

class ListUsers extends \App\Controllers\HtmlController {

	/**
	 * Affichage des Users
	 */
	public function index($orderBy = null, $asc = null, $offset = 0){

		if(session()->get('user_id') == "") {
			return redirect()->to('welcome/index');
		}
		
		helper(['database']);

		// preparer le tri
		if($orderBy == null) {
			$orderBy = 'login';
		}
		if($asc == null) {
			$asc = 'asc';
		}
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$userModel = new \App\Models\UserModel();

		$data['users'] = $userModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $userModel->pager;


		$data["enum_profile"] = array("ADMIN" => "Administrateur","WEBMASTER" => "WebMaster");

		return $this->view('Generated/User/listusers', $data, 'User');
	}

	
	/**
	 * Suppression d'un User
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$userModel = new \App\Models\UserModel();
		$userModel->delete($id);
		session()->setFlashData('msg_confirm', lang('generated/User.message.confirm.deleted'));
		return redirect()->to('Generated/User/listusers/index'); 
	}

}
?>
