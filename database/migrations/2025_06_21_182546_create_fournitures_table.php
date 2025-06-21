<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fournitures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscription_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('categorie'); // uniforme, livres, materiel, etc.
            $table->text('description')->nullable();
            $table->integer('quantite')->default(1);
            $table->decimal('prix_unitaire', 8, 2);
            $table->decimal('prix_total', 8, 2);
            $table->boolean('obligatoire')->default(true);
            $table->boolean('fourni_ecole')->default(false);
            $table->string('taille')->nullable(); // Pour les uniformes
            $table->enum('statut', ['disponible', 'en_rupture', 'commande'])->default('disponible');
            $table->timestamps();
            
            // Index pour optimiser les requêtes
            $table->index(['inscription_id', 'categorie']);
            $table->index('obligatoire');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournitures');
    }
};
