<?php


namespace App\Models;


use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testCanCreateEmployee()
    {
        $employee = new Employee('Петров', 'Иван', 'Иванович');
        $this->assertInstanceOf(Employee::class, $employee);
    }

    public function testCanCreateOneEmployee()
    {
        $employee = new Employee('Петров', 'Иван', 'Иванович');

        $id = 1;
        $surname = 'Петров';
        $name = 'Иван';
        $patronymic = 'Иванович';

        $this->assertEquals($id, $employee->id());
        $this->assertEquals($surname, $employee->surname());
        $this->assertEquals($name, $employee->name());
        $this->assertEquals($patronymic, $employee->patronymic());
    }
}
