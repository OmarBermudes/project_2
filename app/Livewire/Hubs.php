<?php

namespace App\Livewire;

use App\Livewire\Forms\HubForm;
use App\Livewire\Forms\UserForm;
use App\Models\Hub;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Hubs extends Component
{
    public bool $success = false;
    protected $qrCodes = [];
    public $userModel = null;
    public HubForm $hub;
    public UserForm $user;

    public function render()
    {
        return view('livewire.hubs.checkout', ['qrCodes'=>$this->qrCodes]);
    }

    public function viewHub()
    {
        return view('livewire.hubs.view-hub');
    }

    public function create(){
        // try {
        //     //code...
        //     $this->user->store();
        // } catch (\Exception $e) {
        //     var_dump($e->getMessage());
        // }

        $this->userModel = $this->user->store();
        $token = $this->tokenGenerator();
        $url = 'https://www.google.com/search?q='.$token;
        $this->hub->store($this->userModel->id, $token, $url);

        $this->qrCodes['simple'] = $this->qrGenerator($url);

        $this->success = true;

        session()->flash('message', 'Company added successfully');
    }

    public function createTwo(){
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::size(150)->generate('https://minhazulmin.github.io/');
        $qrCodes['changeColor'] = QrCode::size(150)->color(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['changeBgColor'] = QrCode::size(150)->backgroundColor(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['styleDot'] = QrCode::size(150)->style('dot')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleSquare'] = QrCode::size(150)->style('square')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleRound'] = QrCode::size(150)->style('round')->generate('https://minhazulmin.github.io/');

        $this->qrCodes = $qrCodes;
        // return view('livewire.hubs.view-hub', $qrCodes);<z
    }

    protected function tokenGenerator(){
        $token = Str::random(40);
        if(Hub::where('token', $token)->count() > 0 ){
            $this->tokenGenerator();
        }else{
            return $token;
        }
    }

    protected function qrGenerator($url){

        return QrCode::size(150)->generate($url);
    }
}
