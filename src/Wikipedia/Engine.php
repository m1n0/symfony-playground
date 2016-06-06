<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 02/06/2016
 * Time: 11:42
 */

namespace Wikipedia;


use AppBundle\Entity\Article;
use AppBundle\Repository\ArticleRepository;

class Engine {

  private $articleRepository;
  private $searchApi;
  /**
   * @var \Wikipedia\Client
   */
  private $client;

  /**
   * Engine constructor.
   * @param \AppBundle\Repository\ArticleRepository $articleRepository
   * @param $searchApi
   */
  public function __construct(ArticleRepository $articleRepository, Client $client, $searchApi) {
    $this->articleRepository = $articleRepository;
    $this->searchApi = $searchApi;
    $this->client = $client;
  }

  public function search($id) {
    $articles = $this->articleRepository->findAll();

    $title = $articles[$id]->getTitle();

    return $this->client->get($this->searchApi . $title);
  }
}
