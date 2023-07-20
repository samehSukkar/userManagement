<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
    @include('navbar')

    <section>

        <h1>edit user</h1>
        <div >
            <form class="new-user-form" action="/edit-user/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="firstname">firstname</label>
                    <input type="text" name="firstname" id="firstname" value={{$user->firstname}}>
            </div>
            <div>
                <label for="lastname">lastname</label>
                <input type="text" name="lastname" id="lastname" value={{$user->lastname}}>
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email" value={{$user->email}}>
            </div>
            <div>
                <label for="gender">gender</label>
                <input type="text" name="gender" id="gender" value={{$user->gender}}>
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <button class="register-btn" type="submit">register</button>
        </form>
    </div>
</section>
    
</body>
</html>