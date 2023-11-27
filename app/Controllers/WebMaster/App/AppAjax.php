<?php
/*
 * Created by generator
 *
 */
namespace App\Controllers\WebMaster\App;

use App\Models\AppModel;
use App\Models\ElementModel;
use App\Models\LanguageModel;
use App\Models\PageModel;
use App\Models\TranslationModel;

class AppAjax extends \App\Controllers\AjaxController {

    public function getPages($appId){
		$appModel = new AppModel();
		$app = $appModel->asObject()->find($appId);
        if($app == null){
            return $this->statusNotFound('No app for id=' . $appId);
        }
        $pageModel = new PageModel();
        $allPages = $pageModel->asObject()->where('app_id', $appId)->orderBy('label')->find();
        return $this->statusOK($allPages);
    }

    private function getElmentsFromDatabase($pageId, $langId){
        $request = 'SELECT element.id as element_id, element.name, element.selector, ' .
            ' translate.id as translate_id, ' .
            ' translate.html, translate.alt, translate.title, translate.src ' .
            ' FROM element LEFT OUTER JOIN translate on '.
            '   (element.id = translate.element_id and lang_id = '. $langId .') ' .
            ' where element.page_id = ' . $pageId .
            ' order by element.name';
        $db = \Config\Database::connect();
        $query = $db->query($request);
        return $query->getResult();
    }

    public function getElements($pageId, $langId){
        $page = (new PageModel())->asObject()->find($pageId);
        if($page == null){
            return $this->statusNotFound('No page for id=' . $pageId);
        }
        $lang = (new LanguageModel())->asObject()->find($langId);
        if($lang == null){
            return $this->statusNotFound('No language for id=' . $langId);
        }

        $allElements = $this->getElmentsFromDatabase($pageId, $langId);
        return $this->statusOK($allElements);
    }

    public function getElement($elementId) {
        $element = (new ElementModel())->asObject()->find($elementId);
        if($element == null){
            return $this->statusNotFound('No element with id=' + $elementId);
        }
        return $this->statusOK( $element );
    }

    /**
     * 
     */
    public function getTranslation($translationId) {
        $translation = (new TranslationModel())->asObject()->find($translationId);
        if($translation == null){
            return $this->statusNotFound('No element with id=' + $translationId);
        }
        return $this->statusOK( $translation );
    }

    /**
     * 
     */
    public function getJson($appId){
        $userId = session()->get('user_id');
        $app = (new AppModel())->asObject()
            ->where('id', $appId)
            ->where('owner_id', $userId)
            ->first();
        if($app == null) {
            return $this->statusNotFound("No app with id=" . $appId);
        }
        $pageUrl = $this->request->getGet('path');
        $page = (new PageModel())
            ->where('app_id', $appId)
            ->where('path', $pageUrl)
            ->asObject()->first();
        if($page == null) {
            return $this->statusNotFound("No page with path=" . $pageUrl);
        }
        
        $langCode = $this->request->getGet('lang');
        $lang = (new LanguageModel())->asObject()
            ->where('code', $langCode)
            ->asObject()->first();
        if($lang == null) {
            return $this->statusNotFound("No language with code=" . $langCode);
        }

        $resultData = [
            "app" => $app->name,
            "page" => $pageUrl,
            "language" => $langCode,
            "translations" => [
            ]
        ];
        
        $allElements = $this->getElmentsFromDatabase($page->id, $lang->id);
        foreach ($allElements as $elementTranslation) {
            $translationResult = [
                "key" => $elementTranslation->name,
                "path" => $elementTranslation->selector,
                "html" => $elementTranslation->html,
                "alt" => $elementTranslation->alt,
                "title" => $elementTranslation->title,
            ];
            array_push($resultData["translations"], $translationResult);
        }

        return $this->statusOK($resultData);
    }

}