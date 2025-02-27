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
        Schema::table('products', function (Blueprint $table) {
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->bigInteger('category_id')->unsigned() ;

            $table->foreign('category_id')->references('id')->on('categories') ;

            $table->index('category_id') ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            Schema::dropColumn('category_id') ;
        });
    }
};
