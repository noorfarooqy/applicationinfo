<?php
namespace Drongotech\Applicationinfo\Models;

use Drongotech\ResponseParser\Traits\ErrorParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppApiKeys extends Model
{
    use HasFactory;
    use ErrorParser;
    protected $guarded = ['app_id'];
    protected $table = "app_info";
    protected static $failed_to_update_or_create = " Failed to update api keys. Contact admin for assistance ";

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

    public function apiKeyProvider()
    {
        return $this->belongsTo(AppApiProviders::class, 'provider_id');
    }
}
