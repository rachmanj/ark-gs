<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigi20sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migi20s', function (Blueprint $table) {
            $table->id();
            $table->date('posting_date')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('doc_no')->nullable();
            // $table->string('order_no')->nullable();
            $table->string('project_code')->nullable();
            $table->string('dept_code')->nullable();
            $table->string('item_code')->nullable();
            $table->integer('qty')->nullable();
            $table->string('uom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('migi20s');
    }
}
