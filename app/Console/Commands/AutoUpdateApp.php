<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class AutoUpdateApp extends Command
{
    protected $signature = 'app:update';
    protected $description = 'Cek dan update aplikasi dari server pusat';

    public function handle()
    {
        $this->info("🔍 Mengecek update dari server...");

        $response = Http::get('https://cms-unkhair.wahyuumaternate.my.id/api/check-update'); // Ganti dengan URL server kamu

        if (!$response->ok()) {
            $this->error('❌ Gagal menghubungi server update.');
            return;
        }

        $data = $response->json();
        $currentVersion = config('app.version');
        $remoteVersion = $data['version'];

        if (version_compare($remoteVersion, $currentVersion, '<=')) {
            $this->info("✅ Aplikasi sudah versi terbaru ($currentVersion)");
            return;
        }

        $this->info("📦 Update tersedia: v{$remoteVersion}");
        $this->info("📄 Catatan rilis: " . $data['changelog']);

        // 1. Download file ZIP
        $this->info("⬇️ Mengunduh file update...");
        $fileContents = file_get_contents($data['file_url']);
        $zipPath = storage_path("app/update.zip");
        file_put_contents($zipPath, $fileContents);

        // 2. Ekstrak file
        $this->info("📂 Mengekstrak dan meng-overwrite file...");
        $zip = new ZipArchive;
        if ($zip->open($zipPath) === TRUE) {
            $zip->extractTo(base_path());
            $zip->close();
            $this->info("✅ File berhasil diekstrak.");
        } else {
            $this->error("❌ Gagal mengekstrak file ZIP.");
            return;
        }

        // 3. Jalankan migrasi jika diperlukan
        if (isset($data['migrate']) && $data['migrate']) {
            $this->info("🛠️ Menjalankan migrasi database...");
            Artisan::call('migrate', ['--force' => true]);
            $this->info(Artisan::output());
        }

        // 4. Update versi aplikasi di config atau simpan di database
        $this->info("📌 Menyimpan versi aplikasi terbaru...");

        // Contoh jika kamu simpan versi di .env (opsional)
        $envPath = base_path('.env');
        if (file_exists($envPath)) {
            $env = file_get_contents($envPath);
            $env = preg_replace('/APP_VERSION=(.*)/', "APP_VERSION={$remoteVersion}", $env);
            file_put_contents($envPath, $env);
        }

        // Clear cache & rebuild setelah update
        Artisan::call('optimize:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');

        Artisan::call('config:cache');
        Artisan::call('route:cache');
        $this->info("🎉 Update selesai! Sekarang versi {$remoteVersion}");
    }
}
