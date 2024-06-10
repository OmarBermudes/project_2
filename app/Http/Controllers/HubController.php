<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class HubController extends Controller
{

    public $success = false;

    public $userModel = null;
    public $qrCode = null;
    public $token = null;
    public $url = null;

    public function create(Request $request){
        $token = null;
        $message = "";
        try {
            $this->setUserModel($request->email);
            $this->setToken();
            $this->setUrl();
            $this->setQrCode();

            $this->storeHub();

            $this->success = true;
            $token = $this->token;

        } catch (\Exception $e) {
            $this->success = false;
            $message = $e->getMessage();
        }

        // session()->flash('message', $this->message);
        $this->resetAttributes();
        if( $this->success ){
            return view('thank-you',$token);
        }else{
            return Redirect::back()->withErrors($message);
        }

    }

    protected function setUserModel($email){
        $this->userModel = User::firstOrNew(['email' => $email ]);
    }

    protected function setToken(){
        $this->token = $this->tokenGenerator();
    }

    protected function setUrl(){
        $this->url = url("/view-hub",["token"=>$this->token]);
    }

    protected function setQrCode(){
        $this->qrCode = $this->qrGenerator($this->url);
    }

    protected function storeHub(){
        Hub::create([
            'title' => '',
            'description' => '',
            'user_id' => $this->userModel->id,
            'token' => $this->token,
            'url' => $this->url,
            'qr' => $this->qrCode,
        ]);
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

    protected function resetAttributes(){
        $this->userModel = null;
        $this->qrCode = null;
        $this->token = null;
        $this->url = null;
    }

    public function createTwo(){
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::size(150)->generate('https://minhazulmin.github.io/');
        $qrCodes['changeColor'] = QrCode::size(150)->color(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['changeBgColor'] = QrCode::size(150)->backgroundColor(255, 0, 0)->generate('https://minhazulmin.github.io/');
        $qrCodes['styleDot'] = QrCode::size(150)->style('dot')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleSquare'] = QrCode::size(150)->style('square')->generate('https://minhazulmin.github.io/');
        $qrCodes['styleRound'] = QrCode::size(150)->style('round')->generate('https://minhazulmin.github.io/');

        $qrCodes = $qrCodes;
        // return view('livewire.hubs.view-hub', $qrCodes);
    }
}
