<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['dob'];

    public function setDobAttribute($dob) {
          // $this->attributes['dob'] = Carbon::parse($dob);
    }

    public function setAuthorAttribute($author){
     //  $this->attributes['author_id'] = Author::firstOrCreate(['name' => $author]);

    }
}
