<?php


namespace App\Dto;


class CreateOrderDto
{
    public function __construct(
        public array $product_ids,
        public array $quantities,
        public int $price
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            product_ids: $data['product_ids'],
            quantities: $data['quantities'],
            price: $data['price'],
        );
    }
}
