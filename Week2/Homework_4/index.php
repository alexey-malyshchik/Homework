<?php
//Делаем интерфейс

trait Gps
{
    public function gpsPrice()
    {
        if ($this->gps) {
            $this->gps_price = ceil($this->time / 60) * 15;
            return $this->gps_price;
        } else {
            return $this->gps_price = 0;
        }
    }
}

trait DriverPlus
{
    public function addDriver()
    {
        if ($this->driver) {
            return $this->driver_price = 100;
        } else {
            return $this->driver_price = 0;
        }
    }
}

interface Rate
{
    public function ageCount();

    public function ridePrice();

    public function addService();

    public function gpsPrice();

    public function addDriver();
}

//Абстрактный класс

abstract class RateSource implements Rate
{
    public $age;
    public $rate_time_price;
    public $rate_distance_price;
    public $distance;
    public $time;
    public $age_coef;
    public $driver;
    public $gps;
    public $gps_price;
    public $driver_price;
    public $add_service_price;

    public function __construct(
        $age,
        $distance,
        $time,
        $gps = false,
        $driver = false
    ) {
        $this->age = $age;
        $this->distance = $distance;
        $this->time = $time;
        $this->gps = $gps;
        $this->driver = $driver;
        $this->addService();
    }

    public function addService()
    {
        $this->add_service_price = $this->gpsPrice() + $this->addDriver();
        return $this->add_service_price;
    }

    public function gpsPrice()
    {
        return 0;
    }

    public function addDriver()
    {
        return 0;
    }

    public function ridePrice()
    {
        if ($this->ageCount()) {
            $price = (($this->distance * $this->rate_distance_price)
                    + ($this->time * $this->rate_time_price)
                    + $this->add_service_price) * $this->age_coef;
            return $price;
        } else {
            return 'Неподходящий возраст';
        }
    }

    public function ageCount()
    {
        if ($this->age <= 18 || $this->age >= 65) {
            return false;
        } elseif ($this->age >= 18 && $this->age <= 21) {
            return $this->age_coef = 1.1;
        } else {
            return $this->age_coef = 1;
        }
    }
}

class BasicRate extends RateSource
{
    use Gps;
    public $rate_distance_price = 10;
    public $rate_time_price = 3;

}

class TimeRate extends RateSource
{
    use Gps, DriverPlus;
    public $rate_time_price = 200;
    public $rate_distance_price = 0;

    public function ridePrice()
    {

        $this->newTime();
        return parent::ridePrice();
    }

    public function newTime()
    {
        $this->time = ceil($this->time / 60);
        return $this->time;
    }
}

class DayRate extends RateSource
{
    use Gps, DriverPlus;
    public $rate_time_price = 1000;
    public $rate_distance_price = 1;

    public function ridePrice()
    {
        $this->daysTime();
        return parent::ridePrice();
    }

    public function daysTime()
    {
        if ($this->time % 1440 >= 30) {
            $this->time = ceil($this->time / 1440);

        } else {
            $this->time = floor($this->time / 1440);
        }
        return $this->time;
    }
}

class StudentRate extends RateSource
{
    use Gps;
    public $rate_distance_price = 4;
    public $rate_time_price = 1;

    public function ageCount()
    {
        if ($this->age >= 18 && $this->age <= 25) {
            return $this->age_coef = 1.1;
        } else {
            return false;
        }
    }
}
