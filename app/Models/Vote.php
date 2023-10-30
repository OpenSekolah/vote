<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Carbon\Carbon;

class Vote extends Model
{
    use HasFactory, Uuid;

	protected $fillable = [
        'name',
        'slug',
        'desc',
        'number_of_choices',
        'is_active',
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

    public function candidates() {
        return $this->hasMany(Candidate::class, 'vote_id', 'id');
    }

    public function voters() {
        return $this->hasMany(Voter::class, 'vote_id', 'id');
    }

    public function voters_active() {
        return $this->hasMany(Voter::class, 'vote_id', 'id')->where('is_active', true);
    }

    public function voters_inactive() {
        return $this->hasMany(Voter::class, 'vote_id', 'id')->where('is_active', false);
    }

    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d M Y H:i:s');
    }
	
	public function getFormattedUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->updated_at)->format('d M Y H:i:s');
    }

    public function scopeWhereSearch($query, $search)
    {
        foreach (explode(' ', $search) as $term) {
            $query->where('votes.name', 'LIKE', '%'.$term.'%');
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

    public static function createWebapp($request) {
        $data = $request;

        if($model = self::create($data)) {

		}
		
        return $model;
    }

    public function updateWebapp($request) {
        $data = $request;
		
        if($this->update($data)) {
			$data = $this;
		}

        return $this ?? [];
    }
}
