<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'star_rating',
        'review',
        'fullname',
        'email',
        'phone',
        'iam_resident_in_project',
        'tower',
        'flat',
        'reviewed_on',
        'ip_address',
        'approval_status',
        'approved_by',
        'approved_on'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
    public function scopeApprovalStatus($query, $status)
    {
        return $query->where('approval_status', $status);
    }
}
