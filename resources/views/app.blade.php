<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/css/app.js'])
</head>
<body>
  <h1 class="text-3xl mt-7 font-bold bg-green-300 hover:bg-green-600 text-center p-6 hover:text-red-400 rounded-full">
    Hello world from student api!😊✨
  </h1>
  <p class="text-center font-bold">add: <span class="text-red-500">/api/student</span></p>
</body>
</html>