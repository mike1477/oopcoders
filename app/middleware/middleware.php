<?php

namespace App\middleware;

/**
 *
 */
class Middleware
{
  protected $container;

  function __construct($container)
  {
    $this->container = $container;
  }
}
