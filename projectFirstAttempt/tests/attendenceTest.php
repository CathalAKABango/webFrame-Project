<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 28/04/2016
 * Time: 14:13
 */

namespace ItbTest;


use Itb\model\attendence;

class attendenceTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
{
    // Arrange
    $aten = new attendence();
    $expectedResult = 0;

    // Act
    $result = $aten->getId();

    // Assert
    $this->assertEquals($expectedResult, $result);
}

}