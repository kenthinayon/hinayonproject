<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HinayonCreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing 'id' column
            $table->string('name'); // String column for 'name'
            $table->integer('age'); // Integer column for 'age'
            $table->boolean('is_active')->default(true); // Boolean column for 'is_active', with a default value of true
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns
              });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
