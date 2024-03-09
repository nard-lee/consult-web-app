<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="icon" href="{{ asset('asset/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>

<body>

    <div class="cs-form flex justify-center">
        <section class="con-form flex flex-col gap-5">
            <div class="user-type flex flex-col gap-5">
                <img src="{{ asset('asset/favicon.png') }}" alt="favicon" class="rounded-lg">
                <label id="user-type" class="curr">User</label>
                <div class="toggle-switch flex justify-center gap-2">
                    <input type="radio" id="user-radio" name="role" value="student" checked>
                    <label for="user-radio">Student</label>
                    <input type="radio" id="admin-radio" name="role" value="instructor">
                    <label for="admin-radio">Instructor</label>
                </div>
            </div>
            <div class="form-div flex flex-col gap-2">
                <button class="button" id="signup-btn">
                    <a href=""><i class="fas fa-user-plus"></i> Signup</a>
                </button>
                <button class="button" id="login-btn">
                    <a href=""><i class="fas fa-sign-in-alt"></i> Login</a>
                </button>
            </div>
        </section>
    </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userType = document.getElementById('user-type');
            const signupBtn = document.getElementById('signup-btn').querySelector('a');
            const loginBtn = document.getElementById('login-btn').querySelector('a');

            // Event listener for radio buttons
            document.querySelectorAll('input[name="role"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        userType.textContent = this.value.charAt(0).toUpperCase() + this.value
                            .slice(1);
                        signupBtn.href = `/signup/${this.value}`;
                        loginBtn.href = `/login/${this.value}`;
                    }
                });
            });

            // Initial call to set initial state
            document.querySelector('input[name="role"]:checked').dispatchEvent(new Event('change'));
        });
    </script>

</body>

</html>