<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PdfMailController extends Controller
{
    public function index(Request $request)
    {
        {
            $data["email"] = "nagarajan.s@synamen.com";
            $data["title"] = "Email Send to Attachemt";
            $data["body"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
     
            $files = [
                public_path('attachments/unnamed.jpg'),
                public_path('attachments/bhuvanesh.pdf'),
            ];
      
            Mail::send('mail.demo_mail', $data, function($message)use($data, $files) {
                $message->to($data["email"])
                        ->subject($data["title"]);
     
                foreach ($files as $file){
                    $message->attach($file);
                }            
            });
    
            echo "Mail successfully sent!";
        }       
    }
}
