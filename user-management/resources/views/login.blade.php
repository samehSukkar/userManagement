<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>login</title>
</head>
<body>
    
    @include('navbar')
    
    <section>

        <form class="login-form" id="login-form" action="login" method="POST">
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


<script>
const loginForm = document.getElementById('login-form');
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

loginForm.addEventListener('submit', async (event) => {
  event.preventDefault();

  const formData = new FormData(loginForm);
  const data = {
    loginemail: formData.get('loginemail'),
    loginpassword: formData.get('loginpassword'),
  };

  try {
    const response = await fetch('/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body: JSON.stringify(data),
    });

    const result = await response.json();

    if (response.ok) {
        if (result.user.is_admin)
             window.location.href = '/';
        else 
             window.location.href = `/user/${result.user.id}`;
    } else {
      console.error(result.message);
    }
  } catch (error) {
    console.error('An error occurred:', error);
  }
});
</script>


</html>


