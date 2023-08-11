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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();       
            $table->string('LeaveType');
            $table->string('ToDate');
            $table->string('FromDate');
            $table->string('Description');
            $table->string('PostingDate');
            $table->string('AdminRemark');
            $table->string('AdminRemarkDate');
            $table->string('Status');
            $table->string('IsRead');
            $table->string('empid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
