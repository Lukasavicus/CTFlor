<?php

namespace CTFlor\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Chat extends Model implements AuthenticatableContract{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat';

    protected $fillable = [ 'userParticipant',
                            'userBanca',
                            'userParticipant_is_typing',
                            'userBanca_is_typing',
                          ];


}
