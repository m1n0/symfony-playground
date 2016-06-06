<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 03/06/2016
 * Time: 11:57
 */

namespace AppBundle\Listener;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Templating\TemplateReference;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ViewListener {

  public function onKernelView(GetResponseForControllerResultEvent $event) {
//    dump($event->getControllerResult());
//    dump($event->getRequest()->attributes->all());

    /* @var Template $template */
    $template = $event->getRequest()->attributes->get('_template');
//    $template->setTemplate('AppBundle:Blog:other_template.html.twig');
  }

}
