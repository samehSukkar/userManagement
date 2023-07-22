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

            <h1>add new department</h1>
            <div >
                <form class="new-user-form" action="/create-department" method="POST">
                        @csrf
                        <div>
                            <label for="name">department name</label>
                            <input type="text" name="name" id="name">
                        </div>
                     

                    <button class="register-btn" type="submit">add</button>
                </form>
             </div>
             @else
                 <p>You are not authriezed </p>
             @endif
        </section>

@else
<p>You are not logged in.</p>
@endauth
</body>
</html>