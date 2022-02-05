<?php

namespace Modules\Option\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Option\Entities\Option;

class OptionServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Option';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'option';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        if (Schema::hasColumn('options', 'option_name')) {

            $admin_email = Option::where('option_name', 'admin_email')->first();
            $mailserver_url = Option::where('option_name', 'mailserver_url')->first();
            $mailserver_login = Option::where('option_name', 'mailserver_login')->first();
            $mailserver_pass = Option::where('option_name', 'mailserver_pass')->first();
            $mailserver_port = Option::where('option_name', 'mailserver_port')->first();
            $mailserver_encryption = Option::where('option_name', 'mailserver_encryption')->first();
            $site_name = Option::where('option_name', 'site_name')->first();

            if (isset($site_name)) {
                Config::set('app.name', $site_name->option_value);

                $config = [
                    'driver' => 'smtp',
                    'host' => $mailserver_url->option_value,
                    'port' => $mailserver_port->option_value,
                    'username' => $mailserver_login->option_value,
                    'password' => $mailserver_pass->option_value,
                    'encryption' => $mailserver_encryption->option_value,
                    'from' => array('address' => $admin_email->option_value, 'name' => $site_name->option_value),
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                ];
                Config::set('mail', $config);
            }


        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
