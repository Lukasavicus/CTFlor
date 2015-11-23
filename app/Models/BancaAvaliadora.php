<?php

namespace CTFlor\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class BancaAvaliadora extends Model implements AuthenticatableContract{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bancaAvaliadora';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'event_id',
                            'professor1',
                            'professor2',
                            'professor3',
                           ];

}
