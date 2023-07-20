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
    @auth

    <section>
        

        <div class="users-table">
            <button class="new-user-btn"><a href="/create-user">new user</a></button> 
            @foreach ($users as $user)
            <div class="user" id={{$user->id}}>
                <h4>{{$user->id}}</h4>
                <h4>{{$user->firstname}}</h4>
                <h4>{{$user->lastname}}</h4>
                <h4>{{$user->email}}</h4>
                <div>
                    <button class="profile-button" ><a href="/user/{{$user->id}}">profile</a></button>
                    <button class="delete-button" onclick = "deleteUser({{$user->id}})" >delete</button>
                </div>
            </div>
            @endforeach
        </div>

    </section>

    @else 
    
    @include('login')

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