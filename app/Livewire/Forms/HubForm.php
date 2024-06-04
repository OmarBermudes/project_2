<?php

namespace App\Livewire\Forms;

use App\Models\Hub;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HubForm extends Form
{
    #[Validate('required|string|min:5|max:100')]
    public $title = '';

    #[Validate('nullable|string')]
    public $description = '';

    public function store($userId, $token, $url){
        $this->validate();

        Hub::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $userId,
            'token' => $token,
            'url' => $url,
        ]);
    }
}
