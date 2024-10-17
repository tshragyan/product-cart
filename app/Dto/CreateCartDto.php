<?php


namespace App\Dto;


class CreateCartDto
{
    public function __construct(
        public int $product_id,
        public int $quantity
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            product_id: $data['product_id'],
            quantity: $data['quantity'],
        );
    }
}
