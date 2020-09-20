<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    public function bucketLists(): HasMany
    {
        return $this->hasMany(BucketList::class);
    }
}
