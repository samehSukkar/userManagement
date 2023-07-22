<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>login</title>
</head>
<body>
    
    @include('navbar')
    
    <section>

        <form class="login-form" action="login" method="POST">
            @csrf
            <div>
                <label for="loginemail">email</label>
                <input type="email" name="loginemail" id="loginemail">
            </div>
            <div>
                <label for="loginpassword">password</label>
                <input type="password" name="loginpassword" id="loginusername">
            </div>
            <button class="login-btn" type="submit">login</button>
        </form>
        
    </section>
    
</body>
</html>


