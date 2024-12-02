<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToConferencesTable extends Migration
{
    public function up()
    {
        // Patikrinkite, ar stulpelis 'date' jau egzistuoja
        if (!Schema::hasColumn('conferences', 'date')) {
            Schema::table('conferences', function (Blueprint $table) {
                $table->date('date')->after('name');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('conferences', 'date')) {
            Schema::table('conferences', function (Blueprint $table) {
                $table->dropColumn('date');
            });
        }
    }
}
