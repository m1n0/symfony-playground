<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 03/06/2016
 * Time: 11:17
 */

namespace AppBundle\Listener;


use Jenssegers\Agent\Agent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class UserAgentListener implements EventSubscriberInterface {
  /**
   * @var \Jenssegers\Agent\Agent
   */
  private $agent;

  /**
   * UserAgentListener constructor.
   */
  public function __construct(Agent $agent) {
    $this->agent = $agent;
  }

  public static function getSubscribedEvents() {
    return [
      'kernel.request' => [
        ['processLanguages', 1],
        ['processUserAgent', 2],
      ],
    ];
  }

  function processUserAgent(GetResponseEvent $event) {
    $request = $event->getRequest();

    $this->agent->setUserAgent($request->headers->get('user-agent'));

    $request->attributes->set('_browser', $this->agent->browser());
  }




  public function processLanguages(GetResponseEvent $event) {
//    die($event->getRequest()->headers->get('accept-language'));
  }
}
