<?php
declare(strict_types=1);

namespace App\Models;


use PHPUnit\Framework\TestCase;

class ContractTest extends TestCase
{
    private Contract $contract;
    private array $post = [
        'client_surname' => 'Новиков',
        'client_name' => 'Игорь',
        'client_patronymic' => 'Васильевич',
        'employee_surname' => 'Петров',
        'employee_name' => 'Иван',
        'employee_patronymic' => 'Иванович',
        'number_contract' => '1-03-04-2022-t1',
        'price_contract' => '10000',
        'product_id' => '1',
        'delivery_time' => '29.04.2022',
        'comment' => 'Комментарий....',
    ];

    public function setUp(): void
    {
        $this->contract = new Contract(
            $this->post['number_contract'],
            (int)$this->post['product_id'],
            $this->post['delivery_time'],
            $this->post['comment'],
            (int)$this->post['price_contract'],
            $this->post['client_surname'],
            $this->post['client_name'],
            $this->post['client_patronymic'],
            $this->post['employee_surname'],
            $this->post['employee_name'],
            $this->post['employee_patronymic']
        );
    }

    public function testCanCreateContract()
    {
        $this->assertInstanceOf(Contract::class, $this->contract);

        $this->assertEquals($this->post['number_contract'], $this->contract->contractId());
        $this->assertEquals($this->post['product_id'], $this->contract->productId());
        $this->assertEquals($this->post['delivery_time'], $this->contract->endDate());
        $this->assertEquals($this->post['comment'], $this->contract->comment());
        $this->assertEquals($this->post['price_contract'], $this->contract->price());

        $this->assertEquals($this->post['client_surname'], $this->contract->client()->surname());
        $this->assertEquals($this->post['client_name'], $this->contract->client()->name());
        $this->assertEquals($this->post['client_patronymic'], $this->contract->client()->patronymic());

        $this->assertEquals($this->post['employee_surname'], $this->contract->employee()->surname());
        $this->assertEquals($this->post['employee_name'], $this->contract->employee()->name());
        $this->assertEquals($this->post['employee_patronymic'], $this->contract->employee()->patronymic());
    }
}
