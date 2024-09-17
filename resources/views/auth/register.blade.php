<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register: Artful Studio</title>
    
 
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
    <div class="relative w-full max-w-lg p-8 bg-gray-900 bg-opacity-80 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-300">Create an Account</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-300 font-medium">Username</label>
                <input id="username" type="text" name="username" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required autofocus>
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="firstname" class="block text-gray-300 font-medium">First Name</label>
                <input id="firstname" type="text" name="firstname" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('firstname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="lastname" class="block text-gray-300 font-medium">Last Name</label>
                <input id="lastname" type="text" name="lastname" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('lastname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-300 font-medium">Email Address</label>
                <input id="email" type="email" name="email" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <div class="mb-6">
                <label for="password" class="block text-gray-300 font-medium">Password</label>
                <input id="password" type="password" name="password" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-300 font-medium">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Register</button>
        </form>
    </div>
    

    <div class="background-image"></div>
</body>
</html>
