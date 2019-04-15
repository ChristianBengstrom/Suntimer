<?php

require_once 'model/ModelA.inc.php';

class Controller {
    private $model;
    private $qs;
    private $function;

    public function __construct($qs) {
        $this->qs = $qs;
        foreach ($qs as $key => $value) {
            $$key = $value;
        }
        $this->function = isset($function) ? $function : 'A';
    }
    public function ignite() {
        switch ($this->function) {

            case 'A':   // frontpage
                $this->model = new Sunshine(null, null, null, null);    // init model
                $view1 = new FrontView($this->model);                   // init view
                if (isset($_POST['go'])) {
                  $this->getData($_GET);                                // activate controller
                }
                $view1->display();
                break;
            case 'routeAbout':   // aboutpage
                $view1 = new AboutView($this->model);
                // $this->aFunction();
                $view1->display();
                break;
        }
    }


    public function getData($p) {
        if (isset($p) && count($p) > 0) {
            $place = Sunshine::createObject($p);               // object from array
            $place->getSunInfo();                              // model method

            $p = array();
        }
    }
}
