<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Email</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-900 flex justify-center items-center h-screen">
    <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data" class="w-4/12 p-8 bg-white rounded-md">
        @csrf
        <h1 class="text-center font-bold text-3xl mb-3">Laravel Email</h1>
        @if (session('success'))
            <p class="p-3 border-l-8 border-l-green-800 bg-green-600 text-white mb-2">{{ session('success') }}</p>
        @elseif(session('failed'))
            <p class="p-3 border-l-8 border-l-red-800 bg-red-600 text-white mb-2">{{ session('failed') }}</p>
        @endif
        <input type="email" id="email" name="email" placeholder="To (email)"
        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2">
        @error('email')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror

        <input type="email" id="from" name="from" placeholder="From (email)"
        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2">
        @error('from')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror

        <input type="text" id="sender_name" name="sender_name" placeholder="Sender Name"
        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2">
        @error('sender_name')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror

        <input type="text" id="subject" name="subject"  placeholder="Subject"
        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2">
        @error('subject')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror

        <input type="file" id="file" name="file"
        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2">
        @error('file')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror

        <textarea name="body" id="body" cols="30" rows="6"class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-2" placeholder="Message"></textarea>
        @error('body')
            <p class="text-red-500 mb-2">{{ $message }}</p>
        @enderror
        <button type="submit" class="p-3 w-full bg-blue-600 text-white font-bold rounded-lg">Send</button>
    </form>
</body>
</html>