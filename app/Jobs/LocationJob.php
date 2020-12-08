<?php

namespace App\Jobs;

use App\Helpers\Google\GeoLocation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LocationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $address;

    /**
     * Create a new job instance.
     *
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }


    public function handle(): string
    {
        $geoLocation = new GeoLocation();

        return $geoLocation->setAddress($this->address)->run()->getLocation();
    }
}
