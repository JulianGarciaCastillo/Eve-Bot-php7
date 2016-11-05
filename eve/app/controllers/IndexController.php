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
        $greeting = Messages::find(
        [
        "type = 'greetings'",
        "order" => "rand()",
        "limit" => 1,
        ]
        );
        
        
        $this->view->setVars(
        [
        //If it's only one element', if not, no 0
        "greeting" => $greeting[0]
        ]
        );
        
    }
      
    /**
    * @desc ajax with get ALFONSO
    */
    public function requestAction()
    {
        
        //disable view
        $this->view->disable();
        
        //if get
        if($this->request->isGet() == true)
        {
            //if Ajax
            if($this->request->isAjax() == true)
            {
                $this->response->setJsonContent(array('res' => array("1","2","3")));
                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            }
        } else {
            $this->response->setStatusCode(404, "Not Founda");
        }     
    }
}