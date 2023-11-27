<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\Page;

use CodeIgniter\API\ResponseTrait;

class ListPagesJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Pages
	 */
	public function index($orderBy = 'label', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$pageModel = new \App\Models\PageModel();

		$data['pages'] = $pageModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $pageModel->pager;

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
		$pageModel = new \App\Models\PageModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $pageModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$pageModel = new \App\Models\PageModel();
		$result = $pageModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_label($label, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$pageModel = new \App\Models\PageModel();
		$result = $pageModel->where('label', $label)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_path($path, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$pageModel = new \App\Models\PageModel();
		$result = $pageModel->where('path', $path)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_app_id($app_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$pageModel = new \App\Models\PageModel();
		$result = $pageModel->where('app_id', $app_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_label($label){
		$db      = \Config\Database::connect();
		$builder = $db->table('page');
		$builder->like('label', urldecode($label));

		$data['pageCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_path($path){
		$db      = \Config\Database::connect();
		$builder = $db->table('page');
		$builder->like('path', urldecode($path));

		$data['pageCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
