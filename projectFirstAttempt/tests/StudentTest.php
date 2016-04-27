<?php
namespace ItbTest;

use Itb\Model\Student;

class StudentTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetId()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetUserName()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetpassword()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetcurrentGrade()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetlastgrade()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getLastGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetdateJoined()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getDateJoined();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetonebyusername()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 0;

        // Act
        $result = $st->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}