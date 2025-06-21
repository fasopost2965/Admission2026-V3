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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_inscription')->unique();
            $table->enum('type', ['nouvelle', 'reinscription', 'transfert']);
            $table->string('annee_scolaire');
            $table->enum('statut', ['en_cours', 'complete', 'validee', 'rejetee'])->default('en_cours');
            $table->integer('etape_actuelle')->default(1);
            $table->json('donnees_temporaires')->nullable();
            $table->decimal('frais_scolarite', 10, 2)->nullable();
            $table->decimal('frais_inscription', 10, 2)->nullable();
            $table->decimal('total_a_payer', 10, 2)->nullable();
            $table->string('mode_paiement')->nullable();
            $table->date('date_validation')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Index pour optimiser les requêtes
            $table->index(['numero_inscription', 'statut']);
            $table->index(['annee_scolaire', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
