<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Product;

class CartComponent extends Component
{

    public function increaseQuantity($rowId)
    {
        $cartItem = Cart::instance('cart')->get($rowId);
        $product = Product::where('id', $cartItem->id)->first();

        if (!$product) {
            session()->flash('error_message', 'Product is not found.');
            return;
        }

        if ($cartItem->qty + 1 > $product->quantity) {
            session()->flash('error_message', 'Unfortunately, there are only ' . $product->quantity . ' samples of the product "' . $product->name . '".');
            return;
        }

        $qty = $cartItem->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function destroy($id)
    {
        Cart::instance('cart')->remove($id);
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed!');
    }

    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
