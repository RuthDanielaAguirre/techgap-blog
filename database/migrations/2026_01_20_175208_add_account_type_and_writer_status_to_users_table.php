<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // OJO: no uses Schema::hasColumn dentro del closure en algunas versiones.
        // Hazlo fuera y luego modifica.
        $hasAccountType = Schema::hasColumn('users', 'account_type');
        $hasWriterStatus = Schema::hasColumn('users', 'writer_status');
        $hasWriterRequestedAt = Schema::hasColumn('users', 'writer_requested_at');

        Schema::table('users', function (Blueprint $table) use ($hasAccountType, $hasWriterStatus, $hasWriterRequestedAt) {
            if (!$hasAccountType) {
                $table->string('account_type')->default('subscriber')->after('password');
            }

            if (!$hasWriterStatus) {
                $table->string('writer_status')->default('none')->after('account_type');
            }

            if (!$hasWriterRequestedAt) {
                $table->timestamp('writer_requested_at')->nullable()->after('writer_status');
            }
        });
    }

    public function down(): void
    {
        $hasAccountType = Schema::hasColumn('users', 'account_type');
        $hasWriterStatus = Schema::hasColumn('users', 'writer_status');
        $hasWriterRequestedAt = Schema::hasColumn('users', 'writer_requested_at');

        Schema::table('users', function (Blueprint $table) use ($hasAccountType, $hasWriterStatus, $hasWriterRequestedAt) {
            // Se eliminan en orden inverso por seguridad
            if ($hasWriterRequestedAt) {
                $table->dropColumn('writer_requested_at');
            }
            if ($hasWriterStatus) {
                $table->dropColumn('writer_status');
            }
            if ($hasAccountType) {
                $table->dropColumn('account_type');
            }
        });
    }
};
