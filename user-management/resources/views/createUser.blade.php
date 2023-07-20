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
    @auth
    <section>
            @if (auth()->user()->is_admin)

            <h1>add new user</h1>
            <div >
                <form class="new-user-form" action="/create-user" method="POST">
                        @csrf
                        <div>
                            <label for="firstname">firstname</label>
                            <input type="text" name="firstname" id="firstname">
                    </div>
                    <div>
                        <label for="lastname">lastname</label>
                        <input type="text" name="lastname" id="lastname">
                    </div>
                    <div>
                        <label for="email">email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div>
                        <label for="gender">gender</label>
                        <input type="text" name="gender" id="gender">
                    </div>
                    <div>
                        <label for="password">password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <button class="register-btn" type="submit">register</button>
                </form>
             </div>
             @else
                 <p>You are not authriezed to create users</p>
             @endif
        </section>

@else
<p>You are not logged in.</p>
@endauth
</body>
</html>