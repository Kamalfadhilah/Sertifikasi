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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_lengkap')->nullable();

            // alamat
            $table->string('alamat_KTP')->nullable();
            $table->string('alamat_lengkap')->nullable();

            // Provinsi
            $table->string('provinsi_id')->nullable();
            
            // Kabupaten
            $table->string('kabupaten_id')->nullable();

            // Kecamatan
            $table->string('kecamatan_id')->nullable();

            // Kelurahan
            $table->string('kelurahan_id')->nullable();

            // Kontak 
            $table->string('nomor_telepon')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // kewarganegaraan
            $table->enum('kewarganegaraan', ['wni_asli', 'wni_keturunan', 'wna'])->default('wni_asli');

            // ttd
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();

            // bio
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->enum('status_menikah', ['belum_menikah', 'menikah', 'lain_lain']);
            $table->enum('agama', ['islam', 'katolik', 'kristen', 'hindu', 'budha', 'lain_lain']);

            // dokumen
            $table->string('dokument')->nullable();
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
