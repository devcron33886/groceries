<?php

namespace App\Http\Livewire;

use App\Basket\Contracts\BasketInterface;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class NavigationComponent extends Component
{
    public $searchQuery='';

    protected $listeners= [
        'cart.updated' => '$refresh'
    ];
    public function clearSearch()
    {
        $this->searchQuery='';
    }
    public function getBasketProperty(BasketInterface $basket): BasketInterface
    {
        return $basket;
    }
    public function render(): Factory|View|Application
    {
        /*sleep(1);
        $products=Product::search($this->searchQuery)->paginate(10);*/
        return view('livewire.navigation-component',/*compact('products')*/);
    }
}
