<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Voter extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'vote_id',
        'token',
        'sequence',
        'is_active'
    ];

    public $timestamps = true;

    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $appends = [
        'formattedCreatedAt',
        'formattedUpdatedAt',
    ];


    public function voter_logs() {
        return $this->hasMany(VoterLog::class, 'voter_id', 'id');
    }

    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d M Y H:i:s');
    }
	
	public function getFormattedUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->updated_at)->format('d M Y H:i:s');
    }

    public function scopeWhereVote($query, $search)
    {
        $query->where('voters.vote_id', $search);
    }

    public function scopeWhereSearch($query, $search)
    {
        foreach (explode(' ', $search) as $term) {
            $query->where('voters.token', 'LIKE', '%'.$term.'%');
        }
    }
    
    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);
        if ($filters->get('search')) {
            $query->whereSearch($filters->get('search'));
        }
    }

    public function scopePaginateData($query, $limit)
    {
        if ($limit == 'all') {
            return collect(['data' => $query->get()]);
        }

        return $query->paginate($limit);
    }

    public static function autoSequence($vote_id) {
        if($voter = Voter::where('vote_id', $vote_id)->orderBy('sequence', 'DESC')->first()) {
            return (int) $voter->sequence + 1;
        } else {
            return 1;
        }
    }

    public static function createWebapp($request) {
        $data = $request;
        $count = (int) $data['voters'];
        for($i=1;$i<=$count;$i++) {
            $uuid = generalUuidToNumber($data['vote_id']);
            $rantoken = strtoupper(Str::random(5));

            $data = [
                'token' => "{$rantoken}{$uuid}",
                'vote_id' => $data['vote_id'],
                'sequence' => Voter::autoSequence($data['vote_id']),
            ];

            Voter::updateOrCreate($data, $data);
        }

        return true;
    }

    public function destroyWebapp() {
        if($this->delete()) {
            return true;
        }

        return false;
    }
}
