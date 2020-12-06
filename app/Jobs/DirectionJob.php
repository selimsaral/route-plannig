<?php

namespace App\Jobs;

use App\Helpers\Direction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DirectionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $locations;

    private string $origin;

    public function __construct(array $locations)
    {
        $this->locations = $locations;

        $this->setOrigin();
    }

    public function setOrigin()
    {
        $this->origin = $this->locations[0];
        unset($this->locations[0]);
    }

    public function handle()
    {
        $direction = new Direction();

        return $direction
            ->setOrigin($this->origin)
            ->setDestination($this->origin)
            ->setWayPoints($this->locations)
            ->run()
            ->getRoutes();
    }
}
