<?php

namespace App\Models;

use App\Enums\FamilyUserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function parents(): HasMany
    {
        return $this->users()->where('role', FamilyUserRole::Parent);
    }

    public function children(): HasMany
    {
        return $this->users()->where('role', FamilyUserRole::Child);
    }
}
