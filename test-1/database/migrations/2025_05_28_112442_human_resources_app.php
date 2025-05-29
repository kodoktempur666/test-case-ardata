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
        // 1. Create departments first
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps(); 
            $table->softDeletes();
        });

        // 2. Create roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps(); 
            $table->softDeletes();
        });

        // 3. Create employees
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('address');
            $table->date('birth_date');
            $table->date('hire_date');
            $table->foreignId('department_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('role_id')->constrained()->onDelete('cascade'); 
            $table->string('status');
            $table->decimal('salary', 10, 2)->default(0.00);
            $table->timestamps(); 
            $table->softDeletes();
        });

        // 4. Create tasks
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

        // 5. Create payroll
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('salary', 10, 2);
            $table->decimal('bonuses', 10, 2)->nullable();
            $table->decimal('deduction', 10, 2)->nullable();
            $table->decimal('net_salary', 10, 2);
            $table->date('pay_date');
            $table->timestamps(); 
            $table->softDeletes();
        });

        // 6. Create presences
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

        // 7. Create leave_requests
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
        Schema::dropIfExists('presences');
        Schema::dropIfExists('payroll');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('employees');
    }
};
