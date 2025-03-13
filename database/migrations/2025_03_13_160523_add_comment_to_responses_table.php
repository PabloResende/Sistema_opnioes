<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentToResponsesTable extends Migration
{
    public function up()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->text('comment')->nullable();
        });
    }

    public function down()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropColumn('comment');
        });
    }
}
