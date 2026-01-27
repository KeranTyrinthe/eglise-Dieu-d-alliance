<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4" style="background-color: #003d82;">
            
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo Église" class="w-16 h-16 object-contain">
                </div>
            </div>

            <!-- Titre -->
            <h1 class="text-3xl font-bold text-white mb-2">Système de Gestion d'Église</h1>
            <p class="text-blue-200 mb-8 text-center">
                Connectez-vous pour accéder à votre espace
            </p>

            <!-- Formulaire -->
            <div class="w-full sm:max-w-md bg-white rounded-2xl shadow-xl p-8">
                <?php echo e($slot); ?>

            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-blue-200">
                © 2025 Système de Gestion d'Église. Tous droits réservés.
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\eglise-Dieu-d-alliance\resources\views/layouts/guest.blade.php ENDPATH**/ ?>