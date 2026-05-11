<?php

namespace Tests\Support;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

abstract class FeatureTestCase extends CIUnitTestCase
{
    use FeatureTestTrait;
}