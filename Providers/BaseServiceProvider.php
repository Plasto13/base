<?php

namespace Modules\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Base\Events\Handlers\RegisterBaseSidebar;

class BaseServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterBaseSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('filters', array_dot(trans('base::filters')));
            $event->load('halls', array_dot(trans('base::halls')));
            $event->load('lines', array_dot(trans('base::lines')));
            $event->load('equipment', array_dot(trans('base::equipment')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('base', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        // $this->app->bind(
        //     'Modules\Base\Repositories\FilterRepository',
        //     function () {
        //         $repository = new \Modules\Base\Repositories\Eloquent\EloquentFilterRepository(new \Modules\Base\Entities\Filter());

        //         if (! config('app.cache')) {
        //             return $repository;
        //         }

        //         return new \Modules\Base\Repositories\Cache\CacheFilterDecorator($repository);
        //     }
        // );
        $this->app->bind(
            'Modules\Base\Repositories\HallRepository',
            function () {
                $repository = new \Modules\Base\Repositories\Eloquent\EloquentHallRepository(new \Modules\Base\Entities\Hall());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Base\Repositories\Cache\CacheHallDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Base\Repositories\LineRepository',
            function () {
                $repository = new \Modules\Base\Repositories\Eloquent\EloquentLineRepository(new \Modules\Base\Entities\Line());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Base\Repositories\Cache\CacheLineDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Base\Repositories\EquipmentRepository',
            function () {
                $repository = new \Modules\Base\Repositories\Eloquent\EloquentEquipmentRepository(new \Modules\Base\Entities\Equipment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Base\Repositories\Cache\CacheEquipmentDecorator($repository);
            }
        );
// add bindings




    }
}
