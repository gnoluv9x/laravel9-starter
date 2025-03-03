<?php

namespace App\Models;

use App\Enum\Common\Gender;
use App\Enum\Students\StudentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'course_id', 'status', 'gender'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getStatus()
    {
        return StudentStatus::getKey($this->status);
    }

    public function getGender()
    {
        return Gender::getKey((string)$this->gender);
    }
}
