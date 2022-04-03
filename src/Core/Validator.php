<?php
declare(strict_types=1);

namespace App\Core;


class Validator
{
    private array $data = [];
    private array $errors = [];

    public function load(array $data): object
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }

        return $this;
    }

    public function clear(): object
    {
        foreach ($this->data as $key => $value) {
            $this->data[$key] = $this->clearTag($value);
        }

        return $this;
    }

    public function checkEmpty(): object
    {
        foreach ($this->data as $key => $value) {
            if ($this->isEmpty((string)$value)) {
                $this->errors[] = 'Все поля обязательны для заполнения';
                break;
            }
        }

        return $this;
    }

    public function isEmpty(string $value): bool
    {
        return empty(trim($value)) ? true : false;
    }

    public function clearTag($value): string
    {
        return htmlspecialchars(strip_tags(trim((string)$value)));
    }

    public function getArray(): array
    {
        return $this->data;
    }

    public function getErrors(): ?array
    {
        return !empty($this->errors) ? $this->errors : null;
    }
}
