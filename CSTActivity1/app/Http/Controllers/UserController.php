<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\Exception;
use App\Http\Models\User;
use Illuminate\Http\Request;
use App\services\business\SecurityService;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        // trys to validate throws validation error if failed rules
        //test
        
        try {
            $credentials = new User($request->get('first_name'), $request->get('last_name'), $request->get('user_name'), $request->get('user_age'), $request->get('user_email'), $request->get('user_password'),null);
            
            
            $serviceregister = new SecurityService();
            
            //pass the credentials to the business layer
            $serviceregister->Register($credentials);
            
        } catch (Exception $e2) {
            throw $e2;
        }
        return view('login');
    }
    
    public function login(Request $request)
    {
        // trys to validate throws validation error if failed rules
        
        
        try {
            $credentials = new User(null, null, $request->get('login_name'), null, null, $request->get('login_password'),null);
            
            
            $servicelogin= new SecurityService();
            
            //pass the credentials to the business layer
            $servicelogin->login($credentials);
            
            
            
            //pass the credentials to the business layer
            $isValid = $servicelogin->login($credentials);
            $checkRole = $servicelogin->findRole($request->get('login_name'));
            $role = $servicelogin->Role($request->get('login_name'));
            
            //determine which view to display
            if($isValid)
            {
                if($checkRole)
                {
                    return view('login')->with('msg',"Your account is suspended");
                }
                if($role)
                {
                    $servicelogin = new AdminController();
                    
                    $a = $servicelogin->ManageUsers($request);
                    return $a;
                }
                else
                    return view('home');
            }
            else
            {
                return view('loginFailed');
            }
            
        } catch (Exception $e2) {
            throw $e2;
        }
        
        
    }
    
    public function logout(Request $request) {
        
        return redirect('/');
    }
}
