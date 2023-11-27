<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Language;

class GetLanguageJson extends \App\Controllers\AjaxController {

	/**
	 * Revoie les donnees de fichier encode en base 64
	 * @param int $poiidpoi
	 */
	public function get_file_flag($id){
		$model = $this->languageservice->getUnique($this->db, $id);
		if($model == null){
			return "";
		}
		$objectData = Array();
		$objectData["id"] = $model->id;
		$json_data = "";
	
		if($model->flag != null){
			$path = realpath('www/uploads/') .'/'. $model->flag;
			$file_data = file_get_contents($path, 'r');
			$b64_encoded = base64_encode($file_data);
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$json_data = 'data:' . $type . ';base64,' . base64_encode($file_data);
		}
		$objectData["flag"] = Array( "id" => $model->flag , "data" => $json_data );
	
		$data['data'] = $objectData;
		$this->load->view('json/jsonifyData_view', $data);
	}
	

	/**
	* Affichage des infos
	*/
	public function get($id){

		$languageModel = new \App\Models\LanguageModel();
		$result = $languageModel->find($id);
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
		$model = $this->languageservice->getUnique($this->db, $id);
		$data['language'] = $model;
		
	
		$this->load->view('language/editlanguage_fancyview',$data);
		*/
	}
	
	/**
	 * Suppression d'un Language
	 * @param $id identifiant a supprimer
	 */
	function delete($id){
		$model = new \App\Models\LanguageModel();
		$result = $model->find($id);


		$path = realpath('www/uploads/');
		if( $model->flag && file_exists( $path . $model->flag ) ){
			unlink($path . $model->flag);
		}


		if($result == null){
			return $this->statusError('NOT FOUND');
		}else{
			$model->delete($id);
			return $this->statusOK('done');
		}

		
	}

}

?>
