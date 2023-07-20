

           
    <h1>Login</h1>
    <div>
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
    </div>

