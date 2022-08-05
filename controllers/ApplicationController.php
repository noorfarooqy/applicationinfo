<?php
namespace Drongotech\Applicationinfo\Controllers;

use Drongotech\Applicationinfo\Services\AppinfoServices;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function appInfo(Request $request)
    {
        return view('appinfo::appinfo.index');
    }

    public function appStatus(Request $request)
    {
        return view('appinfo::appinfo.status');
    }

    public function apiUpdate(Request $request, AppinfoServices $appinfoServices)
    {
        return $appinfoServices->updateOrCreateAppInfo($request);
    }

    public function apiGetAppInfo(Request $request, AppinfoServices $appinfoServices)
    {
        return $appinfoServices->getAppInfo($request);
    }

    public function apiUpdateLogo(Request $request, AppinfoServices $appinfoServices)
    {
        return $appinfoServices->updateLogo($request);
    }

    public function apiGetMaintenanceStatus(Request $request, AppinfoServices $appinfoServices)
    {
        return $appinfoServices->getMaintenanceStatus($request);
    }

    public function apiUpdateMaintenanceStatus(Request $request, AppinfoServices $appinfoServices)
    {
        return $appinfoServices->updateMaintenanceStatus($request);
    }
}
