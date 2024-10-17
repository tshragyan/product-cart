<?php
namespace App\Contracts;

interface FakeApiInterface
{
    public function getData(): array|null;
}
