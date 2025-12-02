<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'permissions',
        'status',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * Get all users with this role
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Check if role has a specific permission
     */
    public function hasPermission(int $permissionId): bool
    {
        if (!$this->permissions) {
            return false;
        }

        return in_array($permissionId, $this->permissions);
    }

    /**
     * Check if role is admin (has all permissions)
     */
    public function isAdmin(): bool
    {
        return $this->slug === 'admin';
    }
}
