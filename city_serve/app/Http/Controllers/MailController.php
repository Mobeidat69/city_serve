<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\DemoMail;
use App\Models\Applications\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function confirmation($id, $appId)
    {
        $app = Application::find($appId);
        $app->update([
            'status' => 1,
        ]);
        $user = User::find($id);
        $mailData = [
            'name' => $user->name,
        ];
        $mailSent = Mail::to($user->email)->send(new DemoMail($mailData, 'confirmation'));
        if ($mailSent)
            return redirect()->route('view.applications')->with('response', 'a proper email was send.');
    }

    public function reject($id, $appId)
    {
        $app = Application::find($appId);
        $app->update([
            'status' => 2,
        ]);
        $user = User::find($id);
        $mailData = [
            'name' => $user->name,
        ];
        $mailSent = Mail::to($user->email)->send(new DemoMail($mailData, 'rejection'));
        if ($mailSent)
            return redirect()->route('view.applications')->with('response', 'a proper email was send.');
    }
}
