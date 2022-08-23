<?php
namespace Drongotech\Applicationinfo\Services;

use Drongotech\Applicationinfo\Models\AppApiKeys;
use Drongotech\Applicationinfo\Models\AppApiProviders;
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
            'provider_location' => 'nullable|string|min:2:max:124',
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
            'provider_api_key' => 'required|string|max:1049',
            'provider_api_secret' => 'nullable|string|max:1049',
            'provider_public_key' => 'nullable|string|max:10499',
            'provider_private_key' => 'nullable|string|max:10499',
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
        $api_key = $apiKeysModel->updateOrCreateApikeys($data);
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

    public function deleteApiKey($request, $api_key)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $api_key = AppApiKeys::find($api_key);
        if (!$api_key) {
            $this->setError($m = "Api key not found");
            return $is_json ? $this->_404Response($m) : false;
        }

        try {
            $deleted = $api_key->delete();
            return $is_json ? $this->Parse(false, 'success', $deleted) : $deleted;
        } catch (\Throwable$th) {
            return $is_json ? $this->Parse(true, $th->getMessage()) : false;
        }

    }
    public function updateApiKeyStatus($request, $api_key)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        if (!in_array($request->action, [1, 0])) {
            $this->setError($m = "Invalid action provided");
            return $is_json ? $this->_422Response($m) : false;
        }
        $api_key = AppApiKeys::find($api_key);
        if (!$api_key) {
            $this->setError($m = "Api key not found");
            return $is_json ? $this->_404Response($m) : false;
        }

        $api_key->is_active = $request->action;
        $api_key->save();

        return $is_json ? $this->Parse(false, 'success', $api_key) : $api_key;

    }

    public function getApiKeyById($request, $id)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $api_key = AppApiKeys::where('id', $id)->with('apiKeyProvider')->get()->first();
        if (!$api_key) {
            $this->setError($m = "API Key not found");
            return $is_json ? $this->_404Response($m) : false;
        }

        return $is_json ? $this->Parse(false, 'success', $api_key) : false;
    }
    public function getProviderById($request, $id)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $provider = AppApiProviders::where('id', $id)->with('apiKeys')->get()->first();
        if (!$provider) {
            $this->setError($m = "API key provider Key not found");
            return $is_json ? $this->_404Response($m) : false;
        }

        return $is_json ? $this->Parse(false, 'success', $provider) : false;
    }
}
