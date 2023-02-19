<?php

namespace Tests\Feature;

use App\Box;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    # Test function for Box class
    public function testBoxContents()
    {
        $box = new Box(['toy']);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }
}
