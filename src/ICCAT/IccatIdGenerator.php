<?php

namespace Drupal\ised_publications\ICCAT;

/**
 * A class to generate a unique ICCAT id string.
 */
class IccatIdGenerator {

  /**
   * Generate the id.
   */
  public function generateId() {

    $testId = '';
    $unique = FALSE;
    $permittedChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Keep trying ids until we find an unused one.
    while (!$unique) {

      $randomString = '';
      for ($i = 0; $i < 6; $i++) {

        $randomCharacter = $permittedChars[mt_rand(0, strlen($permittedChars) - 1)];
        $randomString .= $randomCharacter;
      }

      $testId = 'ICWE-' . $randomString;

      // Verify that no other publication is already using this id.
      $nodes = \Drupal::entityTypeManager()
        ->getStorage('node')
        ->loadByProperties(['field_iccat_id' => $testId]);

      if (count($nodes) == 0) {
        $unique = TRUE;
      }
    }

    return $testId;
  }

}
