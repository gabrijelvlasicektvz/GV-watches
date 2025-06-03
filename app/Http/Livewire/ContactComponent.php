<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Http;

class ContactComponent extends Component
{
    public $recaptchaToken;
    protected $listeners = ['recaptchaCompleted' => 'setRecaptchaToken'];
    public function setRecaptchaToken($token)
    {
        $this->recaptchaToken = $token;
    }
    public $name, $email, $telephone, $subject, $message, $send_copy;
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'telephone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|min:10',
    ];
    public function submitContactForm()
    {
        dd($this->recaptchaToken); // provjera
    }
    public function submit()
    {
        dd($this->recaptchaToken);
        $this->validate();
        // reCAPTCHA provjera (opcionalno)
        if (config('services.recaptcha.secret')) {
                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => config('services.recaptcha.secret'),
                    'response' => $this->recaptchaToken,
            ]);

            $recaptchaData = $response->json();

            dd($response->json()['error-codes']);

            if (!$response->json('success') || ($response->json('score') < 0.5 && isset($response->json()['score']))) {
                session()->flash('error', 'reCAPTCHA verifikacija nije uspjela.');
                return;
            }
        }


        // Spremanje poruke u bazu
        $contact = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Slanje emaila adminu
        Mail::to(config('mail.from.address'))->send(new ContactFormMail($contact));

        // Pošalji kopiju korisniku ako želi
        if ($this->send_copy) {
            Mail::to($this->email)->send(new ContactFormMail($contact));
        }

        $this->reset();
        session()->flash('success', 'Vaša poruka je uspješno poslana!');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => config('services.recaptcha.secret'),
        'response' => request()->input('g-recaptcha-response'),
    ]);
        $recaptchaData = $response->json();
        if (!$recaptchaData['success']) {
            session()->flash('error', 'Molimo potvrdite da niste robot.');
            return;
    }
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}
