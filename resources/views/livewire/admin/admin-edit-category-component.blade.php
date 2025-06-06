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
                    <span></span>  {{ __('messages.edit_category') }}
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
                                 {{ __('messages.edit_category') }}
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.categories') }}" class="btn btn-success float-end">{{ __('messages.all_categories') }}</a>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                <form wire:submit.prevent="updateCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{ __('messages.enter_category_name') }}" wire:model="name" wire:keyup="generateSlug"/>
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">{{ __('messages.slug') }}</label>
                                        <input type="text" name="slug" class="form-control" placeholder="{{ __('messages.enter_category_slug') }}" wire:model="slug"/>
                                        @error('slug')
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
