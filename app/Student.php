<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array|string name
 * @property array|string birthDate
 * @property array|string gender
 * @property array|string semester
 * @property array|string isEnrolled
 */
class Student extends Model
{
    use SoftDeletes;

    protected $table = 'students';

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    public function courses()
    {
        return $this->belongsToMany('App\Course', 'students_courses');
    }
}
