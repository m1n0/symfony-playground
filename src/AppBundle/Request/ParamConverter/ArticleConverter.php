<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 03/06/2016
 * Time: 12:35
 */

namespace AppBundle\Request\ParamConverter;


use AppBundle\Entity\Article;
use AppBundle\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleConverter implements ParamConverterInterface {
  /**
   * @var \AppBundle\Repository\ArticleRepository
   */
  private $articleRepository;


  /**
   * ArticleConverter constructor.
   */
  public function __construct(ArticleRepository $articleRepository) {
    $this->articleRepository = $articleRepository;
  }

  public function apply(Request $request, ParamConverter $configuration) {
    $article_id = $request->attributes->get($configuration->getName());
    $articles = $this->articleRepository->findAll();

    if (isset($articles[$article_id])) {
      $article = $articles[$article_id];
      $request->attributes->set($configuration->getName(), $article);
    }
    else {
      throw new NotFoundHttpException(sprintf('%s object not found.', $configuration->getClass()));
    }

    return !empty($article);
  }

  public function supports(ParamConverter $configuration) {
    return ($configuration->getClass() === Article::class);
  }
}
