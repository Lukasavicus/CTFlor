<?php

namespace CTFlor\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Activity extends  Model implements AuthenticatableContract{
    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name',
                            'start',
                            'startTime',
                            'end',
                            'endTime',
                            'location',
                            'qnt_participants',
                            'type',
                            'id_event',
                            'priceActivity',
                          ];

    public static function getTypes(){
        return array(
                array('value' => 'lecture', 'text' => 'Palestra'),
                array('value' => 'mini_course', 'text' => 'Mini-Curso'),
                array('value' => 'technical_visit', 'text' => 'Visita Técnica')
               );
    }

}
