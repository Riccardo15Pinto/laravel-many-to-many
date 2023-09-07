<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name_project', 'url_project', 'description_project', 'type_id', 'slug', 'image'];

    public function getImagePath()
    {
        return asset('storage/' . $this->image);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
