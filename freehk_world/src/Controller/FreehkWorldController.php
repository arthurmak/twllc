<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Drupal\freehk_world\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\twllc_world\TwllcWorldSalutation;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Controller for the salutation message
 *
 * @author arthur
 */


class FreehkWorldController extends ControllerBase {
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
  public function freehkWorld() {
    return [
      '#markup' => $this->salutation->getSalutation(),
    ];
  }
  
  public function course() {
    return [
      '#markup' => $this->t("Course list"),
    ];
  }
  
  public function gold() {
    return [
      '#markup' => $this->t("Gold Material list"),
    ];
  }
  
  public function silver() {
    return [
      '#markup' => $this->t("Silver Material list"),
    ];
  }
  
  public function bronze() {
    return [
      '#markup' => $this->t("Bronze Material list"),
    ];
  }
  
  
  public function opencontent() {
    return [
      '#markup' => $this->t("Opencontent Material list"),
    ];
  }
}
