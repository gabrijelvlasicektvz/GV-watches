<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in cart!');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $lproducts=Product::orderby('created_at','DESC')->get()->take(8);
        $fproducts=Product::where('featured',1)->inRandomOrder()->get()->take(8);
        $pproducts=Product::where('is_popular',1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['lproducts'=>$lproducts, 'fproducts'=>$fproducts, 'pproducts'=>$pproducts]);
    }
}
