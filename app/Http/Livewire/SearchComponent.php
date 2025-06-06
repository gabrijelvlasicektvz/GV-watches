<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Cart;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    public $pageSize=10;
    public $orderBy="Default Sorting";

    public $q;
    public $search_term;

    public function mount()
    {
        $this->fill(request()->only('q'));
        $this->search_term='%'.$this->q . '%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in cart!');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }
    public function changePageSize($size)
    {
        $this->pageSize=$size;
    }
    public function changeOrderBy($order)
    {
        $this->orderBy=$order;
    }
    public function render()
    {
        if($this->orderBy=='Price: Low to High')
        {
            $products=Product::where('name','like',$this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Price: High to Low')
        {
            $products=Product::where('name','like',$this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy=='Sort by Newness')
        {
            $products=Product::where('name','like',$this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }
        else
        {
            $products=Product::where('name','like',$this->search_term)->paginate($this->pageSize);
        }
        $categories=Category::orderBy('name', 'ASC')->get();
        $nproducts=Product::latest()->take(4)->get();
        return view('livewire.search-component', ['products'=>$products, 'categories'=>$categories, 'nproducts'=>$nproducts]);
    }
}
