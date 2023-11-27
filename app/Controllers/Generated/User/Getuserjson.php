<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\User;

class GetUserJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$userModel = new \App\Models\UserModel();
		$result = $userModel->find($id);
		if( $result == null ){
			return $this->statusError('NOT FOUND');
		} else{
			return $this->statusOK($result);
		}
	}

	/**
	 * Affichage des infos
	 */
	public function edit($id){
		/*
		$model = $this->userservice->getUnique($this->db, $id);
		$data['user'] = $model;
		
	
		$this->load->view('user/edituser_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un User
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\UserModel();
		$result = $model->find($id);



		if($result == null){
			return $this->statusError('NOT FOUND');
		}else{
			$model->delete($id);
			return $this->statusOK('done');
		}

		
	}

}

?>
