@extends('layouts.appmaster')
@section('title', 'Login Page')

@section('content')
<div class ="container">
    <form action="Register" method="post">
    <h2 align="center">Register</h2>
    <input type = "hidden" name = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
    <br>
    First Name: <br>
    <input type="text" name="first_name" maxlength="10"><br><br>
    Last Name: <br>
    <input type="text" name="last_name" maxlength="20"><br><br>
    Username: <br>
    <input type="text" name="user_name" maxlength="15"><br><br>
    Age: <br>
    <input type="text" id="user_age" name="user_age"><br><br>
    Email: <br>
    <input type="text" id="user_email" name="user_email"><br><br>
    Password: <br>
    <input type="password" id="user_password" name="user_password"><br><br>
    <button type="submit">Register</button>
    </form>
    <p align="center" id="login">If you already have an account, click <a href="login"> here</a></p>

</div>
@endsection