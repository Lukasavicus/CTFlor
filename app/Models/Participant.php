<?php

namespace CTFlor\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Participant extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
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
    protected $hidden = ['password'];

    public function hasRole( $role )
    {
        return $this->type == $role;
    }

    public function getRole( )
    {
        return $this->type;
    }

    public function getId( )
    {
        return $this->id;
    }

    public static function getRolesGeneric()
    {
        return array('student', 'community');
    }

    public static function getRolesLecture()
    {
        return array('student', 'professor', 'community');
    }

}
