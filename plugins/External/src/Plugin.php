<?php
declare(strict_types=1);

namespace External;

use Cake\Core\Configure;
use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;

/**
 * Plugin for External
 */
class Plugin extends BasePlugin
{
    /**
     * Load all the plugin configuration and bootstrap logic.
     *
     * The host application is provided as an argument. This allows you to load
     * additional plugin dependencies, or attach events.
     *
     * @param \Cake\Core\PluginApplicationInterface $app The host application
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
    }

    /**
     * Add routes for the plugin.
     *
     * If your plugin has many routes and you would like to isolate them into a separate file,
     * you can create `$plugin/config/routes.php` and delete this method.
     *
     * @param \Cake\Routing\RouteBuilder $routes The route builder to update.
     * @return void
     */
    // public function routes(RouteBuilder $routes): void
    // {
        // $routes->plugin(
            // 'External',
            // ['path' => '/external'],
            // function (RouteBuilder $builder) {
                //// Add custom routes here

                // $builder->fallbacks();
            // }
        // );
        // parent::routes($routes);
    // }

    /**
     * Add middleware for the plugin.
     *
     * @param \Cake\Http\MiddlewareQueue $middleware The middleware queue to update.
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Add your middlewares here

        return $middlewareQueue;
    }

    public function routes($routes): void
    {
        $middlewares = Configure::read('Api.Middleware');
        foreach ($middlewares as $alias => $middleware) {
            $class = $middleware['class'];
            if (array_key_exists('request', $middleware)) {
                $requestClass = $middleware['request'];
                $request = new $requestClass();
                if (array_key_exists('method', $middleware)) {
                    $request = $request->{$middleware['method']}();
                }
                if (array_key_exists('params', $middleware)) {
                    $options = $middleware['params'];
                    $routes->registerMiddleware($alias, new $class($request, $options));
                } else {
                    $routes->registerMiddleware($alias, new $class($request));
                }
            } else {
                $routes->registerMiddleware($alias, new $class());
            }
        }

        parent::routes($routes);
    }

}
