<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrainingController extends Controller
{
    /**
     * @Route("/training/{job}/{name}",
     *   name="training",
     *   defaults={"name" = "Milan", "job" = "developer"}
     *   )
     * @Template()
     */
    public function trainingAction($job, $name) {
//        return $this->render('@App/Training/training.html.twig');
        return [
            'name' => $name,
            'job' => $job,
        ];
    }
}
