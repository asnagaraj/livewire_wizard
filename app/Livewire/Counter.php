<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Counter extends Component
{
    public $count = 1;
    public $name,$email,$password;
    public $success = '';

    protected $rules = [
        'name'=>'required',
        'email' =>'required',
        'password'=>'required'
    ];

    public function create()
    {
        $this->validate();
        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
        ]);

        $this->success = 'User Created Successfully';

        $this->clearForm();
    }

    public function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    
    public function render()
    {
        $user = User::where('email','admin@gmail.com')->first();
        return view('livewire.counter')->with([
            'author' => $user->name
        ]);
    }
}
