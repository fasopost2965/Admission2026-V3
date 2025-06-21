<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fourniture extends Model
{
    /** @use HasFactory<\Database\Factories\FournitureFactory> */
    use HasFactory;

    protected $fillable = [
        'inscription_id',
        'nom',
        'categorie',
        'description',
        'quantite',
        'prix_unitaire',
        'prix_total',
        'obligatoire',
        'fourni_ecole',
        'taille',
        'statut'
    ];

    protected $casts = [
        'prix_unitaire' => 'decimal:2',
        'prix_total' => 'decimal:2',
        'obligatoire' => 'boolean',
        'fourni_ecole' => 'boolean',
    ];

    // Relations
    public function inscription(): BelongsTo
    {
        return $this->belongsTo(Inscription::class);
    }

    // Accesseurs
    public function getCategorieLibelleAttribute(): string
    {
        return match($this->categorie) {
            'uniforme' => 'Uniforme scolaire',
            'livres' => 'Livres et manuels',
            'materiel' => 'Matériel scolaire',
            'sport' => 'Équipement sportif',
            'hygiene' => 'Articles d\'hygiène',
            'autres' => 'Autres fournitures',
            default => ucfirst($this->categorie)
        };
    }

    public function getStatutLibelleAttribute(): string
    {
        return match($this->statut) {
            'disponible' => 'Disponible',
            'en_rupture' => 'En rupture',
            'commande' => 'En commande',
            default => 'Inconnu'
        };
    }

    public function getStatutCouleurAttribute(): string
    {
        return match($this->statut) {
            'disponible' => 'green',
            'en_rupture' => 'red',
            'commande' => 'orange',
            default => 'gray'
        };
    }

    // Scopes
    public function scopeObligatoires($query)
    {
        return $query->where('obligatoire', true);
    }

    public function scopeOptionnelles($query)
    {
        return $query->where('obligatoire', false);
    }

    public function scopeParCategorie($query, $categorie)
    {
        return $query->where('categorie', $categorie);
    }

    public function scopeDisponibles($query)
    {
        return $query->where('statut', 'disponible');
    }

    public function scopeFourniesEcole($query)
    {
        return $query->where('fourni_ecole', true);
    }

    // Méthodes
    public function calculerPrixTotal(): float
    {
        return $this->prix_unitaire * $this->quantite;
    }

    public function estDisponible(): bool
    {
        return $this->statut === 'disponible';
    }

    public function estObligatoire(): bool
    {
        return $this->obligatoire;
    }

    public function estFournieEcole(): bool
    {
        return $this->fourni_ecole;
    }

    public function aUneTaille(): bool
    {
        return !empty($this->taille);
    }

    public function getPrixFormateAttribute(): string
    {
        return number_format($this->prix_total, 2, ',', ' ') . ' DH';
    }

    public function getPrixUnitaireFormateAttribute(): string
    {
        return number_format($this->prix_unitaire, 2, ',', ' ') . ' DH';
    }
}
