<?php 

namespace App\Actions\Fortify;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;


class AuthenticateUser 
{
    use PasswordValidationRules;
    public function authenticate($request)
    {
        $username=$request->post(config('fortify.username'));
        $password=$request->post('password');
        $user=Admin::Where('email','=',$username)
            ->orWhere('phone_number','=',$username)
            ->first();
        
        if($user && Hash::check($password,$user->password)){
            return $user;
        }
        return false;
    }
    
    public function create(array $input): Admin
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Admin::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return Admin::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}