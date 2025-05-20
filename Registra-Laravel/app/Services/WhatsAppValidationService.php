<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppValidationService {
    public function validateNumber($phone)
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'whatsapp-number-validator3.p.rapidapi.com',
            'X-RapidAPI-Key' => config('services.rapidapi.key')
        ])->post('https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken', [
            'phone_number' => $phone
        ]);

        return $response->json();
    }
}