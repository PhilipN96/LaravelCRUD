<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportEntry extends Model
{
    protected $fillable = [
        'user_id',
        'week_number',
        'year',
        'title',
        'content',
        'status',
    ];

    /**
     * Der Benutzer, zu dem dieser Eintrag gehört.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}