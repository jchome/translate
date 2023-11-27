<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\Generated\App;

use CodeIgniter\API\ResponseTrait;

class ListAppsJson extends \App\Controllers\BaseController {

	use ResponseTrait;

	/**
	 * Affichage des Apps
	 */
	public function index($orderBy = 'name', $asc = 'asc', $offset = 0){
		helper(['database']);

		// preparer le tri
		$data['orderBy'] = $orderBy;
		$data['asc'] = $asc;
		$limit = 10;
		$pager = \Config\Services::pager();
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();

		$data['apps'] = $appModel
			->orderBy($orderBy, $asc)->paginate($limit, 'bootstrap', null, $offset);
		$data['pager'] = $appModel->pager;

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
		$appModel = new \App\Models\AppModel();
		$keysArray = explode(',', $listOfKeys);
		if($orderBy == null){
			$orderBy = 'id';
		}
		$result = $appModel->orderBy($orderBy, 'asc')->find($keysArray);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}


	public function findBy_id($id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();
		$result = $appModel->where('id', $id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_name($name, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();
		$result = $appModel->where('name', $name)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_owner_id($owner_id, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();
		$result = $appModel->where('owner_id', $owner_id)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}
	public function findBy_server($server, $orderBy = null, $limit = 50, $offset = 0){
		// recuperation des donnees
		$appModel = new \App\Models\AppModel();
		$result = $appModel->where('server', $server)->findAll($limit, $offset);
		return $this->respond([
			'status' => 'ok',
			'data' => $result
		]);
	}




	public function findLike_name($name){
		$db      = \Config\Database::connect();
		$builder = $db->table('app');
		$builder->like('name', urldecode($name));

		$data['appCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}
	public function findLike_server($server){
		$db      = \Config\Database::connect();
		$builder = $db->table('app');
		$builder->like('server', urldecode($server));

		$data['appCollection'] = $builder->get()->getResultArray();
		return $this->respond([
			'status' => 'ok',
			'data' => $data
		]);
	}

}
?>
