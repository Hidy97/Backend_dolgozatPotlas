<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::unprepared('CREATE TRIGGER add_quantity AFTER INSERT ON winnings
        FOR EACH ROW
        BEGIN
            UPDATE users SET quantity = quantity + 1 WHERE user_id = NEW.user_id;
        END');
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        //
        DB::unprepared("DROP TRIGGER IF EXISTS add_quantity");
    }
};
