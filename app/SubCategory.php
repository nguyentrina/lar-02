<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
    public  function subCategoriesJoinCategories(){
        $item = collect([]);
        foreach ($this->with('Category')->get() as $itm)
        {
            $item->push($itm);
        }
        return $item;
    }
}
