<?php

use App\Models\Employer;
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
        Schema::table('jobs', function (Blueprint $table) {
        $table->index('created_at');
        });
//        Schema::create('jobs', function (Blueprint $table) {
//            $table->id();
//            $table->foreignIdFor(Employer::class);
//            $table->string('title');
//            $table->string('salary');
//            $table->string('location');
//            $table->string('schedule')->default('Full Time');
//            $table->string('url')->nullable();
//            $table->boolean('Featured');
//            $table->string('aboutUs',3000);
//            $table->string('requirements',3000);
//            $table->string('responsibilities',3000);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
