<?php


namespace App\Services;


use App\Contracts\FakeApiInterface;
use App\Dto\CreateProductDto;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlatziService implements FakeApiInterface
{
    const PRODUCTS_LINK = '/products';
    const LOG_KEY = 'PLATZYLOGKEY';

    private $url = 'https://api.escuelajs.co/api/v1';

    public function getData(): array|null
    {
        try {
            $response = Http::get($this->url . self::PRODUCTS_LINK);
        } catch (\Throwable $e) {
            Log::error($e->getMessage() . ' url: ' . $this->url . self::PRODUCTS_LINK . ' key: ' . self::LOG_KEY);
            return null;
        }

        if ($response->successful()) {
            $data = [];
            $items = json_decode($response->body(), true);

            foreach ($items as $item) {
                $data[] = CreateProductDto::fromRequest(['title' => $item['title'], 'price' => $item['price']]);
            }

        } else {
            Log::error('request failed with code' . $response->status() . ' url: ' . $this->url . self::PRODUCTS_LINK . ' key: ' . self::LOG_KEY);
            return null;
        }

        return $data;
    }
}
