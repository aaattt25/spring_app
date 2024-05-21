<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('springs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kana');
            $table->string('tel')->unique();
            $table->string('url');
            $table->string('postcode');
            $table->integer('region_id')->constrained()->onUpdate('cascade');
            $table->integer('prefecture_id')->constrained()->onUpdate('cascade');
            $table->string('city');
            $table->string('address');
            $table->integer('quality_id')->constrained()->onUpdate('cascade');
            $table->string('photo')->nullable();
            $table->string('simple_description');
            $table->text('detail_description');
            $table->boolean('has_restaurant');
            $table->boolean('can_drop_by');
            $table->boolean('is_inn');
            $table->text('fee')->nullable();
            $table->boolean('is_flowing_from_source');
            $table->boolean('has_bedrock_bath');
            $table->boolean('has_sauna');
            $table->boolean('has_parking');
            $table->string('business_hours');
            $table->string('holiday');
            $table->text('efficacy');
            $table->boolean('has_water_drawing_place');
            $table->string('water_drawing_fee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('springs');
    }
};
