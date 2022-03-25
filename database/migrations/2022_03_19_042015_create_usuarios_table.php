<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable($value = true);
            $table->string('tercer_nombre')->nullable($value = true);
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable($value = true);
            $table->string('apellido_casada')->nullable($value = true);
            $table->date('fecha_nacimiento')->nullable($value = true);
            $table->string('num_dpi');
            $table->string('profesion')->nullable($value = true);
            $table->string('foto')->nullable($value = true);
            $table->integer('anios_laborando')->nullable($value = true);
            $table->float('salario',10,2);
            $table->string('email')->unique();
            $table->string('contrasenia');
            $table->foreignId('rol_id')->constrained();
            $table->foreignId('estado_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
