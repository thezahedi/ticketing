<?php

interface MakerContract
{
    public static function create($overrides = [], $count = null);
    public static function make($overrides = [], $count = null);
    public static function raw($overrides = [], $count = null);
}
