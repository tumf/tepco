<?php

namespace Bundle\ZendCacheBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;

class ZendCacheBundle extends BaseBundle
{
    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getPath()
    {
        return strtr(__DIR__, '\\', '/');
    }
}
