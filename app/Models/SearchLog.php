<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'keyword',
        'user_id',
        'ip_address',
        'device',
        'platform',
        'browser',
        'location',
    ];
}
