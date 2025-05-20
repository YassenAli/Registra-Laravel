<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Mail;
use Exception;

class RegistrationController extends Controller
{
    public function show()
    {
        return view('registration.index');
    }

    public function store(RegistrationRequest $request, FileUploadService $uploader)
    {
        try {
            // Handle file upload
            // $filename = $this->fileUploader->upload($request->file('user_image'));
            $filename = $uploader->upload($request->file('user_image'));

            // Create user
            $user = User::create([
                'full_name' => $request->full_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'address' => $request->address,
                'password' => bcrypt($request->password),
                'user_image' => $filename,
            ]);

            // Send email
                    // Send email
        Mail::send('emails.new_user', ['user' => $user], function ($message) {
            $message->to(config('mail.admin_email'))
                    ->subject(__('New Registered User'));
        });

        $user->save();

        return redirect()->route('registration.success')
                            ->with('success', __('registration.success', ['name' => $user->full_name]));

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // public function store(RegistrationRequest $request, FileUploadService $uploader)
    // {
    //     $validated = $request->validated();

    //     // Upload file
    //     $filename = $uploader->upload($request->file('user_image'));

    //     // Create user
    //     $user = User::create([
    //         'full_name' => $validated['full_name'],
    //         'user_name' => $validated['user_name'],
    //         'email' => $validated['email'],
    //         'phone' => $validated['phone'],
    //         'whatsapp' => $validated['whatsapp'],
    //         'address' => $validated['address'],
    //         'password' => bcrypt($validated['password']),
    //         'user_image' => $filename,
    //     ]);

    //     // Send email
    //     Mail::send('emails.new_user', ['user' => $user], function ($message) {
    //         $message->to(config('mail.admin_email'))
    //                 ->subject(__('New Registered User'));
    //     });

    //     return redirect()->route('registration.success')
    //                         ->with('success', __('registration.success', ['name' => $user->full_name]));
    // }
}
