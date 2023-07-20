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

        <div class="user-card">
            <div>
                <h5>user id</h5>
                <h5>{{$user->id}}</h5>
            </div>
            <div>
                <h5>firtname</h5>
                <h5>{{$user->firstname}}</h5>
            </div>
            <div>
                <h5>lastname</h5>
                <h5>{{$user->lastname}}</h5>
            </div>
            <div>
                <h5>email</h5>
                <h5>{{$user->email}}</h5>
            </div>
        <div>
            <h5>gender</h5>
            <h5>{{$user->gender}}</h5>
        </div>
    </div>
</section>
    
</body>
</html>