<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRadioToResponsesTable extends Migration
{
    public function up()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->string('radio')->nullable();
        });
    }

    public function down()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropColumn('radio');
        });
    }
}
