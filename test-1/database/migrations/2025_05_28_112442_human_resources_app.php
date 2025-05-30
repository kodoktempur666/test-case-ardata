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

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('address');
            $table->date('birth_date');
            $table->date('hire_date'); 
            $table->string('status');
            $table->timestamps(); 
            $table->softDeletes();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('assigned_to')->constrained('employees')->onDelete('cascade');
            $table->date('due_date');
            $table->string('status');
            $table->timestamps(); 
            $table->softDeletes();
        });

        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('check_in');
            $table->date('check_out');
            $table->date('date');
            $table->string('status');
            $table->timestamps(); 
            $table->softDeletes();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('employees');
    }
};
