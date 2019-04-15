<?php

require_once 'model/ModelA.inc.php';
abstract class View {
    protected $model;
    public function __construct($model) {
        $this->model = $model;
    }
    private function head() {

        $s = "
          <!doctype html>\n
            <html>\n
              <head>\n
                <meta charset='utf-8'/>\n
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>\n
                <title>Suntimer</title>\n
                <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>\n
                <link rel='stylesheet' href='./css/styles.css'/>\n
                <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.1/css/all.css' integrity='sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP' crossorigin='anonymous'>\n
                <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>\n
                <script src='./js/cities.js' charset='utf-8'></script>
              </head>\n\n";
        return $s;
    }

    private function topmenu() {
        $s = sprintf("
              <header>\n
                <div class='container'>\n
                  <div class='row'>\n
                  <nav class='navbar navbar-expand-lg col-12'>\n
                    <div class='col-4'>\n
                      <h3>SunTimer alfa 0.1 </h3>\n
                    </div>\n
                    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>\n
                        <img class='nav-toggle' src='./images/toggle.png' alt='nav-toggle'/>\n
                    </button>\n
                    <div class='collapse navbar-collapse col-4' id='navbarNav'>\n
                        <ul class='navbar-nav'>\n
                            <li class='nav-item'>\n
                                <a class='nav-link' href='%s'>Tool</span></a>\n
                            </li>\n
                            <li class='nav-item'>\n
                                <a class='nav-link' href='%s?function=routeAbout'>About</a>\n
                            </li>\n",
                         $_SERVER['PHP_SELF'], $_SERVER['PHP_SELF']);

        $s .= "             </ul>\n
                          </div>\n
                        </nav>\n
                      </div>
                    </header>\n\n
                  <div class='container'>\n
                    <div class='row'>\n";

        return $s;
    }

    private function bottom() {
        // two first <div>'s for closing container & row
        $s = "      </div>\n
                  </div>\n
                  <footer>\n
                    <br />\n
                    <br />\n
                    <br />\n
                    <div class='container'>\n
                      <div class='row'>\n
                        <p class='col-12 text-center'>Christian Bengstrøm | 2019 | Suntimer </p>\n
                      </div>\n
                    </div>\n
                  </footer>\n
                  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>\n
                  </body>\n
                </html>";

        return $s;
    }

    public function output($s) {
        print($this->head());
        print($this->topmenu());
        printf("%s", $s);           // PageContent
        print($this->bottom());
    }
}
