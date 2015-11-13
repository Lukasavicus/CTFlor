<?php

namespace CTFlor\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Participant extends Model implements AuthenticatableContract{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name',    
                            'cpf',
                            'email',
                            'phone',
                            'address',
                            'type',
                            'university',
                            'course',
                            'department',
                            'responsability',
                            'password',
                            ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [ 'password'];

    //public static function authParticipant($credentials){
    //    Participant::$loged = Participant::where('cpf', '=' , $credentials['cpf'])->where('password', '=' , $credentials['password'])->where('type', '=', 'organization')->first();
    //    return Participant::$loged;
    //}

    public static function getRolesGeneric(){
        return array('listener', 'speaker');
    }

    public static function getRolesLecture(){
        return array('listener', 'speaker', 'judge');
    }

}
