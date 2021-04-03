<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\courses\Entity;

/**
 * Description of Course
 *
 * @author arthur
 */
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Course entity.
 *
 * @ContentEntityType(
 *   id = "course",
 *   label = @Translation("Course"),
 *   bundle_label = @Translation("Course type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\courses\CourseListBuilder",
 *
 *     "form" = {
 *       "default" = "Drupal\courses\Form\CourseForm",
 *       "add" = "Drupal\courses\Form\CourseForm",
 *       "edit" = "Drupal\courses\Form\CourseForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *    "route_provider" = {
 *      "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *    }
 *   },
 *   base_table = "course",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "bundle" = "type"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/course/{course}",
 *     "add-form" = "/admin/structure/course/add/{course_type}",
 *     "add-page" = "/admin/structure/course/add",
 *     "edit-form" = "/admin/structure/course/{course}/edit",
 *     "delete-form" = "/admin/structure/course/{course}/delete",
 *     "collection" = "/admin/structure/course",
 *   },
 *   bundle_entity_type = "course_type",
 *   field_ui_base_route = "entity.course_type.edit_form"
 * )
 */
class Course extends ContentEntityBase implements CourseInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCourseNumber() {
    return $this->get('number')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCourseNumber($number) {
    $this->set('number', $number);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getRemoteId() {
    return $this->get('remote_id')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setRemoteId($id) {
    $this->set('remote_id', $id);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getSource() {
    return $this->get('source')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setSource($source) {
    $this->set('source', $source);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Course.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['number'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Number'))
      ->setDescription(t('The Course number.'))
      ->setSettings([
        'min' => 1,
        'max' => 10000,
      ])
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number_unformatted',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['remote_id'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Remote ID'))
      ->setDescription(t('The remote ID of the Course.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('');

    $fields['source'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Source'))
      ->setDescription(t('The source of the Course.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('');

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}