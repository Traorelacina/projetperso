<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - AgriConnect</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .agriconnect-bg {
            background-color: #0069d9;
        }
        .agriconnect-button {
            background-color: #0069d9;
            transition: all 0.3s ease;
        }
        .agriconnect-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .login-container {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="login-container bg-white rounded-lg overflow-hidden w-full max-w-md">
            <!-- Header avec logo -->
            <div class="agriconnect-bg p-6 flex justify-center">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h1 class="text-white text-2xl font-bold ml-2">AgriConnect</h1>
                </div>
            </div>
            
            <!-- Titre et description -->
            <div class="text-center px-6 pt-6 pb-2">
                <h2 class="text-xl font-semibold text-gray-800">Connexion à votre compte</h2>
                <p class="text-gray-600 text-sm mt-1">Accédez à la plateforme agricole ivoirienne</p>
            </div>
            
            <!-- Formulaire de connexion -->
            <div class="p-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse email</label>
                        <input id="email" type="email" name="email" required autofocus autocomplete="username"
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="exemple@email.com">
                    </div>
                    
                    <!-- Mot de passe -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                               placeholder="Votre mot de passe">
                    </div>
                    
                    <!-- Se souvenir de moi -->
                    <div class="flex items-center justify-between mt-4 mb-6">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>
                        
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Mot de passe oublié?
                            </a>
                        </div>
                    </div>
                    
                    <!-- Bouton de connexion -->
                    <div>
                        <button type="submit" 
                                class="agriconnect-button group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Se connecter
                        </button>
                    </div>
                </form>
                
                <!-- Lien d'inscription -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Pas encore de compte? 
                        <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Créer un compte
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>