<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Financière - Église Dieu d'Alliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .tab-active {
            background-color: #1e40af !important;
            color: white !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="/backoffice/menu" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Gestion Financière</h1>
                    <p class="text-xs text-gray-500">Dîmes, offrandes et contributions</p>
                </div>
            </div>
            <button onclick="openModal()"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2.5 rounded-lg font-medium flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvelle Transaction
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Revenus du Mois -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-green-600 text-sm font-semibold">+{{ $stats['revenus_mois_evolution'] }}%</span>
                </div>
                <p class="text-gray-500 text-xs mb-1">Revenus du Mois</p>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['revenus_mois'], 0, ',', ' ') }}</p>
            </div>

            <!-- Revenus Annuels -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <span class="text-blue-600 text-sm font-semibold">+{{ $stats['revenus_annuels_evolution'] }}%</span>
                </div>
                <p class="text-gray-500 text-xs mb-1">Revenus Annuels</p>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['revenus_annuels'], 0, ',', ' ') }}</p>
            </div>

            <!-- Dîmes (Mois) -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-gray-500 text-xs mb-1">Dîmes (Mois)</p>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['dimes_mois'], 0, ',', ' ') }}</p>
            </div>

            <!-- Offrandes (Mois) -->
            <div class="stat-card bg-white rounded-xl p-6 shadow-md">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                </div>
                <p class="text-gray-500 text-xs mb-1">Offrandes (Mois)</p>
                <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['offrandes_mois'], 0, ',', ' ') }}</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-6">
            <div class="flex border-b px-6">
                <a href="{{ route('finances.dashboard') }}" class="tab-active px-6 py-3 font-medium rounded-t-lg">Vue
                    d'ensemble</a>
                <a href="{{ route('finances.analytiques') }}"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Analytiques</a>
                <a href="{{ route('finances.transactions') }}"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Transactions</a>
                <a href="{{ route('finances.rapports') }}"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Rapports</a>
            </div>

            <!-- Chart Section -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Évolution des Revenus</h3>
                        <p class="text-sm text-gray-500">Analyse détaillée des contributions</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">Jour</button>
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg">Semaine</button>
                        <button class="px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded-lg">Mois</button>
                    </div>
                </div>

                <!-- Chart -->
                <div class="space-y-4">
                    @foreach($evolutionRevenus as $mois)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-medium text-gray-700">{{ $mois['mois'] }}</span>
                                <span class="text-sm font-bold text-gray-900">${{ number_format($mois['total'], 0, ',', ' ') }}</span>
                            </div>
                            <div class="flex h-8 rounded-lg overflow-hidden">
                                <div class="bg-purple-500 flex items-center justify-center text-white text-xs font-medium"
                                    style="width: {{ ($mois['dimes'] / $mois['total']) * 100 }}%">
                                    ${{ number_format($mois['dimes'], 0, ',', ' ') }}
                                </div>
                                <div class="bg-blue-500 flex items-center justify-center text-white text-xs font-medium"
                                    style="width: {{ ($mois['offrandes'] / $mois['total']) * 100 }}%">
                                    ${{ number_format($mois['offrandes'], 0, ',', ' ') }}
                                </div>
                                <div class="bg-green-500 flex items-center justify-center text-white text-xs font-medium"
                                    style="width: {{ ($mois['dons_speciaux'] / $mois['total']) * 100 }}%">
                                    ${{ number_format($mois['dons_speciaux'], 0, ',', ' ') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Legend -->
                <div class="flex items-center justify-center gap-6 mt-6 pt-6 border-t">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-purple-500 rounded"></div>
                        <span class="text-sm text-gray-600">Dîmes</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-blue-500 rounded"></div>
                        <span class="text-sm text-gray-600">Offrandes</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 bg-green-500 rounded"></div>
                        <span class="text-sm text-gray-600">Dons Spéciaux</span>
                    </div>
                </div>

                <!-- Stats Summary -->
                <div class="grid grid-cols-3 gap-6 mt-6 pt-6 border-t">
                    <div class="text-center">
                        <p class="text-xs text-gray-500 mb-1">Moyenne</p>
                        <p class="text-xl font-bold text-purple-600">$11,008</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 mb-1">Maximum</p>
                        <p class="text-xl font-bold text-blue-600">$12,450</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xs text-gray-500 mb-1">Croissance</p>
                        <p class="text-2xl font-bold text-green-600">+12%</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Nouvelle Transaction -->
    @include('components.nouvelle-transaction-modal')

    <script>
        function openModal() {
            document.getElementById('transactionModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('transactionModal').classList.add('hidden');
        }
    </script>
</body>

</html>