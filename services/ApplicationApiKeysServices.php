<?php
namespace Drongotech\Applicationinfo\Services;

use App\Models\AppApiKeys;
use App\Models\AppApiProviders;
use Drongotech\ResponseParser\DefaultService;

class ApplicationApiKeysServices extends DefaultService
{
    public function updateOrCreateProviders($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $this->rules = [
            'provider_name' => 'required|string|min:2:max:124',
            'provider_type' => 'nullable|string|min:2:max:124',
        ];

        $this->CustomValidate();
        if ($this->has_failed) {
            return $is_json ? $this->_422Response($this->getMessage()) : false;
        }
        $data = $this->ValidatedData();

        $providersModel = new AppApiProviders();
        $provider = $providersModel->updateOrCreateProvider($data);
        if ($provider) {
            return $is_json ? $this->Parse(false, 'success', $provider) : $provider;
        }
        $this->setError($m = $providersModel->getMessage());
        return $is_json ? $this->Parse(true, $m) : false;
    }
    public function updateOrCreateApiKey($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $this->rules = [
            'api_id' => 'nullable|integer|exists:app_api_keys,id',
            'provider_id' => 'required|integer|exists:app_api_providers,id',
            'provider_api_key' => 'required|string|1049',
            'provider_api_secret' => 'nullable|string|1049',
            'provider_public_key' => 'nullable|string|10499',
            'provider_private_key' => 'nullable|string|10499',
        ];

        $this->CustomValidate();
        if ($this->has_failed) {
            return $is_json ? $this->_422Response($this->getMessage()) : false;
        }
        $data = $this->ValidatedData();
        if (!$request->filled('api_id')) {
            $data['created_by'] = $request->user()->id;
        }
        $data['last_updated_by'] = $request->user()->id;

        $apiKeysModel = new AppApiKeys();
        $api_key = $apiKeysModel->updateOrCreateProvider($data);
        if ($api_key) {
            return $is_json ? $this->Parse(false, 'success', $api_key) : $api_key;
        }
        $this->setError($m = $apiKeysModel->getMessage());
        return $is_json ? $this->Parse(true, $m) : false;
    }

    public function getLatestApiKeys($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $api_keys = AppApiKeys::with('apiKeyProvider')->latest()->get();

        return $is_json ? $this->Parse(false, 'success', $api_keys) : $api_keys;
    }
    public function getLatestApiProviders($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $api_providers = AppApiProviders::with('apiKeys')->latest()->get();

        return $is_json ? $this->Parse(false, 'success', $api_providers) : $api_providers;
    }
}
