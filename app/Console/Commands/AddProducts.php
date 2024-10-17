<?php

namespace App\Console\Commands;

use App\Contracts\FakeApiInterface;
use App\Services\ProductService;
use Illuminate\Console\Command;

class AddProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(FakeApiInterface $fakeApi, ProductService $productService)
    {
        $items = $fakeApi->getData();

        if ($items) {
            foreach ($items as $item) {
                if (!$productService->findByTitle($item->title)) {
                    $productService->create($item);
                }
            }
        }

    }
}
