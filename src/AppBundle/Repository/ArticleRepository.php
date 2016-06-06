<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 01/06/2016
 * Time: 12:42
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Article;

class ArticleRepository {


  private $articles = [];
  /**
   * ArticleRepository constructor.
   */
  public function __construct() {
    $this->articles = [
      new Article('Richard', 'Some content 1!'),
      new Article('Elizabeth', 'Some content 2!'),
      new Article('Henry', 'Some content 3!'),
    ];
  }

  /**
   * @return Article[]
   */
  public function findAll() {
    return $this->articles;

  }
}
