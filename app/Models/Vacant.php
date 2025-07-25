<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "salary_id",
        "category_id",
        "company",
        "last_day",
        "description",
        "image",
        "user_id",
    ];

    protected $table = "vacancies";

    protected $dates = ['last_day'];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
