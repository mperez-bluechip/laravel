<?php


class AssertTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testAssert()
    {
      $this->assertArrayHasKey('myKey', array('myKey' => 'myArray'));
    }
}
