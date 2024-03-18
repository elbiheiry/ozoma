<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('invitation_type_template_id')->index();
            $table->foreign('invitation_type_template_id')->references('id')->on('invitation_type_templates')->onDelete('cascade');
            
            // $table->unsignedBigInteger('package_id')->index();
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            
            // $table->unsignedBigInteger('user_id')->index()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('title')->nullable();
            $table->string('header')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('date_format')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('sign')->nullable();
            $table->string('send_method')->nullable();
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
        Schema::dropIfExists('invitations');
    }
}
