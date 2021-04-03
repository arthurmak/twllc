<?php

namespace Drupal\twllc_world;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event class to be dispatched from the TwllcWorldSalutation service.
 */
class SalutationEvent extends Event {
  const EVENT = 'twllc_world.salutation_event';
  /**
   * The salutation message.
   * @var string
   */
  protected $message;
  /**
   * Returns the salutation message.
   *
   * @return mixed
   *   The salutation message.
   */
  public function getValue() {
    return $this->message;
  }

  /**
   * Sets the salutation message.
   * @param mixed $message
   *   The salutation message.
   */
  public function setValue($message) {
    $this->message = $message;
  }
}
