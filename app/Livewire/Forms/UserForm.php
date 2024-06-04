<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required|min:4')]
    public $name = '';

    #[Validate('required|string|min:1|max:100')]
    public $last_name = '';

    #[Validate('required|email|unique:users')]
    public $email = '';

    #[Validate('required|min:6')]
    public $password = '';

    #[Validate('nullable|string')]
    public $country = '';

    #[Validate('nullable|string')]
    public $state = '';

    #[Validate('nullable|string')]
    public $city = '';


    public function store(){
        $this->validate();

        return User::create([
            'name'      => $this->name,
            'last_name' => $this->last_name,
            'email'     => $this->email,
            'password'  => $this->password,
            'country'   => $this->country,
            'state'     => $this->state,
            'city'      => $this->city,
        ]);
    }
}
