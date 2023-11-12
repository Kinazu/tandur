<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    /**
     * Summary of build
     * @return LarapexChart
     */
    public function build()
    {
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addLine('Active Users', \App\Models\User::query()->inRandomOrder()->limit(6)->pluck('id')->toArray())
            ->addLine('Inactive users', \App\Models\User::query()->inRandomOrder()->limit(6)->pluck('id')->toArray())
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June'])
            ->setColors(['#ffc63b', '#ff638']);
    }
}