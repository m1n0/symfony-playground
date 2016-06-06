<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Template()
     */
    public function viewAction(Request $request, Article $article)
    {
        return [
            'article' => $article,
            'browser' => $request->attributes->get('_browser'),
        ];
    }
}
