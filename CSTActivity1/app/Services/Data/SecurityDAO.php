<?php
namespace App\Services\Data;
use Carbon\Exceptions\Exception;
use App\Http\Models\User;
//use App\Http\Models\Job;
class SecurityDAO
{
    //Define the connection string
    private $conn;
    private $severname = "ble5mmo2o5v9oouq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    private $username = "q8t50e2mgkgeya6a";
    private $password = "xw7k0gdcrixcv0gt";
    private $dbname = "v8jzfcnkdwef72z9";
    private $port ='3306';
    private $dbQuery;
    
    //constuctor that creates a connection with the database
    public function __construct()
    {
        //create a connection to the database
        $this->conn = mysqli_connect($this->severname,$this->username,$this->password,$this->dbname,$this->port);
        
        //test the connection
        
    }
    
    public function fingByUser(User $credentials)
    {
        try
        {
            //define the query to search the database for the credentials
            $this->dbQuery = "SELECT USERNAME, PASSWORD FROM  user
                                WHERE USERNAME = '{$credentials->getUsername()}'
                                    AND PASSWORD ='{$credentials->getPassword()}'";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            if(mysqli_num_rows($result) >0)
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return true;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    
    
    
    public function Register(User $user)
    {
        
        if ($this->conn-> connect_errno) {
            echo "Failed to connect to MySQL: ";
        }
        
        $this->conn->autocommit(TRUE);
        try
        {
            
            $this->dbQuery = "INSERT INTO user
                                (FIRSTNAME, LASTNAME, USERNAME, AGE, EMAIL,PASSWORD,ROLE)
                                VALUES
                                ('{$user->getFirstName()}', '{$user->getLastName()}',
                                    '{$user->getUsername()}', '{$user->getAge()}',
                                    '{$user->getEmail()}', '{$user->getPassword()}','{$user->getRole()}')";
            
            
            if(mysqli_query($this->conn,$this->dbQuery))
            {
                
                mysqli_close($this->conn);
                return true;
            }
            else
            {
                
                mysqli_close($this->conn);
                return false;
            }
            
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    
    public function findAllUsers()
    {
        try
        {
            
            if ($this->conn-> connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM user";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            //$result->execute();
            
            if(mysqli_num_rows($result) >0)
            {
                // $userResults = $this->dbQuery->fetchAll();
                //mysqli_free_result($result);
                // mysqli_close($this->conn);
                return  $result;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    public function deleteUser($id)
    {
        try {
            // delete song based on id
            $this->dbQuery = "DELETE FROM user WHERE ID = $id ";
            
            
            $result = mysqli_query($this->conn,$this->dbQuery);
            // return bool if row was deleted
            return $result;
        } catch (Exception $e2) {
            throw $e2;
        }
    }
    
    //function to suspend a user, change their Role to suspended in the database
    public function suspendUser($id)
    {
        try {
            // update playlist based on param playlist
            $this->dbQuery = "UPDATE user SET ROLE = 'suspended' WHERE ID = $id";
            $result =mysqli_query($this->conn,$this->dbQuery);
            
            if($result)
            {
                return true;
            }else
            {
                return false;
            }
            
        } catch (Exception $e2) {
            throw $e2;
        }
    }
    
    private $myrole;
    
    public function findRole($username){
        
        try
        {
            
            if ($this->conn->connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM user WHERE ROLE = 'suspended' AND USERNAME = '$username'";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            
            
            //$result->execute();
            
            if(mysqli_num_rows($result) >0)
            {
                // $userResults = $this->dbQuery->fetchAll();
                //mysqli_free_result($result);
                // mysqli_close($this->conn);
                return  $result;
            }
            else
            {
                //mysqli_free_result($result);
                mysqli_close($this->conn);
                
                return false;
                
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    public function viewUser($id)
    {
        try
        {
            
            if ($this->conn-> connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM user WHERE ID = $id";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            //$result->execute();
            
            if(mysqli_num_rows($result) >0)
            {
                // $userResults = $this->dbQuery->fetchAll();
                //mysqli_free_result($result);
                // mysqli_close($this->conn);
                return  $result;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    public function viewJob($id)
    {
        try
        {
            
            if ($this->conn-> connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM job WHERE USERID = $id";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            //$result->execute();
            
            if(mysqli_num_rows($result) >0)
            {
                // $userResults = $this->dbQuery->fetchAll();
                //mysqli_free_result($result);
                // mysqli_close($this->conn);
                return  $result;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
    public function viewEducation($id)
    {
        try
        {
            
            if ($this->conn-> connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM education WHERE USER_ID = $id";
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            //$result->execute();
            
            if(mysqli_num_rows($result) >0)
            {
                // $userResults = $this->dbQuery->fetchAll();
                //mysqli_free_result($result);
                // mysqli_close($this->conn);
                return  $result;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    /*
    public function addJob(Job $job)
    {
        
        if ($this->conn-> connect_errno) {
            echo "Failed to connect to MySQL: ";
        }
        
        $this->conn->autocommit(TRUE);
        try
        {
            
            $this->dbQuery = "INSERT INTO job
                                (TITLE, COMPANY, DESCRIPTION,USERID)
                                VALUES
                                ('{$job->getTitle()}', '{$job->getCompany()}',
                                    '{$job->getDescription()}','{$job->getUserid()}')";
            
            
            if(mysqli_query($this->conn,$this->dbQuery))
            {
                
                mysqli_close($this->conn);
                return true;
            }
            else
            {
                
                mysqli_close($this->conn);
                return false;
            }
            
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    */
    
    //function to find the role of the user
    public function Role($username)
    {
        try
        {
            
            if ($this->conn-> connect_errno) {
                echo "Failed to connect to MySQL: ";
            }
            
            
            $this->dbQuery = "SELECT * FROM user WHERE ROLE = 'admin' AND USERNAME = '$username'";
            
            //if the selected query returns a resultset
            $result = mysqli_query($this->conn,$this->dbQuery);
            
            if(mysqli_num_rows($result) >0)
            {
                
                return  true;
            }
            else
            {
                
                return false;
            }
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
    }
    
}
