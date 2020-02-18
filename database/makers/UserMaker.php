<?php

class UserMaker implements MakerContract
{
    /**
     * @param array $overrides
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|\App\User
     */
    public static function create($overrides = [], $count = null)
    {
        return factory(\App\User::class, $count)->create($overrides);
    }

    /**
     * @param array $overrides
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection|\App\User
     */
    public static function make($overrides = [], $count = null)
    {
        return factory(\App\User::class, $count)->make($overrides);
    }

    /**
     * @param array $overrides
     * @param null $count
     * @return array
     */
    public static function raw($overrides = [], $count = null)
    {
        return factory(\App\User::class, $count)->raw($overrides);
    }
}
