<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed name
 * @property array|string credits
 * @property array|string availableOnSemester
 * @property mixed id
 */
class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    public function students()
    {
        return $this->belongsToMany('App\Student', 'students_courses');
    }
}
