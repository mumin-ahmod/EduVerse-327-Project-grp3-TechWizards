<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = ['course_name', 'course_image', 'category_id', 'teacher_id', 'start_date', 'category_id', 'level', 'trailer_link'];


    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
