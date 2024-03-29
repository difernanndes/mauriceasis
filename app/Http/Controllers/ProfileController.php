<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);
        $hasImage = public_path('/media/images/profile/'.(strtolower(str_replace(" ", "", $user['registration'])))).'.jpg';
        if($user) {
            return view('profile.index', [
                'user' => $user,
                'hasImage' =>  $hasImage
            ]);
        }

        return redirect()->route('admin');
    }

    public function save(Request $request) {

        $loggedId = intval(Auth::id());
        $user = User::find($loggedId);
        if($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);
            $validator = Validator::make([
                'name' => $data['name'],
                'email' => $data['email']
            ], [
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:100']
            ]);

            // Alteração do Nome
            $user->name = $data['name'];

            // Alteração do email
            if($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();
                if(count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            // Alteração da Senha
            if(!empty($data['password'])) {
                if(strlen($data['password']) >= 4) {
                    if($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => 4
                    ]));
                }
            }

            // Alteração da Imagem
            if($request->hasFile('image') && $request->file('image')->isValid()) {
                $ext = 'jpg'; //$request->image->extension();
                $imageName = strtolower(str_replace(" ", "", $user->registration)).'.'.$ext;
                $request->file('image')->move(public_path('media/images/profile'), $imageName);
            }
            
            if(count($validator->errors()) > 0) {
                return redirect()->route('profile', [
                    'user' => $loggedId,
                ])->withErrors($validator);
            }

            $user->save();
            return redirect()->route('profile')
            ->with('warning', 'Informações alteradas com sucesso!');
        }

        return redirect()->route('home');
    }
}
