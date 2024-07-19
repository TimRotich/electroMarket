<?php
namespace App\Providers;

use App\Plugins\Total\Discount\AppConfig;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $config = $this->getPluginConfig();

        $appConfig = new AppConfig();
        $appConfig->configGroup = $config['configGroup'] ?? '';
        $appConfig->configCode = $config['configCode'] ?? '';
        $appConfig->configKey = $config['configKey'] ?? '';
        $appConfig->pathPlugin = $appConfig->configGroup . '/' . $appConfig->configCode . '/' . $appConfig->configKey;
        $appConfig->title = trans($appConfig->pathPlugin . '::lang.title');
        $appConfig->image = $appConfig->pathPlugin . '/' . $config['image'];
        $appConfig->version = $config['version'];
        $appConfig->auth = $config['auth'];
        $appConfig->link = $config['link'];
        $appConfig->separator = false;
        $appConfig->suffix = false;
        $appConfig->prefix = false;
        $appConfig->length = 8;
        $appConfig->mask = '****-****';
    }

    protected function getPluginConfig()
    {
        // Load the plugin configuration from a JSON file or the database
        $configFile = __DIR__ . '/../Plugins/Total/Discount/config.json';
        $config = json_decode(file_get_contents($configFile), true);

        return $config;
    }
}

