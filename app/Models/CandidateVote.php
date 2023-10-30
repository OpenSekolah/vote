<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class CandidateVote extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'vote_id',
        'voter_id',
        'candidate_id',
        'point',
    ];

    public $timestamps = true;

    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
