<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.02.2019
 * Time: 18:38
 */

namespace App\Repositories;


use App\Interval;

class IntervalRepository extends Repository
{
    public function __construct(Interval $interval)
    {
        $this->model = $interval;
    }
}