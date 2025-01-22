<?php
namespace App\Console\Commands;

use App\Models\FakeProductTest;
use Illuminate\Console\Command;
use App\Services\FakeProductService;

class SeedFakeProducts extends Command
{
    protected $signature = 'seed:fake-products';
    protected $description = 'Seed fake products into the database';

    protected $fakeProductService;

    public function __construct(FakeProductService $fakeProductService)
    {
        parent::__construct();
        $this->fakeProductService = $fakeProductService;
    }

    public function handle()
    {
        $products = $this->fakeProductService->getProducts();

        foreach ($products as $productData) {
            FakeProductTest::create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'category' => $productData['category'],
                'image' => $productData['image'],
            ]);
        }

        $this->info('Fake products seeded successfully!');
    }
}
?>