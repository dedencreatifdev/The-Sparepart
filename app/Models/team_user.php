<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class team_user extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $table = 'team_user';
    protected $fillable = [
        'team_id',
        'user_id',
    ];
}
