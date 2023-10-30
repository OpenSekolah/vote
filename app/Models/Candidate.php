<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\Uuid;
use Carbon\Carbon;

class Candidate extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'vote_id',
        'name',
        'address',
        'vision',
        'mission',
        'photo',
        'sequence',
        'number_of_votes',
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
        'formattedPhotoAt',
        'formattedCreatedAt',
        'formattedUpdatedAt',
    ];

    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d M Y H:i:s');
    }
	
	public function getFormattedUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->updated_at)->format('d M Y H:i:s');
    }

    public function getFormattedPhotoAtAttribute($value)
    {
        if($this->photo !== null) {
            $folder_name = md5($this->vote_id);
            $file = "file_photo/{$folder_name}/{$this->photo}";
            if(Storage::disk('public')->exists($file)) {
                return asset("storage/{$file}?"  . time());
            }
        }

        return asset("images/profile.jpg?" . time());
    }

    public function scopeWhereVote($query, $search)
    {
        $query->where('candidates.vote_id', $search);
    }

    public function scopeWhereSearch($query, $search)
    {
        foreach (explode(' ', $search) as $term) {
            $query->where('candidates.name', 'LIKE', '%'.$term.'%');
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
        $data = $request->validated();
        $data['vote_id'] = $request->input('vote_id');

        if($model = self::create($data)) {
            if($request->hasFile('file_photo')) {
                $folder_name = md5($model->vote_id);
                Storage::disk('public')->delete("file_photo/{$folder_name}/{$model->photo}");

                $file = $request->file('file_photo');
                $filename = md5($model->id) . '.' . $file->getClientOriginalExtension();
                $file->storeAs("file_photo/{$folder_name}/", $filename, ['disk' => 'public']);
                $model->photo = $filename;
                $model->save();
            }
		}
		
        return $model;
    }

    public function updateWebapp($request) {
        $data = $request->validated();
		
        if($this->update($data)) {
			$data = $this;
            if($request->hasFile('file_photo')) {
                $folder_name = md5($this->vote_id);
                Storage::disk('public')->delete("file_photo/{$folder_name}/{$this->photo}");

                $file = $request->file('file_photo');
                $filename = md5($this->id) . '.' . $file->getClientOriginalExtension();
                $file->storeAs("file_photo/{$folder_name}/", $filename, ['disk' => 'public']);
                $this->photo = $filename;
                $this->save();
            }
		}

        return $this ?? [];
    }

    public function destroyWebapp() {
        $folder_name = md5($this->vote_id);
        $photo = $this->photo;
        if($this->delete()) {
            Storage::disk('public')->delete("file_photo/{$folder_name}/{$photo}");
            return true;
        }

        return false;
    }
}
