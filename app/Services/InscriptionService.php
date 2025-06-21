<?php

namespace App\Services;

use App\Models\Inscription;
use App\Models\Eleve;
use App\Models\ParentEleve;
use App\Models\Fourniture;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class InscriptionService
{
    /**
     * Génère un numéro d'inscription unique
     */
    public function generateNumeroInscription(): string
    {
        do {
            $numero = 'INS-' . date('Y') . '-' . strtoupper(Str::random(6));
        } while (Inscription::where('numero_inscription', $numero)->exists());
        
        return $numero;
    }

    /**
     * Crée une nouvelle inscription
     */
    public function createInscription(array $data): Inscription
    {
        return DB::transaction(function () use ($data) {
            $inscription = Inscription::create([
                'numero_inscription' => $this->generateNumeroInscription(),
                'type' => $data['type'] ?? 'nouvelle',
                'annee_scolaire' => $data['annee_scolaire'] ?? config('ecole.annee_scolaire_actuelle', '2025-2026'),
                'statut' => 'en_cours',
                'etape_actuelle' => 1,
                'donnees_temporaires' => $data
            ]);

            // Calculer les frais initiaux
            $this->calculerFraisInscription($inscription);

            return $inscription;
        });
    }

    /**
     * Crée ou met à jour une inscription
     */
    public function createOrUpdateInscription(array $data): Inscription
    {
        $inscriptionId = session('inscription_id');
        
        if ($inscriptionId) {
            $inscription = Inscription::find($inscriptionId);
            if ($inscription) {
                return $this->updateInscription($inscription, $data);
            }
        }
        
        return $this->createInscription($data);
    }

    /**
     * Met à jour une inscription
     */
    public function updateInscription(Inscription $inscription, array $data): Inscription
    {
        $inscription->update($data);
        
        // Recalculer les frais si nécessaire
        if (isset($data['donnees_temporaires']['niveau_demande'])) {
            $this->calculerFraisInscription($inscription);
        }

        return $inscription;
    }

    /**
     * Calcule les frais d'inscription
     */
    public function calculerFraisInscription(Inscription $inscription): void
    {
        $config = config('ecole');
        
        // Frais de scolarité selon le niveau
        $niveau = $inscription->donnees_temporaires['niveau_demande'] ?? null;
        $fraisScolarite = $config['frais_scolarite'][$niveau] ?? 0;
        
        // Frais d'inscription selon le type
        $fraisInscription = 0;
        if ($inscription->type === 'nouvelle') {
            $fraisInscription = $config['frais_inscription'] ?? 0;
        }

        $inscription->update([
            'frais_scolarite' => $fraisScolarite,
            'frais_inscription' => $fraisInscription,
            'total_a_payer' => $fraisScolarite + $fraisInscription
        ]);
    }

    /**
     * Valide une inscription complète
     */
    public function validerInscription(Inscription $inscription): Inscription
    {
        // Vérifier que toutes les étapes sont complètes
        if ($inscription->etape_actuelle < 7) {
            throw new \Exception('Toutes les étapes doivent être complétées avant la validation');
        }

        // Vérifier que l'élève existe
        if (!$inscription->eleve) {
            throw new \Exception('Les informations de l\'élève sont requises');
        }

        // Vérifier qu'au moins un parent est défini
        if ($inscription->parents()->count() === 0) {
            throw new \Exception('Au moins un parent doit être renseigné');
        }

        return DB::transaction(function () use ($inscription) {
            $inscription->update([
                'statut' => 'validee',
                'date_validation' => now()
            ]);

            // Générer les documents
            $this->genererDocuments($inscription);

            // Envoyer les notifications
            $this->envoyerNotifications($inscription);

            return $inscription;
        });
    }

    /**
     * Génère les documents d'inscription
     */
    public function genererDocuments(Inscription $inscription): array
    {
        $documents = [];

        // Dossier d'inscription
        $documents['dossier'] = $this->genererDossierInscription($inscription);
        
        // Certificat d'inscription
        $documents['certificat'] = $this->genererCertificatInscription($inscription);
        
        // Liste des fournitures
        $documents['fournitures'] = $this->genererListeFournitures($inscription);

        return $documents;
    }

    /**
     * Génère le dossier d'inscription PDF
     */
    private function genererDossierInscription(Inscription $inscription): string
    {
        // Ici vous utiliseriez DomPDF ou une autre bibliothèque
        // Pour l'instant, on retourne un chemin fictif
        $filename = 'dossiers/dossier-' . $inscription->numero_inscription . '.pdf';
        
        // Logique de génération PDF à implémenter
        // $pdf = PDF::loadView('documents.dossier-inscription', ['inscription' => $inscription]);
        // Storage::put('public/' . $filename, $pdf->output());
        
        return $filename;
    }

    /**
     * Génère le certificat d'inscription
     */
    private function genererCertificatInscription(Inscription $inscription): string
    {
        $filename = 'certificats/certificat-' . $inscription->numero_inscription . '.pdf';
        
        // Logique de génération PDF à implémenter
        return $filename;
    }

    /**
     * Génère la liste des fournitures
     */
    private function genererListeFournitures(Inscription $inscription): string
    {
        $filename = 'fournitures/liste-' . $inscription->numero_inscription . '.pdf';
        
        // Logique de génération PDF à implémenter
        return $filename;
    }

    /**
     * Envoie les notifications après validation
     */
    private function envoyerNotifications(Inscription $inscription): void
    {
        // Notification par email aux parents
        $this->envoyerEmailConfirmation($inscription);
        
        // Notification SMS si configuré
        $this->envoyerSMSConfirmation($inscription);
        
        // Notification à l'administration
        $this->notifierAdministration($inscription);
    }

    /**
     * Envoie un email de confirmation
     */
    private function envoyerEmailConfirmation(Inscription $inscription): void
    {
        // Logique d'envoi d'email à implémenter
        // Mail::to($inscription->parents->first()->email)->send(new ConfirmationInscription($inscription));
    }

    /**
     * Envoie un SMS de confirmation
     */
    private function envoyerSMSConfirmation(Inscription $inscription): void
    {
        // Logique d'envoi SMS à implémenter
    }

    /**
     * Notifie l'administration
     */
    private function notifierAdministration(Inscription $inscription): void
    {
        // Logique de notification admin à implémenter
    }

    /**
     * Récupère les statistiques d'inscription
     */
    public function getStatistiques(string $anneeScolaire = null): array
    {
        $annee = $anneeScolaire ?? config('ecole.annee_scolaire_actuelle', '2025-2026');
        
        $query = Inscription::where('annee_scolaire', $annee);
        
        return [
            'total' => $query->count(),
            'en_cours' => $query->where('statut', 'en_cours')->count(),
            'validees' => $query->where('statut', 'validee')->count(),
            'rejetees' => $query->where('statut', 'rejetee')->count(),
            'par_type' => [
                'nouvelle' => $query->where('type', 'nouvelle')->count(),
                'reinscription' => $query->where('type', 'reinscription')->count(),
                'transfert' => $query->where('type', 'transfert')->count(),
            ],
            'par_niveau' => $this->getStatistiquesParNiveau($annee),
            'revenus' => $this->calculerRevenus($annee)
        ];
    }

    /**
     * Statistiques par niveau
     */
    private function getStatistiquesParNiveau(string $annee): array
    {
        $niveaux = ['MS', 'GS', 'CP', 'CE1', 'CE2', 'CM1', 'CM2', '6eme'];
        $stats = [];
        
        foreach ($niveaux as $niveau) {
            $stats[$niveau] = Inscription::where('annee_scolaire', $annee)
                ->whereHas('eleve', function ($query) use ($niveau) {
                    $query->where('niveau', $niveau);
                })
                ->where('statut', 'validee')
                ->count();
        }
        
        return $stats;
    }

    /**
     * Calcule les revenus
     */
    private function calculerRevenus(string $annee): array
    {
        $inscriptions = Inscription::where('annee_scolaire', $annee)
            ->where('statut', 'validee')
            ->get();
        
        return [
            'frais_scolarite' => $inscriptions->sum('frais_scolarite'),
            'frais_inscription' => $inscriptions->sum('frais_inscription'),
            'fournitures' => $inscriptions->sum(function ($inscription) {
                return $inscription->fournitures->sum('prix_total');
            }),
            'total' => $inscriptions->sum('total_a_payer')
        ];
    }

    /**
     * Recherche d'inscriptions
     */
    public function rechercherInscriptions(array $criteres): \Illuminate\Database\Eloquent\Collection
    {
        $query = Inscription::query();

        if (isset($criteres['numero'])) {
            $query->where('numero_inscription', 'like', '%' . $criteres['numero'] . '%');
        }

        if (isset($criteres['statut'])) {
            $query->where('statut', $criteres['statut']);
        }

        if (isset($criteres['type'])) {
            $query->where('type', $criteres['type']);
        }

        if (isset($criteres['annee_scolaire'])) {
            $query->where('annee_scolaire', $criteres['annee_scolaire']);
        }

        if (isset($criteres['nom_eleve'])) {
            $query->whereHas('eleve', function ($q) use ($criteres) {
                $q->where('nom', 'like', '%' . $criteres['nom_eleve'] . '%')
                  ->orWhere('prenom', 'like', '%' . $criteres['nom_eleve'] . '%');
            });
        }

        return $query->with(['eleve', 'parents'])->orderBy('created_at', 'desc')->get();
    }
} 