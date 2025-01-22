<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class FakeProductService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = 'https://fakestoreapi.com/products';
    }

    public function getProducts()
    {
        $response = Http::get($this->apiUrl);
        return $response->json();
    }
}
?>