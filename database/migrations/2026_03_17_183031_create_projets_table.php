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
        Schema::create('projets', function (Blueprint $table) {
            $table->id('id_projet');
            $table->unsignedBigInteger('id_utilisateur');
            $table->string('nom');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('classification_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('zone_geographique_id');
            $table->unsignedBigInteger('entite_accreditee_id');
            $table->unsignedBigInteger('domaine_intervention_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->unsignedBigInteger('id_utilisateur_updater')->nullable();

            // Clés étrangères
            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('classification_id')->references('id_classification')->on('classifications')->onDelete('set null');
            $table->foreign('status_id')->references('id_status')->on('statuses')->onDelete('set null');
            $table->foreign('zone_geographique_id')->references('id_zone_geographique')->on('zone_geographiques')->onDelete('set null');
            $table->foreign('entite_accreditee_id')->references('id_entite_accreditee')->on('entite_accreditees')->onDelete('set null');
            $table->foreign('domaine_intervention_id')->references('id_domaine_intervention')->on('domaine_interventions')->onDelete('set null');
            $table->foreign('id_utilisateur_updater')->references('id_utilisateur')->on('utilisateurs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
