<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg text-lg">
        <nav class="flex justify-between p-5 font-bold">
            <a href="{{ route('member') }}" class="nav-link text-slate-100">會員管理</a>
            <a href="{{ route('dashboard') }}" class="nav-link text-slate-100">來店統計</a>
            <a href="{{ route('store') }}" class="nav-link text-slate-100">點餐系統</a>
            <a href="{{ route('settings') }}" class="nav-link text-slate-100">系統管理</a>

            <div class="flex items-center gap-4">
                <span class="text-slate-300 border-b-4 border-indigo-500">{{ session('a_Name'); }}</span>
                <a href="{{ route('login') }}" class="nav-link text-slate-100">登出</a>
            </div>
        </nav>
    </header>

    <main class="py-8 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>
</body>

</html>
