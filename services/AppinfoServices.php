<?php
namespace Drongotech\Applicationinfo\Services;

use Drongotech\Applicationinfo\Models\ApplicationinfoModel;
use Drongotech\ResponseParser\DefaultService;

class AppinfoServices extends DefaultService
{
    public function updateOrCreateAppInfo($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $this->rules = [
            'app_name' => 'required|string|min:2|max:125',
            'app_email' => 'required|email|min:2|max:45',
            'app_phone' => 'required|string|min:2|max:20',
            'app_address' => 'required|string|min:2|max:125',
            'app_locale' => 'nullable|string|in:en',
        ];
        $this->CustomValidate();
        if ($this->has_failed) {
            return $is_json ? $this->_422Response($this->getMessage()) : false;
        }
        $data = $this->ValidatedData();

        $existing_app = ApplicationinfoModel::get()->first();
        if ($existing_app) {
            $data['app_id'] = $existing_app->id;
        }

        $appModel = new ApplicationinfoModel();
        $appinfo = $appModel->updateOrCreateAppinfo($data);

        if ($appinfo) {
            return $is_json ? $this->Parse(false, 'success', $data) : $data;
        }
        $this->setError($m = $appModel->getMessage());
        return $is_json ? $this->Parse(true, $m) : false;

    }
    public function updateLogo($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $this->rules = [
            'app_logo' => 'required|image',
            'logo_type' => 'required|integer|in:1,2',
        ];

        $this->CustomValidate();
        if ($this->has_failed) {
            return $is_json ? $this->_422Response($this->getMessage()) : false;
        }

        $data = $this->ValidatedData();

        $app_logo = $this->UploadPublicFile($data['app_logo'], "/uploads/appinfo/logos");
        if (!$app_logo) {
            $this->setError($m = $this->getMessage());
            return $is_json ? $this->Parse(true, $m) : false;
        }
        if ($data['logo_type'] == 2) {
            $data = [
                'app_logo_mobile' => $app_logo,
            ];
        } else {
            $data = ['app_logo' => $app_logo];
        }
        $existing_app = ApplicationinfoModel::get()->first();
        if ($existing_app) {
            $data['app_id'] = $existing_app->id;
        }

        $appModel = new ApplicationinfoModel();
        $appinfo = $appModel->updateOrCreateAppinfo($data);

        if ($appinfo) {
            return $is_json ? $this->Parse(false, 'success', $data) : $data;
        }
        $this->setError($m = $appModel->getMessage());
        return $is_json ? $this->Parse(true, $m) : false;

    }

    public function getAppInfo($request)
    {
        $this->request = $request;
        $is_json = $this->ResponseType();

        $appinfo = ApplicationinfoModel::get()->first();

        return $is_json ? $this->Parse(false, 'success', $appinfo) : $appinfo;
    }
}
