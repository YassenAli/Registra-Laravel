<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppValidationService {
    private $apiKey;
    private $apiHost;

    public function __construct()
    {
        $this->apiKey = config('services.rapidapi.key');
        $this->apiHost = 'whatsapp-number-validator3.p.rapidapi.com';
    }

    public function validateNumber($phone)
    {
        try {
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => $this->apiHost,
                'X-RapidAPI-Key' => $this->apiKey
            ])->post('https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken', [
                'phone_number' => $phone
            ]);

            $data = $response->json();
            Log::info('WhatsApp API Response:', $data); // Log the response for debugging

            // Check if the response has the expected structure
            if (isset($data['valid'])) {
                return [
                    'valid' => $data['valid'],
                    'message' => $data['message'] ?? ($data['valid'] ? 'Valid WhatsApp number' : 'Invalid WhatsApp number')
                ];
            }

            // If the response doesn't have the expected structure, check for common response patterns
            if (isset($data['status'])) {
                return [
                    'valid' => $data['status'] === 'valid',
                    'message' => $data['message'] ?? ($data['status'] === 'valid' ? 'Valid WhatsApp number' : 'Invalid WhatsApp number')
                ];
            }

            // If we can't determine validity from the response, return invalid
            return [
                'valid' => false,
                'message' => 'Unable to validate WhatsApp number'
            ];

        } catch (\Exception $e) {
            Log::error('WhatsApp validation error: ' . $e->getMessage());
            return [
                'valid' => false,
                'message' => 'API connection failed'
            ];
        }
    }
}
