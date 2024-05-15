<?php

namespace App\Models;

use App\Models\Category;
use App\Enums\FavoriteEnum;
use App\Enums\EvaluationEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'summary',
        'category_id',
    ];
    // protected $enums = [
    //     'favorite' => FavoriteEnum::class,
    //     'evaluation' => EvaluationEnum::class,
    // ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
