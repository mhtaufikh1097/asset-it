<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Super Admin')</title>

    {{-- INI WAJIB --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100" x-data="{ sidebarOpen: true }">


<div class="flex h-screen">

    {{-- SIDEBAR --}}
    <aside class="bg-slate-900 text-white w-64">
        <div class="p-4 font-bold">IT Asset</div>
    </aside>

    {{-- CONTENT --}}
    <div class="flex-1">
        <header class="bg-white shadow p-4">
            @yield('header')
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>
<button @click="sidebarOpen = !sidebarOpen">☰</button>

</div>

</body>
</html>
