<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function scopeTrending($query, $take = 3)
    {

        return $query->orderBY('reads', 'desc')->take($take)->get();

    }
}
