<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('asset/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <title>Login | {{ $role }}</title>
</head>

<body>

    <div class="flex justify-center pt-5">
        <form class="login-form flex flex-col gap-3" method="POST">
            <div class="flex items-center gap-3">
                <img src="{{ asset('asset/favicon.png') }}" alt="favicon" class="rounded-lg" width="70">
                <label class="lg-h2">Login with account .</label>
            </div>
            <br>
            <div class="form-group">
                <i class="fas fa-at"></i>
                <input name="email" type="email" placeholder="Email">
            </div>
            <div class="error eMerr"></div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Password">
            </div>
            <div class="error pWerr"></div>
            <button type="submit" class="signup-btn">Login</button>
            <a href="/signup/{{ $role }}">Dont have account yet? signup .</a>
            <a href="/form">go back to form .</a>
        </form>
    </div>

    <script>
        document.querySelector('.login-form').addEventListener('submit', (event) => {
            event.preventDefault();

            let input = event.target;

            fetch('/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        email: input.email.value,
                        password: input.password.value,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    //console.log(data)
                    if (data.errors) {
                        let err = data.errors;
                        if (err.email) document.querySelector('.eMerr').innerHTML = err.email;
                        if (err.password) document.querySelector('.pWerr').innerHTML = err.password;
                    }

                    if (data.success) {
                        console.log(data);
                        window.location.href = "/";
                    }
                })
        });
    </script>

</body>

</html>
