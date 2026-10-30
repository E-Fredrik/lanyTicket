<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'ticket_type',
        'quantity',
        'full_name',
        'email',
        'updates',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'updates' => 'boolean',
        ];
    }
}
