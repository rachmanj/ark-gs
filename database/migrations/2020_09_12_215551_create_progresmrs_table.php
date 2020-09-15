<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgresmrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresmrs', function (Blueprint $table) {
            $table->id();
            $table->string('wo_no')->nullable();
            $table->date('wo_date')->nullable();
            $table->date('wo_created')->nullable();
            $table->string('wo_status')->nullable();
            $table->string('mr_no')->nullable();                        //							
            $table->string('mr_rev_no')->nullable();
            $table->string('mr_status')->nullable();
            $table->string('mr_close_status')->nullable();
            $table->date('mr_date')->nullable();
            $table->date('mr_creation')->nullable();
            $table->date('required_date')->nullable();
            $table->string('priority')->nullable();
            $table->string('project_code')->nullable();
            $table->string('pq_no')->nullable();
            $table->date('pq_date')->nullable();
            $table->date('pq_creation')->nullable();
            $table->string('pr_no')->nullable();
            $table->date('pr_date')->nullable();
            $table->date('pr_creation')->nullable();
            $table->string('pr_close_status')->nullable();
            $table->string('pr_rev')->nullable();
            $table->string('authorizer')->nullable();
            $table->string('answer')->nullable();
            $table->date('aprv_date')->nullable();
            $table->string('po_no')->nullable();
            $table->date('po_date')->nullable();
            $table->date('po_creation')->nullable();
            $table->date('po_sent')->nullable();
            $table->date('po_eta')->nullable();
            $table->date('po_required')->nullable();
            $table->string('grpo_no')->nullable();
            $table->date('grpo_date')->nullable();
            $table->date('grpo_creation')->nullable();
            $table->integer('grpo_qty')->nullable();
            $table->string('curr')->nullable();
            $table->double('price')->nullable();
            $table->double('amount')->nullable();
            $table->string('ito_no')->nullable();
            $table->date('ito_date')->nullable();
            $table->date('ito_creation')->nullable();
            $table->date('ito_sent')->nullable();
            $table->string('iti_no')->nullable();
            $table->date('iti_date')->nullable();
            $table->date('iti_creation')->nullable();
            $table->string('mi_no')->nullable();
            $table->date('mi_date')->nullable();
            $table->date('mi_creation')->nullable();
            $table->string('unit_no')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->integer('hm')->nullable();
            $table->integer('km')->nullable();
            $table->string('order_type')->nullable();
            $table->string('location')->nullable();
            $table->string('item_code')->nullable();
            $table->string('description')->nullable();
            $table->string('group')->nullable();
            $table->integer('mr_qty')->nullable();
            $table->integer('open_qty')->nullable();
            $table->integer('stock_wh')->nullable();
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
        Schema::dropIfExists('progresmrs');
    }
}
