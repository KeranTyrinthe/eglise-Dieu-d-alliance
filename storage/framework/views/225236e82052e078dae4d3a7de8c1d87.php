<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratif - Église Dieu d'Alliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 h-screen overflow-hidden flex flex-col">
    <!-- Header -->
    <header class="bg-white border-b shadow-sm flex-shrink-0">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="/images/logo.png" alt="Logo Église Dieu d'Alliance"
                    class="w-11 h-11 rounded-xl object-contain">
                <div>
                    <h1 class="text-lg font-bold text-gray-900">Église Dieu d'Alliance</h1>
                    <p class="text-xs text-gray-500">Panel Administratif</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main class="flex-1 overflow-hidden flex flex-col">
        <div class="text-center py-3 flex-shrink-0">
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Bienvenue sur le Panel Administratif</h2>
            <p class="text-gray-600 text-sm">Choisissez un module pour commencer</p>
        </div>

        <!-- Modules Grid -->
        <div class="flex-1 overflow-y-auto px-6 pb-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Membres - Actif -->
                <a href="/backoffice/gestion-membre/dashboard"
                    class="group block bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all p-6 border-2 border-gray-200 hover:border-indigo-500">
                    <div class="flex justify-center mb-5">
                        <div
                            class="w-20 h-20 bg-indigo-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                            <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Gestion des Membres</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Gérer les membres et leurs informations</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium group-hover:bg-indigo-700">Accéder
                            →</span>
                    </div>
                </a>

                <!-- Finances - Actif -->
                <a href="/backoffice/gestion-financiere/dashboard"
                    class="group block bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all p-6 border-2 border-gray-200 hover:border-green-500">
                    <div class="flex justify-center mb-5">
                        <div
                            class="w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center group-hover:scale-110 transition">
                            <span class="text-4xl font-bold text-green-600">$</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Gestion Financière</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Suivre les offrandes et dépenses</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium group-hover:bg-green-700">Accéder
                            →</span>
                    </div>
                </a>

                <!-- Cultes - Bientôt -->
                <div class="block bg-white rounded-2xl shadow-md p-6 border-2 border-gray-200 opacity-60">
                    <div class="flex justify-center mb-5">
                        <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Cultes & Activités</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Planifier les cultes et enseignements</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-gray-300 text-gray-600 rounded-lg text-sm font-medium">Bientôt
                            disponible</span>
                    </div>
                </div>

                <!-- Prière - Bientôt -->
                <div class="block bg-white rounded-2xl shadow-md p-6 border-2 border-gray-200 opacity-60">
                    <div class="flex justify-center mb-5">
                        <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Rendez-vous de Prière</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Organiser les moments de prière</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-gray-300 text-gray-600 rounded-lg text-sm font-medium">Bientôt
                            disponible</span>
                    </div>
                </div>

                <!-- Média - Bientôt -->
                <div class="block bg-white rounded-2xl shadow-md p-6 border-2 border-gray-200 opacity-60">
                    <div class="flex justify-center mb-5">
                        <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Gestion Média</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Gérer les contenus multimédias</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-gray-300 text-gray-600 rounded-lg text-sm font-medium">Bientôt
                            disponible</span>
                    </div>
                </div>

                <!-- Paramètres - Bientôt -->
                <div class="block bg-white rounded-2xl shadow-md p-6 border-2 border-gray-200 opacity-60">
                    <div class="flex justify-center mb-5">
                        <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-center text-gray-900 mb-2">Paramètres</h3>
                    <p class="text-gray-600 text-center text-sm mb-3">Configurer l'application</p>
                    <div class="text-center">
                        <span
                            class="inline-block px-4 py-2 bg-gray-300 text-gray-600 rounded-lg text-sm font-medium">Bientôt
                            disponible</span>
                    </div>
                </div>
            </div>
    </main>
</body>

</html><?php /**PATH C:\laragon\www\eglise-Dieu-d-alliance\resources\views/backoffice/menu.blade.php ENDPATH**/ ?>