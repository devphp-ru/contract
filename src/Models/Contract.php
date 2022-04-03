<?php
declare(strict_types=1);

namespace App\Models;


class Contract
{
    private string $contractId;
    private int $productId;
    private string $beginDate;
    private string $endDate;
    private string $comment;
    private int $price;
    private Employee $employee;
    private Client $client;

    public function __construct(
        string $contractId,
        int $productId,
        string $endDate,
        string $comment,
        int $price,
        string $clientSurname,
        string $clientName,
        string $clientPatronymic,
        string $employeeSurname,
        string $employeeName,
        string $employeePatronymic
    ) {
        $this->contractId = $contractId;
        $this->productId = $productId;
        $this->beginDate = date('d.m.Y H:i');
        $this->endDate = $endDate;
        $this->comment = $comment;
        $this->price = $price;
        $this->client = new Client(
            $clientSurname,
            $clientName,
            $clientPatronymic
        );
        $this->employee = new Employee(
            $employeeSurname,
            $employeeName,
            $employeePatronymic
        );



        $filePath = __DIR__ . '/../../files/contract.txt';
        $content = file_get_contents($filePath);
        if (mb_stripos($content, $this->contractId) !== false) {
            throw new \Exception("Контракт {$this->contractId()} уже создан");
        }

        $string = "{$this->contractId}|"
            . "{$this->productId}|"
            . "{$this->client->id()}|"
            . "{$this->employee->id()}|"
            . "{$this->beginDate}|"
            . "{$this->endDate}|"
            . "{$this->comment}|"
            . "{$this->price}\r\n";

        $handler = fopen($filePath, 'a');
        fwrite($handler, $string);
        fclose($handler);
    }

    public function contractId(): string
    {
        return $this->contractId;
    }

    public function productId(): int
    {
        return $this->productId;
    }

    public function beginDate(): string
    {
        return $this->beginDate;
    }

    public function endDate(): string
    {
        return $this->endDate;
    }

    public function comment(): string
    {
        return $this->comment;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function employee(): Employee
    {
        return $this->employee;
    }
}
