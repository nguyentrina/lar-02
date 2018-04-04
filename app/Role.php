<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Not empty
     *
     * @return tag
     */
    public function user()
    {
        $this->hasOne('App\User');
    }
}
