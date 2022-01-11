@extends('layouts.appmaster')
@section('title', 'Login Page')

@section('content')
<div class ="container">
    <form action="login" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
        <div>
            <h2 align="center">Login</h2>
        </div>
        <div>
            Username: 
            <input type="text" placeholder="Enter Username" name="login_name"></input>
        </div>
        <div>
            <br/>
            Password:
            <input type="password" placeholder="Enter Password" name="login_password"></input>
        </div>
        <div>
            <button type="submit" name="login">Login</button>
        </div>
    </form>
     <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
    <p align="center" id="register">If you do not have an account, click <a href="reg"> here</a> to register first</p>


</div>
@endsection