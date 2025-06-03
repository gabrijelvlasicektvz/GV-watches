<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">{{ __('messages.home') }}</a>
                    <span></span>{{ __('messages.add_new_product') }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                {{ __('messages.add_new_product') }}
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.products') }}" class="btn btn-success float-end">{{ __('messages.all_products') }}</a>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                <form wire:submit.prevent="addProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{ __('messages.enter_product_name') }}" wire:model="name" wire:keyup="generateSlug"/>
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">{{ __('messages.slug') }}</label>
                                        <input type="text" name="slug" class="form-control" placeholder="{{ __('messages.enter_product_slug') }}" wire:model="slug"/>
                                        @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">{{ __('messages.short_description') }}</label>
                                        <textarea class="form-control" placeholder="{{ __('messages.enter_short_description') }}" name="short_description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">{{ __('messages.description') }}</label>
                                        <textarea class="form-control" placeholder="{{ __('messages.enter_description') }}" name="description" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">{{ __('messages.regular_price') }}</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="{{ __('messages.enter_regular_price') }}" wire:model="regular_price"/>
                                        @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">{{ __('messages.sale_price') }}</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="{{ __('messages.enter_sale_price') }}" wire:model="sale_price"/>
                                        @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">{{ __('messages.enter_sku') }}</label>
                                        <input type="text" name="sku" class="form-control" placeholder="{{ __('messages.enter_sku') }}" wire:model="sku"/>
                                        @error('sku')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">{{ __('messages.stock_status') }}</label>
                                        <select class="form-control" name="stock_status" wire:model="stock_status">
                                            <option value="instock">{{ __('messages.in_stock') }}</option>
                                            <option value="outofstock">{{ __('messages.out_of_stock') }}</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">{{ __('messages.featured') }}</label>
                                        <select class="form-control" name="featured" wire:model="featured">
                                            <option value="0">{{ __('messages.no') }}</option>
                                            <option value="1">{{ __('messages.yes') }}</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">{{ __('messages.quantity') }}</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="{{ __('messages.enter_quantity') }}" wire:model="quantity"/>
                                        @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">{{ __('messages.image') }}</label>
                                        <input type="file" name="image" class="form-control" wire:model="image"/>
                                        @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                        @endif
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">{{ __('messages.select_category') }}</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                       <div class="mb-3 mt-3">
                                        <label for="is_popular" class="form-label">{{ __('messages.is_popular') }}</label>
                                        <select class="form-control" name="is_popular" wire:model="is_popular">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_popular')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">
                                        {{ __('messages.submit') }}
                                    </button>

                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
</div>
