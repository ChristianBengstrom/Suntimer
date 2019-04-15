<?php
/**
 * includes/ModelUser.inc.php
 * @package MVC_CMB_Sample
 * @author cmb
 * @copyright (c) 2017, cmb
 */
class Sunshine extends Model {
    private $cityName;       // string
    private $date;  // string ll=128
    private $long;
    private $lat;

    public function __construct( $cityName, $date, $long, $lat ) {
        $this->cityName = $cityName;
        $this->date = $date;
        $this->long = $long;
        $this->lat = $lat;
    }
//-*-*-*-*-*-*-*-*-*-*-*-*-*-GETTER*SETTER*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

    public function getCityName() {
        return $this->cityName;
    }
    public function getDate() {
        return $this->date;
    }
    public function getLong() {
        return $this->long;
    }
    public function getLat() {
        return $this->lat;
    }

//-*-*-*-*-*-*-*-*-*-*-*-*-*-OTHER*METHODS*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

    public function getSunInfo() {
      $date = $_GET['date'];                                // should have been loadet from the class ($this->getDate()) but wouldent work...
      $cityName = strtolower($_GET['citySearch']);          // and like so... $this->getCityname()) but wouldent work...

      $jsonCities = file_get_contents("./model/citiesOfTheWorld/cities.json");    // get file
      $objCities = json_decode($jsonCities);                                      // json decode

      foreach($objCities as $item)                   // search
      {
          if(strtolower($item->name) == $cityName)
          {
              $long = $item->lng;                    // safe longtitude
              $lat = $item->lat;                     // safe lattitude
          }
      }

      $sun_info = date_sun_info(strtotime($date), $lat, $long);
      // $s .= 'sunrise: ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 55.6760968, 12.568337100000008, 90, 2) . "<br />\n"; // Seems to return inaccurate results ...
      // $s .= 'sunset: ' .date_sunset(time(), SUNFUNCS_RET_STRING, 55.6760968, 12.568337100000008, 90, 2) . "<br />\n"; // Seems to return inaccurate results ...

      return $sun_info;
    }


//-*-*-*-*-*-*-*-*-*-*-*-*-*-CREATE*OBJECT*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
// Factory

    public static function createObject($a) {
      $place = new Sunshine($a['citySearch'], $a['date'],
                             $a['long'],  $a['lat']);

      return $place;
    }
}
