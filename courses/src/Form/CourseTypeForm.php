<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\courses\Form;

/**
 * Description of CourseTypeForm
 *
 * @author arthur
 */
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form handler for creating/editing CourseType entities.
 */
class CourseTypeForm extends EntityForm {

  /**
   * CourseTypeForm constructor.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\courses\Entity\CourseTypeInterface $course_type */
    $course_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $course_type->label(),
      '#description' => $this->t('Label for the Course type.'),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $course_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\courses\Entity\CourseType::load',
      ],
      '#disabled' => !$course_type->isNew(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $course_type = $this->entity;
    $status = $course_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger->addMessage($this->t('Created the %label Course type.', [
          '%label' => $course_type->label(),
        ]));
        break;

      default:
        $this->messenger->addMessage($this->t('Saved the %label Course type.', [
          '%label' => $course_type->label(),
        ]));
    }
    $form_state->setRedirectUrl($course_type->toUrl('collection'));
  }

}

