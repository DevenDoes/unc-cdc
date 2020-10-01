<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('about');
            $table->string('linkedin');
            $table->string('github');
            $table->string('discord');
            $table->string('twitter');
            $table->boolean('share_academics');
            $table->timestamps();
            $table->softDeletes();
        });

        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $user->profile()->create([
                'about' => '',
                'linkedin' => '',
                'github' => '',
                'discord' => '',
                'twitter' => '',
                'share_academics' => true,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
