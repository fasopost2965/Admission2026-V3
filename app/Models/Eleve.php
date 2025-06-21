<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eleve extends Model
{
    /** @use HasFactory<\Database\Factories\EleveFactory> */
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'nom',
        'prenom',
        'nom_arabe',
        'prenom_arabe',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'nationalite',
        'niveau',
        'photo',
        'adresse',
        'telephone',
        'email',
        'groupe_sanguin',
        'allergies',
        'conditions_medicales',
        'ecole_precedente',
        'niveau_precedent',
        'annee_scolaire',
        'etat_sante_general',
        'allergies_type',
        'allergies_details',
        'medecin_traitant',
        'telephone_medecin',
        'traitements_cours',
        'traitements_details',
        'handicap',
        'handicap_details',
        'problemes_vision',
        'problemes_audition',
        'regime_sans_gluten',
        'regime_sans_lactose',
        'regime_vegetarien',
        'regime_halal',
        'regime_casher',
        'regime_autre',
        'regime_autre_details',
        'observations_medicales'
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];

    // Relations
    public function inscription(): BelongsTo
    {
        return $this->belongsTo(Inscription::class);
    }

    // Accesseurs
    public function getNomCompletAttribute(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getNomCompletArabeAttribute(): string
    {
        return ($this->prenom_arabe ?: $this->prenom) . ' ' . ($this->nom_arabe ?: $this->nom);
    }

    public function getAgeAttribute(): int
    {
        return $this->date_naissance->age;
    }

    public function getSexeLibelleAttribute(): string
    {
        return $this->sexe === 'M' ? 'Masculin' : 'Féminin';
    }

    public function getNiveauLibelleAttribute(): string
    {
        return match($this->niveau) {
            'MS' => 'Moyenne Section',
            'GS' => 'Grande Section',
            'CP' => '1ère année primaire',
            'CE1' => '2ème année primaire',
            'CE2' => '3ème année primaire',
            'CM1' => '4ème année primaire',
            'CM2' => '5ème année primaire',
            '6eme' => '6ème année primaire',
            default => $this->niveau
        };
    }

    // Scopes
    public function scopeParNiveau($query, $niveau)
    {
        return $query->where('niveau', $niveau);
    }

    public function scopeParSexe($query, $sexe)
    {
        return $query->where('sexe', $sexe);
    }

    public function scopeParAge($query, $ageMin, $ageMax = null)
    {
        $dateMax = now()->subYears($ageMin);
        $query->where('date_naissance', '<=', $dateMax);
        
        if ($ageMax) {
            $dateMin = now()->subYears($ageMax + 1);
            $query->where('date_naissance', '>', $dateMin);
        }
        
        return $query;
    }

    // Méthodes
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        
        // Photo par défaut selon le sexe
        return asset('images/default-avatar-' . strtolower($this->sexe) . '.png');
    }

    public function aDesAllergies(): bool
    {
        return !empty($this->allergies);
    }

    public function aDesConditionsMedicales(): bool
    {
        return !empty($this->conditions_medicales);
    }
}
