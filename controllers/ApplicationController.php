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
        return view('appinfo::appinfo.index');
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
}
