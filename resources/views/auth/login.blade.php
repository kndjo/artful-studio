<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login: Artful Studio</title>
    
 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <style>
        .background-image {
            background-image: url('https://img.freepik.com/free-vector/vintage-tattoo-studio-logo-with-rose-vector-illustration-black-white-flower-with-tape_74855-11255.jpg?t=st=1726398447~exp=1726402047~hmac=1e8af3462e5f82535dcf9737476355cc5af171e7313d72d3763ec68352a14119&w=740');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gray-800 text-white flex items-center justify-center min-h-screen">
    <div class="relative w-full max-w-md p-8 bg-white bg-opacity-90 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Login to Artful Studio</h2>
        
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif
        
        <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <div class="mb-4">
                <label for="login" class="block text-gray-800 font-medium">Email or Username</label>
                <input id="login" type="text" name="login" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-gray-900" required autofocus>
            </div>
        
            <div class="mb-6">
                <label for="password" class="block text-gray-800 font-medium">Password</label>
                <input id="password" type="password" name="password" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-gray-900" required>
            </div>
        
            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Login</button>
            
            <div class="mt-4 text-center">
                <a href="{{ route('forgot-password') }}" class="text-indigo-600 hover:text-indigo-700">Forgot your password?</a>

                <p class="mt-2 text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700">Sign up</a></p>
            </div>
        </form>
    </div>
    
    <div class="background-image"></div>
</body>
</html>
