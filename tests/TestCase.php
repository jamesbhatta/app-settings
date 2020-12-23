<?php

namespace JamesBhatta\AppSettings\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setup();
    }
  
}
