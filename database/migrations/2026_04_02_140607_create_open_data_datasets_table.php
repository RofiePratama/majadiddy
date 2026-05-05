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
        Schema::create('open_data_dataset', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('source_agency');
            $table->string('dataset_url');
            $table->timestamp('published_at');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_data_datasets');
    }
};
