@include('header')
<style>
    .login-container {
        min-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .login-container h2 {
        margin-bottom: 20px;
        text-align: center;
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-size: 18px;
        font-weight: 600;
        color: #555;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0062cc;
    }
</style>
<div class="login-container">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        @if ($errors->has('message'))
        <div class="text-danger">{{ $errors->first('message') }}</div>
        @endif
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <button type="submit">Login</button>
    </form>
</div>

@include('footer')