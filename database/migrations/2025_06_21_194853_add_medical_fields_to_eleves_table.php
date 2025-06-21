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
        Schema::table('eleves', function (Blueprint $table) {
            // État de santé général
            $table->string('etat_sante_general')->nullable();
            
            // Allergies
            $table->string('allergies_type')->nullable(); // 'aucune' ou 'oui'
            $table->text('allergies_details')->nullable();
            
            // Suivi médical
            $table->string('medecin_traitant')->nullable();
            $table->string('telephone_medecin')->nullable();
            $table->string('traitements_cours')->nullable(); // 'aucun' ou 'oui'
            $table->text('traitements_details')->nullable();
            
            // Besoins particuliers
            $table->string('handicap')->nullable(); // 'aucun' ou 'oui'
            $table->text('handicap_details')->nullable();
            $table->string('problemes_vision')->nullable(); // 'aucun' ou 'oui'
            $table->string('problemes_audition')->nullable(); // 'aucun' ou 'oui'
            
            // Régime alimentaire
            $table->boolean('regime_sans_gluten')->default(false);
            $table->boolean('regime_sans_lactose')->default(false);
            $table->boolean('regime_vegetarien')->default(false);
            $table->boolean('regime_halal')->default(false);
            $table->boolean('regime_casher')->default(false);
            $table->boolean('regime_autre')->default(false);
            $table->text('regime_autre_details')->nullable();
            
            // Observations médicales
            $table->text('observations_medicales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
