<?php

namespace App\Models;
// we dont have to touch to much this file (for must of part)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // we used the Model::unguard() in
    // app > http > providers > AppServiceProvider.php
    // instead of the protected fillable property in here
    // protected $fillable =
    // [
    //     'title', 'company', 'email', 'location',
    //     'website', 'tags', 'description'
    // ];

    // create our scopeFilter()
    public function scopeFilter($query, array $filters)
    {
        // dd($filters['tag']);

        // null coalescing opeator
        // meaning if the is not false then move on
        // if this is a tag then do what is in here

        // Laravel Eloquent query builder > light query

        $query->where('tags', 'like', '%' . request('tag') . '%');
        // Column name : tags
        // Comparaison operator : 'like'
        // Value to compare with : '%' . request('tag') . '%'
        //It filters the rows based on the tags column, using the LIKE SQL Operator
        //the LIKE Operator is used to search for a specified pattern in a column
        // it will research whatever thst tag is in that tags column in the DB

        if ($filters['search'] ?? false) {
            //
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
