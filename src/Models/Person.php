<?php
declare(strict_types=1);

namespace App\Models;


use App\Core\Helper;

abstract class Person
{
    private int $id;
    private string $surname;
    private string $name;
    private string $patronymic;

    public function __construct(string $surname, string $name, string $patronymic)
    {
        $this->surname = Helper::upFirstLetter($surname);
        $this->name = Helper::upFirstLetter($name);
        $this->patronymic = Helper::upFirstLetter($patronymic);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function patronymic(): string
    {
        return $this->patronymic;
    }
}
