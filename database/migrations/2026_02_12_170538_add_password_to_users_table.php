<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->string('password')->nullable()->comment('パスワード');
        });

        if (! Schema::hasColumn('m_user', 'pass')) {
            return;
        }

        DB::table('m_user')
            ->whereNotNull('pass')
            ->where(function ($query) {
                $query->whereNull('password')
                    ->orWhere('password', '');
            })
            ->orderBy('id')
            ->select(['id', 'pass'])
            ->chunkById(100, function ($users) {
                foreach ($users as $user) {
                    if ($user->pass === '') {
                        continue;
                    }

                    DB::table('m_user')
                        ->where('id', $user->id)
                        ->update(['password' => Hash::make($user->pass)]);
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropColumn('password');
        });
    }
};
