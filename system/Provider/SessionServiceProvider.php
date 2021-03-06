<?php

/**
 *   ___       _
 *  / _ \  ___| |_ ___  _ __  _   _
 * | | | |/ __| __/ _ \| '_ \| | | |
 * | |_| | (__| || (_) | |_) | |_| |
 *  \___/ \___|\__\___/| .__/ \__, |
 *                     |_|    |___/
 * @author  : Supian M <supianidz@gmail.com>
 * @link    : www.octopy.xyz
 * @license : MIT
 */

namespace Octopy\Provider;

use SessionHandlerInterface;

use Octopy\Session;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $handler = Session::handler($this->app['config']['session.handler']);
        $this->app->instance(SessionHandlerInterface::class, new $handler(
            $this->app['config']['session']
        ));
    }
}
