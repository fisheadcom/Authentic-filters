<?php namespace Snapperit\Interested\Models;

use Model;

/**
 * Model
 */
class Interest extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'snapperit_interested_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
