<?php
declare(strict_types=1);

namespace App\Models;


class Client
{
    private int $id;
    private string $surname;
    private string $name;
    private string $patronymic;

    public function __construct(string $surname, string $name, string $patronymic)
    {
        $this->surname = $this->upFirstLetter($surname);
        $this->name = $this->upFirstLetter($name);
        $this->patronymic = $this->upFirstLetter($patronymic);

        $filePath = __DIR__  . '/../../files/client.txt';
        $content = file_get_contents($filePath);

        if (mb_stripos($content, "{$this->surname}|{$this->name}|{$this->patronymic}") === false) {
            $pattern = "#([\d]+).+?#i";
            if (preg_match($pattern, $content, $matches)) {
                $this->id = (int)$matches[1] + 1;
            } else {
                $this->id = 1;
            }

            $handler = fopen($filePath, 'a');
            $string = "{$this->id}|"
                . "{$this->surname}|"
                . "{$this->name}|"
                . "{$this->patronymic}\r\n";
            fwrite($handler, $string);
            fclose($handler);
        }  else {
            $pattern = "#([\d]+)\|{$this->surname}\|{$this->name}\|{$this->patronymic}#i";
            if (preg_match($pattern, $content, $matches)) {
                $this->id = (int)$matches[1];
            }
        }
    }

    private function upFirstLetter(string $string, string $encoding = 'utf-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding)
            . mb_substr($string, 1, null, $encoding);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function patronymic(): string
    {
        return $this->patronymic;
    }
}
