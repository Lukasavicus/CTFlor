<?php
namespace CTFlor\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class TechnicalVisitParticipant extends Model implements AuthenticatableContract{
    use Authenticatable;

    use Authenticatable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'technicalVisitParticipants';


}
