<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\business\SecurityService;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }
    
    
    public function ManageUsers()
    {
        //request all songs from bs and dao
        $users = new SecurityService();
        $results = $users->findAllUsers();
        //return results accordingly
        if ($results != null){
            return view('manageUsers')->with('users', $results);
        } else {
            return view('manageUsers')->with('msg','There are no Users yet.');
        }
    }
    
    public function deleteUser(Request $request)
    {
        //request all songs from bs and dao
        $users = new SecurityService();
        $id = $request->input('userid');
        $users->deleteUser($id);
        
        $a = $this->ManageUsers($request);
        return $a;
    }
    
    public function suspendUser(Request $request)
    {
        //request all songs from bs and dao
        $users = new SecurityService();
        $id = $request->input('userid');
        $results = $users->suspendUser($id);
        
        $a = $this->ManageUsers($request);
        //return results accordingly
        if ($results ){
            return $a;
        } else {
            return view('manageUsers')->with('msg',' User did not get suspended.');
        }
    }
    
    public function viewUser(Request $request)
    {
        //request all songs from bs and dao
        $users = new SecurityService();
        $id = $request->input('userid');
        
        $results = $users->viewUser($id);
        
        if($results != null)
        {
            return view('profile')->with('users',$results);
        }
        else
        {
            return view('profile')->with('msg',"User has no profile");
        }
    }
}
