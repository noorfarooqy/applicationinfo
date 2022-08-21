<?php
namespace Drongotech\Applicationinfo\Models;

use App\Models\User;
use Drongotech\ResponseParser\Traits\ErrorParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppApiKeys extends Model
{
    use HasFactory;
    use ErrorParser;
    protected $guarded = ['app_id'];
    protected static $failed_to_update_or_create = " Failed to update api keys. Contact admin for assistance ";
    protected $casts = [
        'created_at' => 'datetime: Y-m-d H:i:s',
        'updated_at' => 'datetime: Y-m-d H:i:s',
    ];

    protected $appends = [
        'creator', 'updated_by',
    ];

    public function getCreatorAttribute()
    {
        return $this->createdBy?->name;
    }

    public function getUpdatedByAttribute()
    {
        return $this->lastUpdatedBy?->name;
    }

    public function updateOrCreateApikeys($data)
    {
        try {
            $appinfo = $this->updateOrCreate(['id' => $data['app_id'] ?? 0], $data);
            return $appinfo;
        } catch (\Throwable$th) {
            $this->setError(env('APP_DEBUG') ? $th->getMessage() : $this->getError(static::$failed_to_update_or_create));
            return false;
        }
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
    public function apiKeyProvider()
    {
        return $this->belongsTo(AppApiProviders::class, 'provider_id');
    }
}
