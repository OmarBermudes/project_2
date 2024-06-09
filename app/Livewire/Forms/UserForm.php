<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required|email|unique:users')]
    public $email = '';

    public function store(){
        $this->validate();

        return User::firstOrNew(['email' =>  $this->email ]);
    }
}
