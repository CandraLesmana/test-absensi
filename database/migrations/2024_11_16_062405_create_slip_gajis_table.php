<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slip_gajis', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('periode');
            $table->bigInteger('working_days');
            $table->bigInteger('att_total');
            $table->bigInteger('not_att_checkin_chekout');
            $table->bigInteger('not_att');
            $table->bigInteger('late_att');
            $table->float('not_att_checkin_chekout_total');
            $table->float('not_att_total');
            $table->float('late_att_total');
            $table->float('charge_total');
            $table->float('net_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slip_gajis');
    }
};
