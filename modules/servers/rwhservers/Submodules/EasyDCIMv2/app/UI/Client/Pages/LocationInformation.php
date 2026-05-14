<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages;

class LocationInformation
{
    protected $locationInformation = [];

    public function __construct($locationInformation)
    {
        $this->locationInformation = $locationInformation;
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->locationInformation['location']['name']  != '' ? ucfirst($this->locationInformation['location']['name']) :'-';
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->locationInformation['location']['address']  != '' ? ucfirst($this->locationInformation['location']['address']) :'-';
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->locationInformation['location']['phone'] != '' ? $this->locationInformation['location']['phone'] :'-';
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->locationInformation['location']['description'] != '' ? $this->locationInformation['location']['description'] :'-';
    }

    /**
     * @return string
     */
    public function getRackWithPosition(): string
    {
        return $this->locationInformation['labeledRackWithPosition'] != '' ? $this->locationInformation['labeledRackWithPosition'] :'-';
    }

    /**
     * @return string
     */
    public function getRackName(): string
    {
        return $this->locationInformation['rack']['name'] != '' ? $this->locationInformation['rack']['name'] :'-';
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->locationInformation['rack']['floor_id'] != '' ? $this->locationInformation['rack']['floor_id'] :'-';
    }
}