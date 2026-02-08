<!DOCTYPE html>
<html>
<head>
    <title>Test Alpine</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen"
      x-data="{ open: false }">

    <div class="text-center">
        <button 
            @click="open = !open"
            class="px-6 py-2 bg-blue-600 text-white rounded">
            Toggle
        </button>

        <p x-show="open" class="mt-4 text-green-600">
            Alpine OK
        </p>
    </div>

</body>
</html>
