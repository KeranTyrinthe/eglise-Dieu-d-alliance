<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytiques - Gestion Financière</title>
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

        .carousel-container {
            position: relative;
        }

        .carousel-slide {
            display: none;
        }

        .carousel-slide.active {
            display: block;
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
                    <span class="text-green-600 text-sm font-semibold">+<?php echo e($stats['revenus_mois_evolution']); ?>%</span>
                </div>
                <p class="text-gray-500 text-xs mb-1">Revenus du Mois</p>
                <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($stats['revenus_mois'], 0, ',', ' ')); ?>

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
                <p class="text-gray-500 text-xs mb-1">Revenus Annuels</p>
                <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($stats['revenus_annuels'], 0, ',', ' ')); ?>

                </p>
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
                <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($stats['dimes_mois'], 0, ',', ' ')); ?></p>
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
                <p class="text-2xl font-bold text-gray-900">$<?php echo e(number_format($stats['offrandes_mois'], 0, ',', ' ')); ?>

                </p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-xl shadow-md mb-6">
            <div class="flex border-b px-6">
                <a href="<?php echo e(route('finances.dashboard')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Vue d'ensemble</a>
                <a href="<?php echo e(route('finances.analytiques')); ?>"
                    class="tab-active px-6 py-3 font-medium rounded-t-lg">Analytiques</a>
                <a href="<?php echo e(route('finances.transactions')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Transactions</a>
                <a href="<?php echo e(route('finances.rapports')); ?>"
                    class="px-6 py-3 font-medium text-gray-600 hover:text-gray-900">Rapports</a>
            </div>

            <!-- Carousel Section -->
            <div class="p-6 relative">
                <!-- Navigation Arrows -->
                <button onclick="prevSlide()"
                    class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-gray-800 hover:bg-gray-700 text-white rounded-full flex items-center justify-center shadow-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button onclick="nextSlide()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-12 h-12 bg-gray-800 hover:bg-gray-700 text-white rounded-full flex items-center justify-center shadow-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Carousel Container -->
                <div class="carousel-container">
                    <!-- Slide 1: Répartition par Type -->
                    <div class="carousel-slide active">
                        <div class="bg-blue-900 rounded-2xl p-8 text-white">
                            <h3 class="text-2xl font-bold mb-6">Répartition par Type</h3>
                            <div class="space-y-6">
                                <?php $__currentLoopData = $repartitionType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-lg font-medium"><?php echo e($item['type']); ?></span>
                                            <span class="text-lg font-bold"><?php echo e($item['pourcentage']); ?>%</span>
                                        </div>
                                        <div class="w-full bg-blue-800 rounded-full h-3">
                                            <div class="bg-white rounded-full h-3 transition-all"
                                                style="width: <?php echo e($item['pourcentage']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Méthodes de Paiement -->
                    <div class="carousel-slide">
                        <div class="bg-red-700 rounded-2xl p-8 text-white">
                            <h3 class="text-2xl font-bold mb-6">Méthodes de Paiement</h3>
                            <div class="space-y-6">
                                <?php $__currentLoopData = $methodesPaiement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-lg font-medium"><?php echo e($item['methode']); ?></span>
                                            <span class="text-lg font-bold"><?php echo e($item['pourcentage']); ?>%</span>
                                        </div>
                                        <div class="w-full bg-red-900 rounded-full h-3">
                                            <div class="bg-white rounded-full h-3 transition-all"
                                                style="width: <?php echo e($item['pourcentage']); ?>%"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Nouvelle Transaction -->
    <?php echo $__env->make('components.nouvelle-transaction-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function openModal() {
            document.getElementById('transactionModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('transactionModal').classList.add('hidden');
        }
    </script>
</body>

</html><?php /**PATH C:\laragon\www\eglise-Dieu-d-alliance\resources\views/backoffice/gestion-financiere/analytiques.blade.php ENDPATH**/ ?>