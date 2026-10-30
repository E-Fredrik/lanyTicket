<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationEmail;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ticket_type' => ['required', Rule::in(['standard', 'premium'])],
            'quantity' => ['required', 'integer', 'between:1,4'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        // $registrationEmail = new RegistrationEmail($validated['email'], $validated['full_name']);
        // $registrationEmail->send($registrationEmail);

        $registration = Registration::create([...$validated, 'updates' => $request->boolean('updates')]);

        Mail::to($registration->email)->send(new RegistrationEmail($registration));

        return redirect()->route('home')->with('status', 'Registration saved.');
    }
}
