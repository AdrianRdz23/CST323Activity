<?php
namespace App\Services\Business;

use App\Http\Models\User;
use App\services\data\SecurityDAO;


class SecurityService
{
    private $verifyCred;
    private $reg;
    
    
    public function login(User $credentials)
    {
        //instantiate the data access layer
        $this->verifyCred = new SecurityDAO();
        
        //return true or false by passing the credentials to the object
        return $this->verifyCred->fingByUser($credentials);
    }
    
    public function Register(User $user)
    {
        $this->reg = new SecurityDAO();
        
        return $this->reg->Register($user);
    }
    
    public function findAllUsers()
    {
        $this->users = new SecurityDAO();
        
        return $this->users->findAllUsers();
    }
    
    public function deleteUser($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->deleteUser($id);
    }
    
    public function suspendUser($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->suspendUser($id);
    }
    
    public function findRole($username){
        
        $this->users = new SecurityDAO();
        
        return $this->users->findRole($username);
    }
    
    public function viewUser($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->viewUser($id);
    }
    
    public function viewJob($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->viewJob($id);
    }
    
    public function viewEducation($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->viewEducation($id);
    }
    
    //addJob
    public function addJob($id)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->addJob($id);
    }
    
    //find the role of the user
    public function Role($username)
    {
        $this->users = new SecurityDAO();
        
        return $this->users->Role($username);
    }
}
