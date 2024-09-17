<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-gray-900 bg-opacity-80 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-300">Forgot Password</h2>
        
       

        <form method="POST" action="{{ route('auth.requestForgotPasswordLink') }}">

            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-300 font-medium">Email Address</label>
                <input id="email" type="email" name="email" class="form-input mt-1 block w-full border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg text-gray-900" required>
                
            </div>
            

          
          
            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Send Reset Link</button>
        
            <a href="{{ route('auth.login')}}" class="btn btn-primary">Back to Login</a>
        </form>
    </div>
</body>
</html>