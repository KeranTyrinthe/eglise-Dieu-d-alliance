<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Afficher le dashboard principal des finances
     */
    public function dashboard()
    {
        // Données de démonstration pour les statistiques
        $stats = [
            'revenus_mois' => 12450,
            'revenus_mois_evolution' => 12,
            'revenus_annuels' => 145800,
            'revenus_annuels_evolution' => 8,
            'dimes_mois' => 8450,
            'offrandes_mois' => 4000,
        ];

        // Données pour le graphique d'évolution des revenus
        $evolutionRevenus = [
            ['mois' => 'Jan', 'dimes' => 6500, 'offrandes' => 2500, 'dons_speciaux' => 500, 'total' => 9500],
            ['mois' => 'Fév', 'dimes' => 7000, 'offrandes' => 2700, 'dons_speciaux' => 500, 'total' => 10200],
            ['mois' => 'Mar', 'dimes' => 7500, 'offrandes' => 3000, 'dons_speciaux' => 500, 'total' => 11000],
            ['mois' => 'Avr', 'dimes' => 7500, 'offrandes' => 2800, 'dons_speciaux' => 700, 'total' => 10800],
            ['mois' => 'Mai', 'dimes' => 8200, 'offrandes' => 3200, 'dons_speciaux' => 700, 'total' => 12100],
            ['mois' => 'Juin', 'dimes' => 8000, 'offrandes' => 3000, 'dons_speciaux' => 900, 'total' => 12450],
        ];

        return view('backoffice.gestion-financiere.dashboard', compact('stats', 'evolutionRevenus'));
    }

    /**
     * Afficher la vue analytiques
     */
    public function analytiques()
    {
        $stats = [
            'revenus_mois' => 12450,
            'revenus_mois_evolution' => 12,
            'revenus_annuels' => 145800,
            'revenus_annuels_evolution' => 8,
            'dimes_mois' => 8450,
            'offrandes_mois' => 4000,
        ];

        // Répartition par type
        $repartitionType = [
            ['type' => 'Dîmes', 'pourcentage' => 68],
            ['type' => 'Offrandes', 'pourcentage' => 25],
            ['type' => 'Dons Spéciaux', 'pourcentage' => 7],
        ];

        // Méthodes de paiement
        $methodesPaiement = [
            ['methode' => 'Espèces', 'pourcentage' => 45],
            ['methode' => 'Virement', 'pourcentage' => 30],
            ['methode' => 'Carte Bancaire', 'pourcentage' => 20],
            ['methode' => 'Chèque', 'pourcentage' => 5],
        ];

        return view('backoffice.gestion-financiere.analytiques', compact('stats', 'repartitionType', 'methodesPaiement'));
    }

    /**
     * Afficher la liste des transactions
     */
    public function transactions()
    {
        $stats = [
            'revenus_mois' => 12450,
            'revenus_mois_evolution' => 12,
            'revenus_annuels' => 145800,
            'revenus_annuels_evolution' => 8,
            'dimes_mois' => 8450,
            'offrandes_mois' => 4000,
        ];

        // Liste des transactions
        $transactions = [
            ['reference' => 'DÎM-2024-001', 'membre' => 'Jean Dupont', 'type' => 'Dîme', 'montant' => 150, 'methode' => 'Espèces', 'date' => '15/01/2024'],
            ['reference' => 'OFF-2024-001', 'membre' => 'Marie Martin', 'type' => 'Offrande', 'montant' => 50, 'methode' => 'Carte', 'date' => '15/01/2024'],
            ['reference' => 'DÎM-2024-002', 'membre' => 'Pierre Dubois', 'type' => 'Dîme', 'montant' => 200, 'methode' => 'Virement', 'date' => '14/01/2024'],
            ['reference' => 'DON-2024-001', 'membre' => 'Sophie Laurent', 'type' => 'Don Spécial', 'montant' => 500, 'methode' => 'Chèque', 'date' => '14/01/2024'],
            ['reference' => 'OFF-2024-002', 'membre' => 'Luc Bernard', 'type' => 'Offrande', 'montant' => 75, 'methode' => 'Espèces', 'date' => '13/01/2024'],
            ['reference' => 'DÎM-2024-003', 'membre' => 'Claire Moreau', 'type' => 'Dîme', 'montant' => 180, 'methode' => 'Virement', 'date' => '12/01/2024'],
            ['reference' => 'OFF-2024-003', 'membre' => 'Thomas Petit', 'type' => 'Offrande', 'montant' => 100, 'methode' => 'Carte', 'date' => '11/01/2024'],
        ];

        return view('backoffice.gestion-financiere.transactions', compact('stats', 'transactions'));
    }

    /**
     * Afficher la page des rapports
     */
    public function rapports()
    {
        $stats = [
            'revenus_mois' => 12450,
            'revenus_mois_evolution' => 12,
            'revenus_annuels' => 145800,
            'revenus_annuels_evolution' => 8,
            'dimes_mois' => 8450,
            'offrandes_mois' => 4000,
        ];

        return view('backoffice.gestion-financiere.rapports', compact('stats'));
    }

    /**
     * Enregistrer une nouvelle transaction
     */
    public function store(Request $request)
    {
        // TODO: Implémenter la logique de sauvegarde
        return redirect()->route('finances.transactions')
            ->with('success', 'Transaction enregistrée avec succès !');
    }

    /**
     * Mettre à jour une transaction
     */
    public function update(Request $request, $id)
    {
        // TODO: Implémenter la logique de mise à jour
        return redirect()->route('finances.transactions')
            ->with('success', 'Transaction modifiée avec succès !');
    }

    /**
     * Supprimer une transaction
     */
    public function destroy($id)
    {
        // TODO: Implémenter la logique de suppression
        return redirect()->route('finances.transactions')
            ->with('success', 'Transaction supprimée avec succès !');
    }
}
