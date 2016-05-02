<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 28/04/2016
 * Time: 14:13
 */

namespace ItbTest;

use Itb\model\attendence;

class attendanceTest extends \PHPUnit_Framework_TestCase
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

    public function testCanGetUserName()
    {
        // Arrange
        $aten = new attendence();
        $expectedResult = 0;

        // Act
        $result = $aten->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetusername()
    {
        // Arrange
        $aten = new attendence();
        $expectedResult = 'matt';
        $aten->setUsername($expectedResult);

        // Act
        $result = $aten->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testCanGetonebyusername()
    {
        // Arrange
        $aten = new attendence();
        $expectedResult = 'cathal';

        // Act
        $result = $aten->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result->getUsername());
    }
}
