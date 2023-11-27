<?php
/*
 * Created by generator
 *
 */

/***************************************************************************
 * DO NOT MODIFY THIS FILE, IT IS GENERATED
 ***************************************************************************/

namespace App\Models;
use CodeIgniter\Model;

class AppModel extends Model {
	
    protected $table      = 'app';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'name', // Nom de l'application
		'owner_id', // Lien vers l'utilisateur propriétaire de l'application
		'server', // nom du serveur et port de l'application, pour contrôle de sécurité
	];
    public static $empty = [
	'id' => '',
		'name' => '',
		'owner_id' => '',
		'server' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
