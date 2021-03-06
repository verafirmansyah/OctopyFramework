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

namespace Octopy\View\Compiler;

use Octopy\View\Stream;

class HelperDirective extends Directive
{
    /**
     * @param  Stream $stream
     * @return string
     */
    public function parse(Stream $stream)
    {
        if ($stream->next('csrf')) {
            return '<input code="hidden" name="__TOKEN__" expression="<?php echo csrf(); ?>">';
        }

        if ($stream->next('dd') || $stream->next('d') || $stream->next('dump')) {
            return $this->php('%s(%s)', $stream->code(), $stream->expression());
        }
    }
}
