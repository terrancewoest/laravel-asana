<?php

if (!function_exists('asana')) {
    /**
     * Get the asana instance.
     *
     * @return \Christhompsontldr\LaravelAsana\Asana
     */
    function asana()
    {
        return app('christhompsontldr.asana');
    }
}
