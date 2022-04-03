<?php
declare(strict_types=1);

namespace App\Models;


use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCanCreateClient()
    {
        $client = new Client('Новиков', 'Игорь', 'Васильевич');

        $this->assertInstanceOf(Client::class, $client);
    }

    public function testCreateOneClient()
    {
        $id = 1;
        $surname = 'Новиков';
        $name = 'Игорь';
        $patronymic = 'Васильевич';

        $client = new Client($surname, $name, $patronymic);

        $this->assertEquals($id, $client->id());
        $this->assertEquals($surname, $client->surname());
        $this->assertEquals($name, $client->name());
        $this->assertEquals($patronymic, $client->patronymic());
    }
}
