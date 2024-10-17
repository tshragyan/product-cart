<?php


namespace App\Dto;


class CreateProductDto
{
    public function __construct(
        public string $title,
        public int $price
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            title: $data['title'],
            price: $data['price'],
        );
    }
}
