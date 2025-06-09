<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\WhatsAppValidationService;
use Illuminate\Support\Facades\Log;

class APIController extends Controller
{
    public function checkUsername(Request $request)
    {
        $validated = $request->validate(['username' => 'required|string']);

        $exists = User::where('user_name', $validated['username'])->exists();

        return response()->json([
            'valid' => !$exists,
            'message' => $exists ? __('Username is already taken') : __('Username is Available')
        ]);
    }

    public function checkEmail(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email']);

        $exists = User::where('email', $validated['email'])->exists();

        return response()->json([
            'valid' => !$exists,
            'message' => $exists ? __('Email is already taken') : __('Email is available')
        ]);
    }

    public function validateWhatsApp(Request $request, WhatsAppValidationService $service)
    {
        try {
            $validated = $request->validate(['number' => 'required|numeric']);

            $result = $service->validateNumber($validated['number']);

            Log::info('WhatsApp validation result:', $result);

            return response()->json($result);
        } catch (\Exception $e) {
            Log::error('WhatsApp validation error in controller: ' . $e->getMessage());
            return response()->json([
                'valid' => false,
                'message' => 'Validation service unavailable'
            ], 500);
        }
    }
}
