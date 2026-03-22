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
        Schema::create('financements', function (Blueprint $table) {
            $table->id('id_financement');
            $table->unsignedBigInteger('projet_id');
            $table->string('financeur');
            $table->decimal('montant', 15, 2);
            $table->string('devise');
            $table->date('date_financement');
            $table->unsignedBigInteger('utilisateur_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->unsignedBigInteger('id_utilisateur_updater')->nullable();

            $table->foreign('projet_id')->references('id_projet')->on('projets')->onDelete('cascade');
            $table->foreign('utilisateur_id')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_utilisateur_updater')->references('id_utilisateur')->on('utilisateurs')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financements');
    }
};
