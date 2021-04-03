<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\courses\Entity;

/**
 * Description of CourseType
 *
 * @author arthur
 */
use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Course type configuration entity type.
 *
 * @ConfigEntityType(
 *   id = "course_type",
 *   label = @Translation("Course type"),
 *   handlers = {
 *     "list_builder" = "Drupal\courses\CourseTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\courses\Form\CourseTypeForm",
 *       "edit" = "Drupal\courses\Form\CourseTypeForm",
 *       "delete" = "Drupal\courses\Form\CourseTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "course_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "course",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/course_type/{course_type}",
 *     "add-form" = "/admin/structure/course_type/add",
 *     "edit-form" = "/admin/structure/course_type/{course_type}/edit",
 *     "delete-form" = "/admin/structure/course_type/{course_type}/delete",
 *     "collection" = "/admin/structure/course_type"
 *   },
 *   config_export = {
 *     "id",
 *     "label"
 *   }
 * )
 */
class CourseType extends ConfigEntityBundleBase implements CourseTypeInterface {

  /**
   * The Course type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Course type label.
   *
   * @var string
   */
  protected $label;

}
