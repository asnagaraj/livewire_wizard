<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Models\User as users;
use Hash;

class User extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('User Record Working...');
        
        
        $user = new users;
        $user->name = 'Nagarajan';
        $user->email = 'nagarajan' .now().'@gmail.com';
        $user->password =Hash::make('123456');
        $user->type = 2;
        $user->save();

        $this->comment('User Created SuccessFully');

        $this->comment('Email Send to User...');

        Mail::raw('Hi, welcome user!', function (Message $message) {
            $message->to('nagarajan.s@synamen.com')->subject('Raw Mail Send Queue');
        });

        $this->comment('Email Send To User Successfully...');

    }
}
