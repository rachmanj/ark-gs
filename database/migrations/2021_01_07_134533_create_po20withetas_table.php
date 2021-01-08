<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePo20withetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po20withetas', function (Blueprint $table) {
            $table->id();
            $table->string('po_no')->nullable();
            $table->date('posting_date')->nullable();
            $table->string('vendor_code')->nullable();
            $table->string('item_code')->nullable();
            $table->string('description')->nullable();
            $table->string('uom')->nullable();
            $table->integer('qty')->nullable();
            $table->string('project_code')->nullable();
            $table->string('dept_code')->nullable();
            $table->string('po_currency')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('item_amount')->nullable();
            $table->double('total_po_price')->nullable();
            $table->string('unit_no')->nullable();
            $table->string('po_status')->nullable();
            $table->string('po_delivery_status')->nullable();
            $table->date('po_delivery_date')->nullable();
            $table->date('po_eta')->nullable();
            $table->text('remarks')->nullable();
            $table->string('grpo_no')->nullable();
            $table->date('grpo_date')->nullable();
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
        Schema::dropIfExists('po20withetas');
    }
}
