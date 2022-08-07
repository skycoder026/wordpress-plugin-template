<?php

namespace WeDevs\Academy\Database\Migrations;

use WeDevs\Academy\Database\Schema;
use WeDevs\Academy\Database\Blueprint;

class CreateAddressBooksTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $table = new Blueprint();

        $table->id('id');
        $table->unsignedBigInteger('product_id');
        $table->string('name');
        $table->string('phone');
        $table->text('address')->nullable();
        $table->string('date')->nullable();
        $table->string('remark')->nullable();
        $table->text('comment')->nullable();
        $table->string('other')->nullable();
        $table->unsignedBigInteger('created_by')->nullable();
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->timestamps();

        Schema::create('address_books', $table);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_books');
    }
}
