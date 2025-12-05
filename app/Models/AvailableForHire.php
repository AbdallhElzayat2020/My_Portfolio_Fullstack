<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableForHire extends Model
{
    protected $table = 'available_for_hire';

    protected $fillable = [
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    /**
     * Get the current availability status
     */
    public static function getStatus(): bool
    {
        $record = self::first();
        return $record ? $record->status : false;
    }
}
