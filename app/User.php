<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password', 'level',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *$table->increments('id');
            $table->string('name');
            $table->string('username', 60);
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('level');
        });
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
