<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports - Gestion Financière</title>
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

        .report-card {
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
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
                    <h1 class="text-2xl font-bold text-gray-900">Gestion Financière</h1>
                    <p class="text-sm text-gray-500">Dîmes, offrandes et contributions</p>
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
                    <span class="text-green-600 text-sm font-semibold">+<?php echo e($stats['revenus_mois_evolution']); ?>%</span>
                </div>
                <p class="text-gray-500 text-sm mb-1">Revenus du Mois</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo e(number_format($stats['revenus_mois'], 0, ',', ' ')); ?> €
                </p>
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
                    <span class="text-blue-600 text-sm font-semibold">+<?php echo e($stats['revenus_annuels_evolution']); ?>%</span>
                </div>
                <p class="text-gray-500 text-sm mb-1">Revenus Annuels</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo e(number_format($stats['revenus_annuels'], 0, ',', ' ')); ?>

                    €</p>
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
                <p class="text-gray-500 text-sm mb-1">Dîmes (Mois)</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo e(number_format($stats['dimes_mois'], 0, ',', ' ')); ?> €</p>
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
                <p class="text-gray-500 text-sm mb-1">Offrandes (Mois)</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo e(number_format($stats['offrandes_mois'], 0, ',', ' ')); ?> €
                </p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md">
            <div class="flex border-b px-6">
                <a href="<?php echo e(route('finances.dashboard')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Vue d'ensemble</a>
                <a href="<?php echo e(route('finances.analytiques')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Analytiques</a>
                <a href="<?php echo e(route('finances.transactions')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Transactions</a>
                <a href="<?php echo e(route('finances.rapports')); ?>"
                    class="tab-active px-6 py-3 font-medium rounded-t-lg">Rapports</a>
            </div>

            <!-- Reports Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Rapport Mensuel -->
                    <div class="report-card bg-white border-2 border-gray-200 rounded-2xl p-8 cursor-pointer">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Rapport Mensuel</h3>
                        <p class="text-gray-600 text-center text-sm">Générer le rapport financier du mois en cours</p>
                    </div>

                    <!-- Rapport Annuel -->
                    <div class="report-card bg-white border-2 border-gray-200 rounded-2xl p-8 cursor-pointer">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Rapport Annuel</h3>
                        <p class="text-gray-600 text-center text-sm">Générer le rapport financier de l'année</p>
                    </div>

                    <!-- Rapport par Membre -->
                    <div class="report-card bg-white border-2 border-gray-200 rounded-2xl p-8 cursor-pointer">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Rapport par Membre</h3>
                        <p class="text-gray-600 text-center text-sm">Historique des contributions par membre</p>
                    </div>

                    <!-- Rapport par Type -->
                    <div class="report-card bg-white border-2 border-gray-200 rounded-2xl p-8 cursor-pointer">
                        <div class="flex justify-center mb-6">
                            <div class="w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center">
                                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Rapport par Type</h3>
                        <p class="text-gray-600 text-center text-sm">Analyse détaillée par type de contribution</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Nouvelle Transaction -->
    <?php echo $__env->make('components.nouvelle-transaction-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        function openModal() {
            document.getElementById('transactionModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('transactionModal').classList.add('hidden');
        }
    </script>
</body>

</html><?php /**PATH C:\laragon\www\eglise-Dieu-d-alliance\resources\views/backoffice/gestion-financiere/rapports.blade.php ENDPATH**/ ?>