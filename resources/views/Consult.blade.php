<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('asset/favicon.png') }}" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sidenav.css') }}">
        <title>Dashboard | {{ $user['role'] }}</title>

    </head>
    <body class="antialiased">
        <div class="wrapper">
            <nav class="cs-nav flex flex-col justify-between items-center h-100">
                <div class="profile flex flex-col items-center gap-3">
                    <div class="rounded">
                        <img src="{{ asset('asset/favicon.png') }}" alt="favicon" width="100">
                    </div>
                    <div class="user-info flex flex-col items-center gap-2">
                        <span class="user-name">{{ $user['f_name'] }} {{ $user['l_name'] }}</span>
                        <span class="user-id">ID#{{ $user['user_id'] }}</span>
                        <span class="user-role">{{ $user['role'] }}</span>
                    </div>
                </div>
                <div class="cs-nav-items flex flex-col items-center gap-2">
                    <a href="/dashboard">Dashboard</a>
                    <a href="/consult">Consult</a>
                </div>
                <div class="logout">
                    <a href="/logout">Logout</a>
                </div>
            </nav>
            <div>
                @if($user['role'] == 'student')
                    @include('partials/StudentConsult', ['apt_sched' => $apt_sched])
                @endif
                @if($user['role'] == 'instructor')
                    @include('partials/InstructorConsult', ['apts' => $apt])
                @endif
            </div>
        </div>
    </body>
</html>
