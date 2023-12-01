<?php
namespace App\Libraries;

class TranslateService {

    public function getElmentsFromDatabase($pageId, $langId){
        $request = 'SELECT element.id as element_id, element.name, element.selector, ' .
            ' translate.id as translate_id, ' .
            ' translate.html, translate.alt, translate.title, translate.src, translate.href ' .
            ' FROM element LEFT OUTER JOIN translate on '.
            '   (element.id = translate.element_id and lang_id = '. $langId .') ' .
            ' where element.page_id = ' . $pageId .
            ' order by element.name';
        $db = \Config\Database::connect();
        $query = $db->query($request);
        return $query->getResult();
    }

}