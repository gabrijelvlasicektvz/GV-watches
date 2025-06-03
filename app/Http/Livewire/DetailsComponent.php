<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Review;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $product;
    public function mount($slug)
    {
        $this->slug=$slug;
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in cart!');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id==$product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                return;
            }
        }
    }
    public function render()
    {
        $product=Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();
        $nproducts=Product::latest()->take(4)->get();
        $reviews = Review::where('product_id', $this->product->id)
        ->latest()
        ->with('user')
        ->get();
        $averageRating = Review::where('product_id', $this->product->id)->avg('rating');
        return view('livewire.details-component', ['product'=>$product, 'rproducts'=>$rproducts, 'nproducts'=>$nproducts, 'reviews' => $reviews,'averageRating' => $averageRating]);
    }
}
