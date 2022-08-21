<?php

namespace App\Models;

use Drongotech\ResponseParser\Traits\ErrorParser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppApiProviders extends Model
{
    use HasFactory;
    use ErrorParser;
    protected $guarded = ['provider_id'];
    protected static $failed_to_update_or_create = " Failed to update api provider. Contact admin for assistance ";

    public function updateOrCreateProvider($data)
    {
        try {
            $provider = $this->updateOrCreate(['id' => $data['provider_id'] ?? 0], $data);
            return $provider;
        } catch (\Throwable$th) {
            $this->setError(env('APP_DEBUG') ? $th->getMessage() : $this->getError(static::$failed_to_update_or_create));
            return false;
        }
    }

    public function apiKeys()
    {
        return $this->hasMany(AppApiKeys::class, 'provider_id');
    }
}
