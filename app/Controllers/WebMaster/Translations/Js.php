<?php
namespace App\Controllers\WebMaster\Translations;

use App\Controllers\BaseController;
use App\Libraries\TranslateService;
use App\Models\AppModel;
use App\Models\LanguageModel;
use App\Models\PageModel;

class Js extends BaseController {

    private $template = "const _translations_data_ = %s;
    
    $( document ).ready(function() {
        for(let item of _translations_data_.translations) {
            // Find the element
            const htmlElt = $(item.path);
            if(!htmlElt){
                continue;
            }
            item.html && htmlElt.html(item.html);
            for(let attribute of ['alt', 'title', 'src', 'class', 'value', 'href']){
                item[attribute] && htmlElt.attr(attribute, item[attribute]);
            }
        };
    });
    ";

    /**
     * 
     */
    public function index(){
        
        $this->response->setContentType('text/javascript');

        $appServer = $this->request->getGet('server');
        $app = (new AppModel())->asObject()
            ->where('server', $appServer)
            ->first();
        if($app == null) {
            echo( sprintf("console.error('No app with server=%s')", $appServer) );
            return;
        }
        $pageUrl = $this->request->getGet('path');
        $page = (new PageModel())
            ->where('app_id', $app->id)
            ->where('path', $pageUrl)
            ->asObject()->first();
        if($page == null) {
            echo( sprintf("console.error('No page with path=%s')", $pageUrl) );
            return;
        }
        
        $langCode = $this->request->getGet('lang');
        $lang = (new LanguageModel())->asObject()
            ->where('code', $langCode)
            ->asObject()->first();
        if($lang == null) {
            echo( sprintf("console.error('No language with code=%s')", $langCode) );
            return;
        }

        $resultData = [
            "app" => $app->name,
            "page" => $pageUrl,
            "language" => $langCode,
            "translations" => [
            ]
        ];
        
        $allElements = (new TranslateService())->getElmentsFromDatabase($page->id, $lang->id);
        foreach ($allElements as $elementTranslation) {
            $translationResult = [
                "key" => $elementTranslation->name,
                "path" => $elementTranslation->selector,
                "html" => $elementTranslation->html,
                "alt" => $elementTranslation->alt,
                "title" => $elementTranslation->title,
                "href" => $elementTranslation->href,
            ];
            array_push($resultData["translations"], $translationResult);
        }

        echo( sprintf($this->template, json_encode($resultData, JSON_PRETTY_PRINT)) );
        return;
    }

}