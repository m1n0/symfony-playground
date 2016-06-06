<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 02/06/2016
 * Time: 12:04
 */

namespace Wikipedia;


class Client {

  public function get($url) {
    return json_decode(file_get_contents($url))->query->search;
  }
}
