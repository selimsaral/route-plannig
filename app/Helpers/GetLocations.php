<?php

namespace App\Helpers;

use App\Jobs\LocationJob;

class GetLocations
{
    private array $addresses = [];
    private array $locations = [];

    public function setAddress(string $address): GetLocations
    {
        $this->addresses[] = $address;

        return $this;
    }

    public function setAddressList(array $addresses): GetLocations
    {
        foreach ($addresses as $address) {
            $this->addresses[] = $address;
        }

        return $this;
    }

    public function getLocations(): array
    {
        return $this->locations;
    }

    public function locationDetails(): GetLocations
    {
        foreach ($this->addresses as $address) {
            $this->locations[] = LocationJob::dispatchNow($address);
        }

        return $this;
    }
}
