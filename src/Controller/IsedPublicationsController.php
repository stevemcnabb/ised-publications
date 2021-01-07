<?php

namespace Drupal\ised_publications\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ISED Publications routes.
 */
class IsedPublicationsController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
