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
            @if (auth()->user()->is_admin)
            <h1>edit user</h1>
            <form class="new-user-form" action="/edit-user/{{$user->id}}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="image">
                    <label for="image">image</label>
                    <input type="file" name="image">
                </div>
                
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
                <select name="gender" id="gender">
                    <option value="male" @if ($user->gender == "male") selected="selected" @endif >male</option>
                    <option value="female" @if ($user->gender == "female") selected="selected" @endif>female</option>
                </select>
            </div>
            <div>
                <label for="department">department</label>
                <select name="department_id" id="department"> 
                    @foreach ($departments as $d)
                        <option @if ($d->id == $user->department_id) selected="selected" @endif
                        
                        value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <button class="register-btn" type="submit">submit</button>
        </form>
        @else
        <p>You are not authriezed </p>
        @endif
</section>
    
</body>
</html>