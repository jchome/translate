<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\App;

class GetAppJson extends \App\Controllers\AjaxController {


	/**
	* Affichage des infos
	*/
	public function get($id){

		$appModel = new \App\Models\AppModel();
		$result = $appModel->find($id);
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
		$model = $this->appservice->getUnique($this->db, $id);
		$data['app'] = $model;

		$data['userCollection'] = $this->userservice->getAll($this->db,'name');		
	
		$this->load->view('app/editapp_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un App
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\AppModel();
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
