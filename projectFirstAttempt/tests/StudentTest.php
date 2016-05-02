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
    public function testCanGetonebynousername()
    {
        // Arrange
        $st = new Student();
        $expectedResult = '';

        // Act
        $result = $st->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testCanGetonebyusername()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 'cathal';

        // Act
        $result = $st->getOneByUsername($expectedResult);

        // Assert
        $this->assertEquals($expectedResult, $result->getUsername());
    }
    public function testSetusername()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 'matt';
        $st->setUsername($expectedResult);

        // Act
        $result = $st->getUsername();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetpassword()
    {
        // Arrange
            $st = new Student();
        $password = "password";
        $expectedResult = $password;

        $st->setPassword($expectedResult);

            // Act
            $result = $st->getPassword();
        $bool = password_verify("password", $result);
            // Assert
            $this->assertTrue($bool);
    }
    public function testSetcurrGrade()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 'A';

        $st->setCurrentGrade($expectedResult);

        // Act
        $result = $st->getCurrentGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetLastGrade()
    {
        // Arrange
        $st = new Student();
        $expectedResult = 'A';

        $st->setLastGrade($expectedResult);

        // Act
        $result = $st->getLastGrade();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
    public function testSetDateJoined()
    {
        // Arrange
        $st = new Student();
        $expectedResult = '13/03/1990';

        $st->setDateJoined($expectedResult);

        // Act
        $result = $st->getDateJoined();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }
}
