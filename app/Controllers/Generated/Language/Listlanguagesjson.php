<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Language;

use CodeIgniter\API\ResponseTrait;

class ListLanguagesJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Languages
	 */
	public function index($orderBy = 'label', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$languageModel = new \App\Models\LanguageModel();

		$data['languages'] = $languageModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $languageModel->pager;

		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);

	}

	/**
	 * Get all objects having the key in the list $listOfKeys (string separated by ',')
	 * 
	 */
	public function getAll_id($listOfKeys, $orderBy = null){
		$languageModel = new \App\Models\LanguageModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $languageModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$languageModel = new \App\Models\LanguageModel();
		$result = $languageModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_label($label, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$languageModel = new \App\Models\LanguageModel();
		$result = $languageModel->where('label', $label)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_code($code, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$languageModel = new \App\Models\LanguageModel();
		$result = $languageModel->where('code', $code)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_label($label){
		$db      = \Config\Database::connect();
		$builder = $db->table('lang');
		$builder->like('label', urldecode($label));

		$data['languageCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_code($code){
		$db      = \Config\Database::connect();
		$builder = $db->table('lang');
		$builder->like('code', urldecode($code));

		$data['languageCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
