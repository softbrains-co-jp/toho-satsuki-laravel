<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('sessions') || ! Schema::hasColumn('sessions', 'user_id')) {
            return;
        }

        DB::statement(<<<'SQL'
DO $$
BEGIN
    IF EXISTS (
        SELECT 1
        FROM information_schema.columns
        WHERE table_name = 'sessions'
          AND column_name = 'user_id'
          AND udt_name NOT IN ('varchar', 'text')
    ) THEN
        ALTER TABLE "sessions"
            ALTER COLUMN "user_id" TYPE varchar(255)
            USING "user_id"::text;
    END IF;
END
$$;
SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('sessions') || ! Schema::hasColumn('sessions', 'user_id')) {
            return;
        }

        DB::statement(<<<'SQL'
DO $$
BEGIN
    IF EXISTS (
        SELECT 1
        FROM information_schema.columns
        WHERE table_name = 'sessions'
          AND column_name = 'user_id'
          AND udt_name IN ('varchar', 'text')
    ) THEN
        ALTER TABLE "sessions"
            ALTER COLUMN "user_id" TYPE bigint
            USING CASE
                WHEN "user_id" ~ '^[0-9]+$' THEN "user_id"::bigint
                ELSE NULL
            END;
    END IF;
END
$$;
SQL);
    }
};
