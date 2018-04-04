<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'price',
    'quantity',
    'content',
    'sub_category_id'
    ];

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
    public function CategoryJoinSubCategory()
    {
        $item = collect([]);
        foreach ($this->with('SubCategory')->get() as $itm)
        {
            $item->push($itm);
        }
        return $item;
    }
}
