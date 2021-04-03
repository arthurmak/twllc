<?php

namespace Drupal\twllc_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\twllc_world\TwllcWorldSalutation;
use Drupal\Core\Form\FormStateInterface;


/**
 * Twllc World Salutation block.
 *
 * @Block(
 *  id = "twllc_world_salutation_block",
 *  admin_label = @Translation("Twllc world salutation"),
 * )
 */
class TwllcWorldSalutationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The salutation service.
   *
   * @var \Drupal\twllc_world\TwllcWorldSalutation
   */
  protected $salutation;

  /**
   * Constructs a TwllcWorldSalutationBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\twllc_world\TwllcWorldSalutation $salutation
   *   The salutation service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, TwllcWorldSalutation $salutation) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->salutation = $salutation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('twllc_world.salutation')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    //$sal_config = $this->getConfiguration('twllc_world.custom_salutaton');
    $config = $this->getConfiguration();
    
    if ($config['enabled']) {
      $sconfig = \Drupal::config('twllc_world.custom_salutation');
      return[
        '#markup' => $sconfig->get('salutation'),
      ];
    }
    else {    
      return [
      '#markup'  => $this->salutation->getSalutation(),
      ];
    }
  }
  
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(){
    return [
      'enabled'=> 1,
    ];
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    
    $form = parent::blockForm($form, $form_state);
    
    $config = $this->getConfiguration();
    
    $form['enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this -> t('Enabled'),
      '#description' => $this -> t('Check this box if your want to enable this feature.'),
      '#default_value' => $config['enabled'],
    ];
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['enabled'] = $form_state->getValue('enabled');
  }

}
