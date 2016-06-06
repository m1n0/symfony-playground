<?php
/**
 * Created by PhpStorm.
 * User: m1n0
 * Date: 06/06/2016
 * Time: 12:00
 */

namespace AppBundle\Twig;


class AcmeExtension extends \Twig_Extension {

  /**
   * Returns the name of the extension.
   *
   * @return string The extension name
   */
  public function getName() {
    return 'acme';
  }

  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('spanify', [$this, 'addSpanTag']),
      new \Twig_SimpleFunction('splitter', function($content) {
        return explode(' ', $content);
      }),
    ];
  }

  public function getFilters() {
    return [
      new \Twig_SimpleFilter('first_word', [$this, 'getFirstWord']),
    ];
  }

  public function addSpanTag($content) {
    return "<span>$content</span>";
  }

  public function getFirstWord($content) {
    return explode(' ', $content)[0];
  }
}
