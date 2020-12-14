<?php

namespace Drupal\Core\PageCache\RequestPolicy;

use Drupal\Core\PageCache\RequestPolicyInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reject when running from the command line.
 */
class CommandLine implements RequestPolicyInterface {

  /**
   * {@inheritdoc}
   */
  public function check(Request $request) {
    if ($this->isCli()) {
      return static::DENY;
    }
  }

  /**
   * Indicates whether this is a CLI request.
   */
  protected function isCli() {
    return PHP_SAPI === 'cli';
  }

}
