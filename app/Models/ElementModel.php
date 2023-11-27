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

class ElementModel extends Model {
	
    protected $table      = 'element';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
	'id', // Identifiant système
		'name', // Nom de l'élément
		'selector', // Sélecteur jQuery de l'objet à traduire
		'page_id', // Lien vers la page
	];
    public static $empty = [
	'id' => '',
		'name' => '',
		'selector' => '',
		'page_id' => '',        
    ];

	/***************************************************************************
	 * DO NOT MODIFY THIS FILE, IT IS GENERATED
	 ***************************************************************************/

}

?>
