<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 02/05/2016
 * Time: 09:16
 */

namespace ItbTest;

use Itb\model\technique;

class techniqueTest extends \PHPUnit_Framework_TestCase
{

    public function testCanGetId()
    {
        // Arrange
        $st = new technique();
        $expectedResult = 0;

        // Act
        $result = $st->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetDescription()
    {
        // Arrange
        $aten = new technique();
        $expectedResult = 0;

        // Act
        $result = $aten->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testSetDescription()
    {
        // Arrange
        $aten = new technique();
        $expectedResult = 'matt';
        $aten->setDescription($expectedResult);

        // Act
        $result = $aten->getDescription();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
