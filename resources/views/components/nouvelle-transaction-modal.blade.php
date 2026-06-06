<!-- Modal Nouvelle Transaction -->
<div id="transactionModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <h2 class="text-xl font-bold text-gray-900">Nouvelle Transaction</h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form action="{{ route('finances.store') }}" method="POST" class="p-6 space-y-4">
            @csrf

            <!-- Membre -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Membre</label>
                <select name="membre" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Sélectionner un membre</option>
                    <option value="1">Jean Dupont</option>
                    <option value="2">Marie Martin</option>
                    <option value="3">Pierre Dubois</option>
                    <option value="4">Sophie Laurent</option>
                </select>
            </div>

            <!-- Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <select name="type" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Sélectionner un type</option>
                    <option value="Dîme">Dîme</option>
                    <option value="Offrande">Offrande</option>
                    <option value="Don Spécial">Don Spécial</option>
                </select>
            </div>

            <!-- Montant -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Montant (€)</label>
                <input type="number" name="montant" required min="0" step="0.01" placeholder="0.00"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Méthode de paiement -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Méthode de paiement</label>
                <select name="methode" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Sélectionner une méthode</option>
                    <option value="Espèces">Espèces</option>
                    <option value="Virement">Virement</option>
                    <option value="Carte Bancaire">Carte Bancaire</option>
                    <option value="Chèque">Chèque</option>
                </select>
            </div>

            <!-- Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                <input type="date" name="date" required
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Modal Footer -->
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeModal()"
                    class="flex-1 px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    Annuler
                </button>
                <button type="submit"
                    class="flex-1 px-6 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>