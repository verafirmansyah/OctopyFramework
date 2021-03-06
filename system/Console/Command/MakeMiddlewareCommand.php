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

namespace Octopy\Console\Command;

use Octopy\Console\Argv;
use Octopy\Console\Output;
use Octopy\Console\Command;

class MakeMiddlewareCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:middleware';

    /**
     * @var string
     */
    protected $description = 'Create a new middleware class';

    /**
     * @param  Argv   $argv
     * @param  Output $output
     * @return string
     */
    public function handle(Argv $argv, Output $output)
    {
        $parsed = $this->parse($argv);
        if (file_exists($location = $this->app['path']->app->HTTP->middleware($parsed['location']))) {
            return $output->warning('Middleware already exists.');
        }
        
        $data = array(
            'DummyNameSpace' => $parsed['namespace'],
            'DummyClassName' => $parsed['classname'],
        );
        
        if ($this->generate($location, 'Middleware', $data)) {
            return $output->success('Middleware created successfully.');
        }
    }
}
