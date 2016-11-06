<?php
use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        //css
        $this->assets
        ->addCss("css/foundation.css")
        ->addCss("css/index.css");
        // js
        $this->assets
        ->addJs("js/vendor/jquery.js")
        ->addJs("js/vendor/foundation.js")
        ->addJs("js/vendor/voice.js")
        ->addJs("js/pages/index.js");
        
        // Get random Greeting
        $eve_answers = Messages::find();
        
        
        $this->view->setVars(
        [
        "eve_answers" => $eve_answers
        ]
        );
        
    }
}