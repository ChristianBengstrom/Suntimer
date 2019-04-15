<?php

require_once 'view/View.inc.php';

class AboutView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }
    private function info() {
      $s = "<h3>Info about the application....</h3>\n";

        return $s;
    }


    private function displayFrontpage() {
        $s = sprintf("<main class='col-md-12'>
                          <div class='info'>\n%s\n</div>
                      </main>"
                     , $this->info());
        return $s;
    }

    public function display(){
       $this->output($this->displayFrontpage());
    }
}
