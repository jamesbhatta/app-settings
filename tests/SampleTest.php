<?php

namespace JamesBhatta\AppSettings\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class SampleTests extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function my_first_test()
    {
        $this->assertTrue(true);
    }
}
