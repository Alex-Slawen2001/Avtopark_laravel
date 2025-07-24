<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Car extends Model
{
    public function users(): BelongsToMany  {
        return $this->belongsToMany(User::class);
    }
}
