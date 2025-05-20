<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\WhatsAppValidationService;

class APIController extends Controller
{
    public function checkUsername(Request $request)
    {
        $validated = $request->validate(['username' => 'required|string']);

        $exists = User::where('user_name', $validated['username'])->exists();

        return response()->json([
            'valid' => !$exists,
            'message' => $exists ? __('validation.username_taken') : __('validation.username_available')
        ]);
    }

    public function checkEmail(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email']);

        $exists = User::where('email', $validated['email'])->exists();

        return response()->json([
            'valid' => !$exists,
            'message' => $exists ? __('validation.email_taken') : __('validation.email_available')
        ]);
    }

    public function validateWhatsApp(Request $request, WhatsAppValidationService $service)
    {
        $validated = $request->validate(['number' => 'required|numeric']);

        $result = $service->validateNumber($validated['number']);

        return response()->json([
            'valid' => $result['status'] === 'valid',
            'message' => $result['message']
        ]);
    }
}
