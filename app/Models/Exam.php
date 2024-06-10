<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'start_date', 'end_date', 'course_id'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

}
