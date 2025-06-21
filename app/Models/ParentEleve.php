<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParentEleve extends Model
{
    /** @use HasFactory<\Database\Factories\ParentEleveFactory> */
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'type',
        'nom',
        'prenom',
        'nom_arabe',
        'prenom_arabe',
        'date_naissance',
        'profession',
        'employeur',
        'telephone',
        'telephone_secondaire',
        'email',
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'niveau_etude',
        'revenu_mensuel',
        'est_responsable_legal',
        'est_contact_urgence'
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'revenu_mensuel' => 'decimal:2',
        'est_responsable_legal' => 'boolean',
        'est_contact_urgence' => 'boolean',
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

    public function getTypeLibelleAttribute(): string
    {
        return match($this->type) {
            'pere' => 'Père',
            'mere' => 'Mère',
            'tuteur' => 'Tuteur',
            default => 'Inconnu'
        };
    }

    public function getAgeAttribute(): ?int
    {
        return $this->date_naissance ? $this->date_naissance->age : null;
    }

    public function getAdresseCompleteAttribute(): string
    {
        $adresse = $this->adresse;
        if ($this->code_postal) {
            $adresse .= ', ' . $this->code_postal;
        }
        $adresse .= ', ' . $this->ville;
        if ($this->pays && $this->pays !== 'Maroc') {
            $adresse .= ', ' . $this->pays;
        }
        return $adresse;
    }

    // Scopes
    public function scopeResponsablesLegaux($query)
    {
        return $query->where('est_responsable_legal', true);
    }

    public function scopeContactsUrgence($query)
    {
        return $query->where('est_contact_urgence', true);
    }

    public function scopeParType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Méthodes
    public function estResponsableLegal(): bool
    {
        return $this->est_responsable_legal;
    }

    public function estContactUrgence(): bool
    {
        return $this->est_contact_urgence;
    }

    public function aUnEmail(): bool
    {
        return !empty($this->email);
    }

    public function aUnTelephoneSecondaire(): bool
    {
        return !empty($this->telephone_secondaire);
    }

    public function getTelephonePrincipalAttribute(): string
    {
        return $this->telephone;
    }

    public function getTelephoneSecondaireAttribute(): ?string
    {
        return $this->telephone_secondaire;
    }
}
