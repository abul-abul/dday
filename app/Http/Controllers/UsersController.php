<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\user\UserRequest;

use App\Contracts\UserInterface;
use App\Contracts\LanguageInterface;

use App\Http\Requests;
use Validator;
use Auth;
use Socialite;

class UsersController extends BaseController
{


    /**
     * Create a new instance of BaseController class.
     *
     * @return void
     */
	public function __construct(LanguageInterface $langRepo)
    {
        parent::__construct($langRepo);
        // $this->middleware('auth', ['except' => ['getLogin', 'postLogin','getLogout']]);
        $this->middleware('language');

    }

    /**
     * 
     */
    public function getHome()
    {
        return view('user.home');
    }

    /**
     * 
     */
    public function getLoginReg()
    {
        return view('user.login-registration');
    }

    /**
     * 
     */
    public function postRegistration(UserRequest $request,UserInterface $userRepo)
    {
        $result = $request->inputs();
        $userRepo->createOne($result);
        return redirect()->back();
    }

    /**
     * 
     */
    public function postLogin(Request $request)
    {
        $result = $request->all();
        $password = $request->get('password');
        $email = $request->get('email');

        $validator = Validator::make($result, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            if(Auth::attempt([
                'email' => $email,
                'password' => $password,
                'role' => 'user'
            ]))
            {
                return redirect()->action('UsersController@getDeshbord'); 
            }    
        }
    }

    /**
     * 
     */
    public function getDeshbord()
    {
        return view('user.dashbord');
    }

    /**
     * Get facebook login
     */
    public function getFacebookLogin()
    { 
        return Socialite::with('facebook')->redirect();
    }

    /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getFacebookCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('facebook')->user();

        $id = $user->id;
        $token = $user->token;
        $fullName = $user->getName();

        $exp = explode(' ', $fullName);
        $username = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();
       
        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
             $data = [
                'facebook_id' => $id,
                'username' => $username,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'facebook_token' => $token,
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'facebook_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }
        return redirect()->action('UsersController@getDeshbord'); 
    }

    /**
     * Get facebook login
     */
    public function getTwitterLogin()
    { 
        return Socialite::with('twitter')->redirect();
    }

    /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getTwitterCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('twitter')->user();

        $id = $user->id;
        $token = $user->token;
        $fullName = $user->getName();

        $exp = explode(' ', $fullName);
        $username = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();
 
        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
             $data = [
                'twitter_id' => $id,
                'username' => $username,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'twitter_token' => $token
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'twitter_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }
        return redirect()->action('UsersController@getDeshbord'); 
    }

    /**
     * Get facebook login
     */
    public function getGoogleLogin()
    { 
        return Socialite::with('google')->redirect();
    }

     /**
     * get Facebook callback
     * GET user/facebook-callback
     *
     * @return redirect
     */
    public function getGoogleCallback(UserInterface $userRepo)
    {
        $user = Socialite::with('google')->user();
        $id = $user->id;
        $token = $user->token;
        $fullName = $user->getName();

        $exp = explode(' ', $fullName);
        $username = $exp[0];
        $lastname = $exp[1];
        $email = $user->getEmail();
 
        $userAvatar =  $user->getAvatar();

        $firstEmail = $userRepo->getAllSocial($email);
        if(count($firstEmail) == 0){
             $data = [
                'google_id' => $id,
                'username' => $username,
                'lastname' => $lastname,
                'email' => $email,
                'profile_picture' => $userAvatar,
                'google_token' => $token
            ];
            $result = $userRepo->createOne($data);
            Auth::login($userRepo->getOne($result->id));
        }else{
            Auth::login($firstEmail);
            $tokenData = [
                'google_token' => $token
            ];
            $userRepo->updateSocialToken($email,$tokenData);
        }
        return redirect()->action('UsersController@getDeshbord'); 
    }
    
}
