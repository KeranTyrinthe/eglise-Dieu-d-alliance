<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Erreur serveur (500)</title>
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50 text-gray-900">
    <div class="max-w-xl text-center p-8">
        <h1 class="text-6xl font-bold text-red-600">500</h1>
        <p class="mt-4 text-xl font-semibold">Erreur interne du serveur</p>
        <p class="mt-2 text-gray-600">Une erreur est survenue côté serveur. Veuillez réessayer plus tard.</p>
        <div class="mt-6 flex justify-center gap-3">
            <a href="{{ url('/') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Accueil</a>
            <a href="{{ url()->previous() }}" class="px-4 py-2 border rounded">Retour</a>
        </div>

        @if(config('app.debug') && isset($exception))
            <div class="mt-6 p-4 bg-white border rounded text-left text-sm text-red-700">
                <strong>Détails (debug):</strong>
                <div class="mt-2">{{ $exception->getMessage() }}</div>
                @if(method_exists($exception, 'getTraceAsString'))
                    <pre class="mt-2 text-xs text-gray-700">{{ $exception->getTraceAsString() }}</pre>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
