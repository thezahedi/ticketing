<?php

class UnitMaker implements MakerContract
{
    /**
     * @param array $overrides
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|\App\Unit
     */
    public static function create($overrides = [], $count = null)
    {
        return factory(\App\Unit::class, $count)->create($overrides);
    }

    /**
     * @param array $overrides
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|\App\Unit
     */
    public static function make($overrides = [], $count = null)
    {
        return factory(\App\Unit::class, $count)->make($overrides);
    }

    /**
     * @param array $overrides
     * @param null $count
     * @return array
     */
    public static function raw($overrides = [], $count = null)
    {
        return factory(\App\Unit::class, $count)->raw($overrides);
    }
}
