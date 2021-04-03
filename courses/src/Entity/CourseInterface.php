<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\courses\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Represents a Course entity.
 */
interface CourseInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the Course name.
   *
   * @return string
   *   The course name.
   */
  public function getName();

  /**
   * Sets the Course name.
   *
   * @param string $name
   *   The course name.
   *
   * @return \Drupal\courses\Entity\CourseInterface
   *   The called Course entity.
   */
  public function setName($name);

  /**
   * Gets the Course number.
   *
   * @return int
   *   The course number.
   */
  public function getCourseNumber();

  /**
   * Sets the Course number.
   *
   * @param int $number
   *   The course number.
   *
   * @return \Drupal\courses\Entity\CourseInterface
   *   The called Course entity.
   */
  public function setCourseNumber($number);

  /**
   * Gets the Course remote ID.
   *
   * @return string
   *   The course remote ID.
   */
  public function getRemoteId();

  /**
   * Sets the Course remote ID.
   *
   * @param string $id
   *   The course remote ID.
   *
   * @return \Drupal\courses\Entity\CourseInterface
   *   The called Course entity.
   */
  public function setRemoteId($id);

  /**
   * Gets the Course source.
   *
   * @return string
   *   The course source.
   */
  public function getSource();

  /**
   * Sets the Course source.
   *
   * @param string $source
   *   The course source.
   *
   * @return \Drupal\courses\Entity\CourseInterface
   *   The called Course entity.
   */
  public function setSource($source);

  /**
   * Gets the Course creation timestamp.
   *
   * @return int
   *   The created time.
   */
  public function getCreatedTime();

  /**
   * Sets the Course creation timestamp.
   *
   * @param int $timestamp
   *   The created time.
   *
   * @return \Drupal\courses\Entity\CourseInterface
   *   The called Course entity.
   */
  public function setCreatedTime($timestamp);

}