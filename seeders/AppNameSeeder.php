<?php
namespace Database\Seeders;

use Drongotech\Applicationinfo\Models\ApplicationinfoModel;
use Illuminate\Database\Seeder;

class AppNameSeeder extends Seeder
{

    public function run()
    {
        $appModel = new ApplicationinfoModel();
        $app = $appModel->get()->first();
        if (!$app) {
            try {
                $app = ApplicationinfoModel::create([
                    'app_name' => env('APP_NAME', 'Drongo Technology Limited'),
                    'app_logo' => '/appinfo/assets/images/brand/logo-3.png',
                    'app_logo' => '/appinfo/assets/images/brand/logo.png',
                    'app_email' => 'info@drongo.vip',
                    'app_phone' => '+254706046356',
                    'app_developer' => 'Drongo Technology Limited',
                    'app_address' => 'Yare towers',
                    'app_locale' => 'en',
                ]);
            } catch (\Throwable$th) {
                echo '[-] Error in seeding application info - ' . $th->getMessage();
            }
        }
    }
}
