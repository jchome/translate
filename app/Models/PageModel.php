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

class PageModel extends Model {
	
    protected $table      = 'page';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'label', // Nom de la page
		'path', // chemin de la page pour contrôle de sécurité
		'app_id', // Lien vers l'application
	];
    public static $empty = [
	'id' => '',
		'label' => '',
		'path' => '',
		'app_id' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
