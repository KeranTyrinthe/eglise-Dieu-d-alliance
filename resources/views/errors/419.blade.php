<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Page expirée (419)</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50 text-gray-900">
    <div class="max-w-xl text-center p-8">
        <h1 class="text-6xl font-bold text-gray-700">419</h1>
        <p class="mt-4 text-xl font-semibold">Page expirée</p>
        <p class="mt-2 text-gray-600">La session a expiré ou le jeton CSRF est invalide. Veuillez réessayer.</p>
        <div class="mt-6 flex justify-center gap-3">
            <a href="{{ url()->current() }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Rafraîchir</a>
            <a href="{{ url('/') }}" class="px-4 py-2 border rounded">Accueil</a>
        </div>
        @if(config('app.debug') && isset($exception))
            <div class="mt-6 p-4 bg-white border rounded text-left text-sm text-red-700">
                <strong>Détails (debug):</strong>
                <div class="mt-2">{{ $exception->getMessage() }}</div>
            </div>
        @endif
    </div>
</body>
</html>
