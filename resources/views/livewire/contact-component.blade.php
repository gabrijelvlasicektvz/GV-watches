<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">{{ __('messages.home') }}</a>
                    <span></span> {{ __('messages.contact_us') }}
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">{{ __('messages.drop_us_a_line') }}</h3>
                            <p class="text-muted mb-30 text-center font-sm">{{ __('messages.fill_contact_form') }}</p>
                            <div>
                                @if (session()->has('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                            <form wire:submit.prevent="submit" class="contact-form-style text-center" id="contact-form" action="#" method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input wire:model="name" name="name" placeholder="{{ __('messages.first_name') }}" type="text">
                                             @error('name') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input wire:model="email" name="email" placeholder="{{ __('messages.your_email') }}" type="email">
                                            @error('email') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input wire:model="telephone" name="telephone" placeholder="{{ __('messages.your_phone') }}" type="tel">
                                            @error('telephone') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input wire:model="subject" name="subject" placeholder="{{ __('messages.subject') }}" type="text">
                                            @error('subject') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea wire:model="message" name="message" placeholder="{{ __('messages.message') }}"></textarea>
                                            @error('message') <span>{{ $message }}</span> @enderror
                                        </div>
                                        <label>
                                            <input type="checkbox" wire:model="send_copy">
                                            {{ __('messages.send_copy') }}
                                        </label>
                                         <div class="mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}"></div>
                                        </div>
                                        <button class="bijeloo submit submit-auto-width" onclick="handleContactForm() type="submit">{{ __('messages.send_message') }}</button>
                                    </div>
                                </div>
                            </form>
                            @push('scripts')
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            @endpush
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


