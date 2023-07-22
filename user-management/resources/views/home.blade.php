<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
    @include('navbar')
   
    @if (auth()->user()->is_admin)

    <section>

        <div class="controls">
            <div>
                <button class="new-user-btn"><a href="/create-user">new user</a></button> 
                <button class="new-dep-btn"><a href="/create-department">new department</a></button> 
            </div>
            <form action="/" method="GET"><input type="text" name="search"><button>search</button></form>
        </div>

        <div class="users-table">
            <div class="user header">
                <h4>firstname</h4>
                <h4>lastname</h4>
                <h4>email</h4>
                <div>
                    <span>profile</span>
                    <span>edit</span>
                    <span>delete</span>
            </div>
            </div>
            @foreach ($users as $user)
            <div class="user" id={{$user->id}}>
                <h4>{{$user->firstname}}</h4>
                <h4>{{$user->lastname}}</h4>
                <h4>{{$user->email}}</h4>
                <div>
                    <button class="profile-button" ><a href="/user/{{$user->id}}">profile</a></button>
                    <button class="edit-button" ><a href="/edit-user/{{$user->id}}">edit</a></button>
                    <button class="delete-button" onclick = "deleteUser({{$user->id}})" >delete</button>
                </div>
            </div>
            @endforeach
        </div>

    </section>


    @else
        <p>You are not authriezed </p>
    @endif

</body>
</html>

<script>

function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            fetch(`/user/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
            })
            .then(response => {
                if (response.ok) {
                    const userDiv = document.getElementById(userId);
                    userDiv.remove();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

</script>