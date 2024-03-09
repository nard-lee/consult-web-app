<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <title>Signup</title>
</head>

<body>

    <div class="flex justify-center pt-5">
        <form class="signup-form flex flex-col gap-3 p-5" method="POST">
            <label class="lg-h2">Signup</label>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="f_name" type="text" placeholder="First Name">
            </div>
            <div class="error fNerr"></div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="l_name" type="text" placeholder="Last Name">
            </div>
            <div class="error lNerr"></div>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input name="email" type="text" placeholder="Email">
            </div>
            <div class="error eMerr"></div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="Password">
            </div>
            <div class="error pWerr"></div>
            <button type="submit" class="signup-btn">Signup</button>
        </form>
    </div>

    <script>
        document.querySelector('.signup-form').addEventListener('submit', (event) => {
            event.preventDefault();

            let input = event.target;

            fetch('/signup', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        f_name: input.f_name.value,
                        l_name: input.l_name.value,
                        email: input.email.value,
                        password: input.password.value,
                        role: 'student',
                    }),
                })
                .then(response => response.json())
                .then(data => {

                    if (data.errors) {
                        let err = data.errors;
                        if (err.f_name) document.querySelector('.fNerr').innerHTML = err.f_name[0];
                        if (err.l_name) document.querySelector('.lNerr').innerHTML = err.l_name[0];
                        if (err.email) document.querySelector('.eMerr').innerHTML = err.email[0];
                        if (err.password) document.querySelector('.pWerr').innerHTML = err.password[0];
                    } 
                    
                    if(data.success) {
                        console.log(data);
                        window.location.href = "/";
                    }
                })
        });
    </script>

</body>

</html>
