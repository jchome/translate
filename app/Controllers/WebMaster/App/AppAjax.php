<?php
namespace App\Controllers\WebMaster\App;

use App\Libraries\TranslateService;
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

    public function getElements($pageId, $langId){
        $page = (new PageModel())->asObject()->find($pageId);
        if($page == null){
            return $this->statusNotFound('No page for id=' . $pageId);
        }
        $lang = (new LanguageModel())->asObject()->find($langId);
        if($lang == null){
            return $this->statusNotFound('No language for id=' . $langId);
        }

        $allElements = (new TranslateService())->getElmentsFromDatabase($pageId, $langId);
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


}