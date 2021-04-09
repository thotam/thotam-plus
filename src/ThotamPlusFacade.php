<?php

namespace Thotam\ThotamPlus;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thotam\ThotamPlus\Skeleton\SkeletonClass
 */
class ThotamPlusFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thotam-plus';
    }
}
