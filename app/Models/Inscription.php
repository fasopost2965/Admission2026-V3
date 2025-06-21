<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscription extends Model
{
    /** @use HasFactory<\Database\Factories\InscriptionFactory> */
    use HasFactory;

    protected $fillable = [
        'numero_inscription',
        'type',
        'annee_scolaire',
        'statut',
        'etape_actuelle',
        'donnees_temporaires',
        'frais_scolarite',
        'frais_inscription',
        'total_a_payer',
        'mode_paiement',
        'date_validation',
        'notes'
    ];

    protected $casts = [
        'donnees_temporaires' => 'array',
        'date_validation' => 'date',
        'frais_scolarite' => 'decimal:2',
        'frais_inscription' => 'decimal:2',
        'total_a_payer' => 'decimal:2',
    ];

    // Relations
    public function eleve(): HasOne
    {
        return $this->hasOne(Eleve::class);
    }

    public function parents(): HasMany
    {
        return $this->hasMany(ParentEleve::class);
    }

    public function fournitures(): HasMany
    {
        return $this->hasMany(Fourniture::class);
    }

    // Scopes
    public function scopeEnCours($query)
    {
        return $query->where('statut', 'en_cours');
    }

    public function scopeValidees($query)
    {
        return $query->where('statut', 'validee');
    }

    public function scopeParAnnee($query, $annee)
    {
        return $query->where('annee_scolaire', $annee);
    }

    // Accesseurs
    public function getStatutLibelleAttribute(): string
    {
        return match($this->statut) {
            'en_cours' => 'En cours',
            'complete' => 'Complète',
            'validee' => 'Validée',
            'rejetee' => 'Rejetée',
            default => 'Inconnu'
        };
    }

    public function getTypeLibelleAttribute(): string
    {
        return match($this->type) {
            'nouvelle' => 'Nouvelle inscription',
            'reinscription' => 'Réinscription',
            'transfert' => 'Transfert',
            default => 'Inconnu'
        };
    }

    public function getProgressionAttribute(): int
    {
        return round(($this->etape_actuelle / 7) * 100);
    }

    // Méthodes
    public function estComplete(): bool
    {
        return $this->etape_actuelle >= 7;
    }

    public function peutPasserEtapeSuivante(): bool
    {
        return $this->etape_actuelle < 7;
    }

    public function passerEtapeSuivante(): void
    {
        if ($this->peutPasserEtapeSuivante()) {
            $this->increment('etape_actuelle');
        }
    }

    public function calculerTotal(): float
    {
        $total = $this->frais_scolarite ?? 0;
        $total += $this->frais_inscription ?? 0;
        
        // Ajouter le coût des fournitures
        $total += $this->fournitures()->sum('prix_total');
        
        return $total;
    }
}
