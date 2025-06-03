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
                    <span></span>{{ __('messages.all_products') }}
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
                                    {{ __('messages.all_products') }}
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.product.add') }}" class="btn btn-success float-end">{{ __('messages.add_new_product') }}</a>
                                        </div>
                                </div>
                            </div>
                            <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('messages.image') }}</th>
                                            <th>{{ __('messages.name') }}</th>
                                            <th>{{ __('messages.stock') }}</th>
                                            <th>{{ __('messages.price') }}</th>
                                            <th>{{ __('messages.category') }}</th>
                                            <th>{{ __('messages.date') }}</th>
                                            <th>{{ __('messages.popular') }}</th>
                                            <th>{{ __('messages.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=($products->currentPage()-1)*$products->perPage();
                                        @endphp
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{ $product->name }}" width="60" /></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>{{$product->is_popular==1 ? 'Yes':'No'}}</td>
                                            <td>
                                                <a href="{{ route('admin.product.edit', ['product_id'=>$product->id])}}" class="text-info">{{ __('messages.edit') }}</a>
                                                <a href="#" onclick="deleteConfirmation({{ $product->id }})" class="text-danger">{{ __('messages.delete') }}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
</div>
<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="col-md-12 text-center">
                    <h4 class="pb-3">{{ __('messages.delete_confirm_title') }}</h4>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">{{ __('messages.cancel') }}</button>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct()">{{ __('messages.delete') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function deleteConfirmation(id)
    {
        @this.set('product_id', id);
        $('#deleteConfirmation').modal('show');
    }
    function deleteProduct()
    {
        @this.call('deleteProduct');
        $('#deleteConfirmation').modal('hide');
    }
</script>
@endpush
