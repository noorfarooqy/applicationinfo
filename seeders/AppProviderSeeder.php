<?php

namespace Database\Seeders;

use Drongotech\Applicationinfo\Models\AppApiProviders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppProviderSeeder extends Seeder
{

    public function run()
    {
        $providers = config('appinfo.api_providers', []);
        echo "[*] Found " . count($providers) . " proivider(s) to seed" . PHP_EOL;

        DB::beginTransaction();
        $providerModel = new AppApiProviders();
        foreach ($providers as $key => $provider) {
            $seeded_provider = $providerModel->updateOrCreateProvider([
                'provider_name' => $provider['name'],
                'provider_location' => $provider['location'] ?? null,
                'provision_type' => $provider['type'] ?? null,
                'is_active' => $provider['is_active'] ?? true,
            ]);

            if (!$seeded_provider) {
                DB::rollBack();
                echo "[-] Error seeding provider " . $provider['name'] . ' - ' . $providerModel->getMessage() . PHP_EOL;
                return;
            }
        }

        DB::commit();
        echo "[*] Completed api providers seeder " . PHP_EOL;
    }
}
