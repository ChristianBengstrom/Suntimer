<?php

require_once 'view/View.inc.php';

class FrontView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }
    private function citySearch() {
      $s = sprintf("
                    <form action='%s' method='get'>\n
                      <label>Search City</label>\n
                      <input type='text' name='citySearch' value='' placeholder='search a city...' autocomplete='false'>\n"
                     , $_SERVER['PHP_SELF']);
      return $s;
    }

    private function dateSelect() {
      $s = "        <label>Select date</label>\n
                    <input type='date' name='date' value=''>\n

                    <button type='submit' name='go'>GO</button>\n
                  </form>\n\n";

      return $s;
    }

    private function Result() {
      $s = "<h4>Result Display</h4>\n";
      $s .= "<br />\n";

      if (isset($_GET['go'])) {
        if ($_GET['date']) {
          $s .= "<h5>City: " . ucfirst($_GET['citySearch']) . "</h5>\n";
          $s .= "<p>Date: " . $_GET['date'] . "</p>\n";
          $s .= "<br />\n";

          $model = Sunshine::getSunInfo();
          foreach ($model as $key => $val) {
              $s .= sprintf("%s: %s\n"
                              , $key
                              , date("H:i", $val));
              $s .= "<br />\n";
          }
        }
      } else {
        $s .= "<p> Select city and date to display </p>\n";
      }

      return $s;
    }

    private function displayFrontpage() {
        $s = sprintf("<main class='col-md-12'>\n
                          <div class='citySearch'>\n%s\n</div>\n
                          <br />\n
                          <div class='dateSelect'>\n%s\n</div>\n
                          <br />\n
                          <hr />\n
                          <div class='result'>\n%s\n</div>\n
                      </main>\n\n"
                     , $this->citySearch()
                     , $this->dateSelect()
                     , $this->Result());
        return $s;
    }

    public function display(){
       $this->output($this->displayFrontpage());
    }
}
