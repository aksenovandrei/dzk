<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.02.2019
 * Time: 18:37
 */

namespace App\Repositories;


use App\Day;

class DayRepository extends Repository
{
    public function __construct(Day $day)
    {
        $this->model = $day;
    }

    public function getAvailableDays()
    {
        return $this->model->get();
    }
}