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
                <form class="new-user-form" action="/create-user" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="image">
                        <label for="image">image</label>
                        <input type="file" name="image">
                    </div>

                    <div>
                        <label for="firstname">firstname</label>
                        <input type="text" name="firstname" id="firstname" required>
                    </div>
                    <div>
                        <label for="lastname">lastname</label>
                        <input type="text" name="lastname" id="lastname" required>
                    </div>
                    <div>
                        <label for="email">email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="gender">gender</label>
                        <select name="gender" id="gender" required>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div>
                        <label for="department">department</label>
                        <select name="department_id" id="department" required> 
                            @foreach ($departments as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="password" >password</label>
                        <input type="password" name="password" id="password" required>
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