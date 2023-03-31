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
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->text('enDescription')->nullable()->after('type');
            $table->text('arDescription')->nullable()->after('enDescription');
            $table->text('frDescription')->nullable()->after('arDescription');
            $table->string('imageUrl')->nullable()->after('frDescription');
            $table->boolean('color')->nullable()->after('imageUrl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->dropColumn('enDescription');
            $table->dropColumn('arDescription');
            $table->dropColumn('frDescription');
            $table->dropColumn('imageUrl');
            $table->dropColumn('color');
        });
    }
};
