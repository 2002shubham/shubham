<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Mail\EmailSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function viewEmailPage()
    {
        return view('emailform');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to($request->input('email'))->send(new SendEmail($data));
    }

    public function email()
    {
        return view('sendemailform');
    }

    public function send(Request $request)
    {
        // This code is used when single attechments sended
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . '.'.$file->getClientOriginalExtension();
            $file->move(public_path('Attachments'), $fileName);

            $data = [
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ];

            Mail::to($request->input('email'))->send(new EmailSend($data,$fileName));

            return redirect('sendemail')->with('success','Successfully Send Email With Attachments');
        }

        // This code is used when multiple attachments sended

        // $fileName = [];
        // if ($request->hasFile('file')) {
        //     foreach ($request->file('file') as $file) {
        //         $name = time() . '_' . '.' . $file->getClientOriginalExtension();
        //         $file->move(public_path('Attachments'), $name);
        //         $fileName[] = $name;
        //     }

        //     $data = [
        //         'email' => $request->input('email'),
        //         'message' => $request->input('message'),
        //     ];

        //     Mail::to($request->input('email'))->send(new EmailSend($data, $fileName));
        //     return redirect('email')->with('success', 'Successfully Send Email With Attachments');
        // }
    }
}
