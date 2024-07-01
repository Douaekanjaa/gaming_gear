<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In add_brand_id_to_products_table.php migration file
public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->foreignId('brand_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['brand_id']);
        $table->dropColumn('brand_id');
    });
}

};
