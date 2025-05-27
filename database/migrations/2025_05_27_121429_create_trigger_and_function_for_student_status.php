<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create trigger untuk mengubah status_pkl menjadi Aktif
        DB::unprepared('
            CREATE TRIGGER after_internship_created
            AFTER INSERT ON internships
            FOR EACH ROW
            BEGIN
                UPDATE students
                SET status_pkl = "Aktif"
                WHERE id = NEW.student_id;
            END
        ');

        // Create function untuk format gender
        DB::unprepared('
            CREATE FUNCTION format_gender(gender CHAR)
            RETURNS VARCHAR(20)
            DETERMINISTIC
            BEGIN
                IF gender = "L" THEN
                    RETURN "Laki-Laki";
                ELSE
                    RETURN "Perempuan";
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop trigger and function
        DB::unprepared('DROP TRIGGER IF EXISTS after_internship_created');
        DB::unprepared('DROP FUNCTION IF EXISTS format_gender');
    }
};
