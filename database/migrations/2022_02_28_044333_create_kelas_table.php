<?php

use App\Kelas;
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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        $data = ['X RPL 1', 'XI RPL 1', 'XII RPL 1'];
        foreach ($data as $d) {
            Kelas::create([
                'nama' => $d,
                'slug' => str($d)->slug()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
