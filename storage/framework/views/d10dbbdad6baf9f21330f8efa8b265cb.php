<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Gestion Financière</title>
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

        .action-btn {
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            transform: scale(1.1);
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
                    class="tab-active px-6 py-3 font-medium rounded-t-lg">Transactions</a>
                <a href="<?php echo e(route('finances.rapports')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Rapports</a>
            </div>

            <!-- Transactions Table -->
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Référence
                                </th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Membre
                                </th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Type</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Montant
                                </th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Méthode
                                </th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Date</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-600 uppercase">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="py-4 px-4 text-sm text-gray-700 font-medium"><?php echo e($transaction['reference']); ?>

                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-900"><?php echo e($transaction['membre']); ?></td>
                                    <td class="py-4 px-4">
                                        <?php if($transaction['type'] == 'Dîme'): ?>
                                            <span
                                                class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">Dîme</span>
                                        <?php elseif($transaction['type'] == 'Offrande'): ?>
                                            <span
                                                class="inline-block px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-medium">Offrande</span>
                                        <?php else: ?>
                                            <span
                                                class="inline-block px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Don
                                                Spécial</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-bold text-gray-900"><?php echo e($transaction['montant']); ?> €
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-700"><?php echo e($transaction['methode']); ?></td>
                                    <td class="py-4 px-4 text-sm text-gray-700"><?php echo e($transaction['date']); ?></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-2">
                                            <!-- Voir -->
                                            <button
                                                class="action-btn w-8 h-8 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <!-- Éditer -->
                                            <button
                                                class="action-btn w-8 h-8 flex items-center justify-center rounded-lg bg-orange-100 text-orange-600 hover:bg-orange-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </button>
                                            <!-- Supprimer -->
                                            <button
                                                class="action-btn w-8 h-8 flex items-center justify-center rounded-lg bg-red-100 text-red-600 hover:bg-red-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            <!-- Imprimer -->
                                            <button
                                                class="action-btn w-8 h-8 flex items-center justify-center rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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

</html><?php /**PATH C:\laragon\www\eglise-Dieu-d-alliance\resources\views/backoffice/gestion-financiere/transactions.blade.php ENDPATH**/ ?>