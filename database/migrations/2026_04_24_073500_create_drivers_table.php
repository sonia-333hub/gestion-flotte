<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('drivers', function (Blueprint $table) {

        $table->charset = 'utf8';
        $table->collation = 'utf8_unicode_ci';

        $table->id();

        $table->string('nom', 191);
        $table->string('prenom', 191);
        $table->string('telephone', 191);
        $table->string('permis', 191);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
