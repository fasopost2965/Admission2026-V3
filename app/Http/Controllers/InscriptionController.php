<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Eleve;
use App\Services\InscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InscriptionController extends Controller
{
    protected $inscriptionService;

    public function __construct(InscriptionService $inscriptionService)
    {
        $this->inscriptionService = $inscriptionService;
    }

    // Étape 1: Type d'inscription
    public function step1()
    {
        $inscription = session('inscription_id') ? Inscription::find(session('inscription_id')) : null;
        
        return view('inscriptions.step1-type', [
            'inscription' => $inscription,
            'currentStep' => 1
        ]);
    }

    public function step1Store(Request $request)
    {
        $request->validate([
            'type_inscription' => 'required|in:nouveau,reinscription',
            'niveau_demande' => 'required|in:ps,ms,gs,cp,ce1,ce2,cm1,cm2,6eme',
        ]);

        // Mapper les valeurs du formulaire vers les valeurs de l'enum
        $typeMapping = [
            'nouveau' => 'nouvelle',
            'reinscription' => 'reinscription'
        ];

        $inscription = $this->inscriptionService->createOrUpdateInscription([
            'type' => $typeMapping[$request->type_inscription],
            'donnees_temporaires' => [
                'type_inscription' => $request->type_inscription,
                'niveau_demande' => $request->niveau_demande,
            ]
        ]);

        session(['inscription_id' => $inscription->id]);

        return redirect()->route('inscription.step2');
    }

    // Étape 2: Informations élève
    public function step2()
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        return view('inscriptions.step2-eleve', [
            'inscription' => $inscription,
            'currentStep' => 2
        ]);
    }

    public function step2Store(Request $request)
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        $request->validate([
            'eleve.nom' => 'required|string|max:255',
            'eleve.prenom' => 'required|string|max:255',
            'eleve.date_naissance' => 'required|date|before:today',
            'eleve.lieu_naissance' => 'required|string|max:255',
            'eleve.sexe' => 'required|in:M,F',
            'eleve.nationalite' => 'required|string|max:255',
            'eleve.ecole_precedente' => 'nullable|string|max:255',
            'eleve.niveau_precedent' => 'nullable|string|max:50',
            'eleve.annee_scolaire' => 'nullable|string|max:20',
            'eleve.photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $eleveData = $request->eleve;

        // Gestion de l'upload de photo
        if ($request->hasFile('eleve.photo')) {
            $photo = $request->file('eleve.photo');
            $photoPath = $photo->store('eleves/photos', 'public');
            $eleveData['photo'] = $photoPath;
        }

        // Créer ou mettre à jour l'élève
        if ($inscription->eleve) {
            $inscription->eleve->update($eleveData);
        } else {
            $eleve = new Eleve($eleveData);
            $inscription->eleve()->save($eleve);
        }

        return redirect()->route('inscription.step3');
    }

    // Étape 3: Informations parents
    public function step3()
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        return view('inscriptions.step3-parents', compact('inscription'));
    }

    public function step3Store(Request $request)
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        // Validation et traitement des données parents (à implémenter)
        // Pour l'instant, on redirige vers l'étape suivante
        
        return redirect()->route('inscription.step4');
    }

    // Étape 4: Informations médicales
    public function step4()
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        return view('inscriptions.step4-medical', [
            'inscription' => $inscription,
            'currentStep' => 4
        ]);
    }

    public function step4Store(Request $request)
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        $request->validate([
            'etat_sante_general' => 'nullable|string|max:50',
            'allergies' => 'nullable|string|max:50',
            'allergies_details' => 'nullable|string|max:1000',
            'medecin_traitant' => 'nullable|string|max:255',
            'telephone_medecin' => 'nullable|string|max:20',
            'traitements_cours' => 'nullable|string|max:50',
            'traitements_details' => 'nullable|string|max:1000',
            'handicap' => 'nullable|string|max:50',
            'handicap_details' => 'nullable|string|max:1000',
            'problemes_vision' => 'nullable|string|max:50',
            'problemes_audition' => 'nullable|string|max:50',
            'regime_sans_gluten' => 'nullable|boolean',
            'regime_sans_lactose' => 'nullable|boolean',
            'regime_vegetarien' => 'nullable|boolean',
            'regime_halal' => 'nullable|boolean',
            'regime_casher' => 'nullable|boolean',
            'regime_autre' => 'nullable|boolean',
            'regime_autre_details' => 'nullable|string|max:1000',
            'observations_medicales' => 'nullable|string|max:1000',
        ]);

        // Préparer les données médicales
        $medicalData = [
            'etat_sante_general' => $request->etat_sante_general,
            'allergies_type' => $request->allergies,
            'allergies_details' => $request->allergies_details,
            'medecin_traitant' => $request->medecin_traitant,
            'telephone_medecin' => $request->telephone_medecin,
            'traitements_cours' => $request->traitements_cours,
            'traitements_details' => $request->traitements_details,
            'handicap' => $request->handicap,
            'handicap_details' => $request->handicap_details,
            'problemes_vision' => $request->problemes_vision,
            'problemes_audition' => $request->problemes_audition,
            'regime_sans_gluten' => $request->has('regime_sans_gluten'),
            'regime_sans_lactose' => $request->has('regime_sans_lactose'),
            'regime_vegetarien' => $request->has('regime_vegetarien'),
            'regime_halal' => $request->has('regime_halal'),
            'regime_casher' => $request->has('regime_casher'),
            'regime_autre' => $request->has('regime_autre'),
            'regime_autre_details' => $request->regime_autre_details,
            'observations_medicales' => $request->observations_medicales,
        ];

        // Mettre à jour l'élève avec les données médicales
        if ($inscription->eleve) {
            $inscription->eleve->update($medicalData);
        }

        // Mettre à jour les données temporaires de l'inscription
        $donneesTemporaires = $inscription->donnees_temporaires ?? [];
        $donneesTemporaires['medical'] = $medicalData;
        $inscription->update(['donnees_temporaires' => $donneesTemporaires]);

        return redirect()->route('inscription.step5');
    }

    // Étape 5: Fournitures
    public function step5()
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        return view('inscriptions.step5-fournitures', [
            'inscription' => $inscription,
            'currentStep' => 5
        ]);
    }

    public function step5Store(Request $request)
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        // Pour l'instant, on redirige vers l'étape suivante
        // La logique des fournitures sera implémentée plus tard
        
        return redirect()->route('inscription.step6');
    }

    // Étape 6: Récapitulatif
    public function step6()
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        return view('inscriptions.step6-recapitulatif', [
            'inscription' => $inscription,
            'currentStep' => 6
        ]);
    }

    public function step6Store(Request $request)
    {
        $inscription = $this->getInscriptionFromSession();
        
        if (!$inscription) {
            return redirect()->route('inscription.step1');
        }

        // Pour l'instant, on redirige vers l'étape suivante
        return redirect()->route('inscription.step7');
    }

    // Étape 7: Validation finale
    public function showStep7($id)
    {
        $inscription = Inscription::findOrFail($id);
        
        return view('inscriptions.step7-validation', [
            'inscription' => $inscription->load(['eleve', 'parents', 'fournitures']),
            'currentStep' => 7,
            'totalGeneral' => $inscription->calculerTotal()
        ]);
    }

    public function validateInscription(Request $request, $id)
    {
        $inscription = Inscription::findOrFail($id);
        
        try {
            $inscription = $this->inscriptionService->validerInscription($inscription);
            
            return redirect()->route('inscription.success', $inscription->id)
                           ->with('success', 'Inscription validée avec succès !');
        } catch (\Exception $e) {
            return back()->withErrors(['validation' => $e->getMessage()]);
        }
    }

    // Méthodes utilitaires
    private function getInscriptionFromSession()
    {
        $inscriptionId = session('inscription_id');
        if (!$inscriptionId) {
            return null;
        }

        return Inscription::with('eleve')->find($inscriptionId);
    }

    private function getNiveaux(): array
    {
        return [
            ['value' => 'MS', 'label' => 'Moyenne Section'],
            ['value' => 'GS', 'label' => 'Grande Section'],
            ['value' => 'CP', 'label' => '1ère année primaire'],
            ['value' => 'CE1', 'label' => '2ème année primaire'],
            ['value' => 'CE2', 'label' => '3ème année primaire'],
            ['value' => 'CM1', 'label' => '4ème année primaire'],
            ['value' => 'CM2', 'label' => '5ème année primaire'],
            ['value' => '6eme', 'label' => '6ème année primaire']
        ];
    }

    private function getNationalites(): array
    {
        return [
            'Marocain', 'Français', 'Algérien', 'Tunisien', 'Égyptien', 'Autre'
        ];
    }

    private function getNiveauxEtude(): array
    {
        return [
            'Primaire', 'Collège', 'Lycée', 'Baccalauréat', 'Bac+2', 'Bac+3', 'Bac+4', 'Bac+5', 'Doctorat'
        ];
    }

    private function getGroupesSanguins(): array
    {
        return ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    }

    private function getFournituresDisponibles(string $niveau): array
    {
        // Liste des fournitures par niveau (à personnaliser selon vos besoins)
        $fournitures = [
            'uniforme' => [
                'nom' => 'Uniforme scolaire',
                'prix_unitaire' => 150.00,
                'obligatoire' => true,
                'fourni_ecole' => true
            ],
            'cartable' => [
                'nom' => 'Cartable',
                'prix_unitaire' => 80.00,
                'obligatoire' => true,
                'fourni_ecole' => false
            ],
            'trousse' => [
                'nom' => 'Trousse complète',
                'prix_unitaire' => 45.00,
                'obligatoire' => true,
                'fourni_ecole' => false
            ]
        ];

        return $fournitures;
    }

    // API pour sauvegarder les données de session
    public function saveSession(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'value' => 'required'
        ]);

        Session::put($validated['key'], $validated['value']);

        return response()->json(['success' => true]);
    }

    // Pages de recherche et statistiques
    public function recherche(Request $request)
    {
        $criteres = $request->only(['numero', 'statut', 'type', 'annee_scolaire', 'nom_eleve']);
        $inscriptions = $this->inscriptionService->rechercherInscriptions($criteres);

        return view('inscriptions.recherche', [
            'inscriptions' => $inscriptions,
            'criteres' => $criteres
        ]);
    }

    public function statistiques()
    {
        $stats = $this->inscriptionService->getStatistiques();

        return view('inscriptions.statistiques', [
            'statistiques' => $stats
        ]);
    }
}
