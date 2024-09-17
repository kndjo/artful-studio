<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-gray-900 bg-opacity-80 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-300">Reset Password</h2>

        <form method="POST" action="{{ route('auth.resetPassword') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            

            <div class="mb-4">
                <label for="password" class="block text-gray-300 font-medium">New Password</label>
                <input id="password" type="password" name="password" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-300 font-medium">Confirm Password</label>
                
                <input id="password-confirm" type="password" name="password_confirmation" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                <input type="hidden" name="token" value="{{$token}}">
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Reset Password</button>
        </form>
    </div>
</body>
</html>