<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Drupal\twllc_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\twllc_world\TwllcWorldSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Controller for the salutation message
 *
 * @author arthur
 */


class TwllcWorldController extends ControllerBase {
  /**
   * The salutation service.
   *
   * @var \Drupal\hello_world\HelloWorldSalutation
   */
  protected $salutation;

  /**
   * TwllcWorldController constructor.
   *
   * @param \Drupal\twllc_world\TwllcWorldSalutation $salutation
   *   The salutation service.
   */
  public function __construct(TwllcWorldSalutation $salutation) {
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('twllc_world.salutation')
    );
  }

  /**
   * Twllc World.
   *
   * @return array
   *   Our message.
   */
  public function twllcWorld() {
    return $this->salutation->getSalutationComponent();
  }
  
  public function course() {
    return [
      '#markup' => $this->t("course list"),
    ];
  }
  
}
