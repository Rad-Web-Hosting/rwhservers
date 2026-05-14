<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages;

class GeneralInformation
{
    protected $generalInformation = [];

    public function __construct($generalInformation)
    {
        $this->generalInformation = $generalInformation;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->generalInformation['status']  != '' ? ucfirst($this->generalInformation['status']) :'-';
    }

    /**
     * @return string
     */
    public function getServiceStatus(): string
    {
        return $this->generalInformation['service_status']  != '' ? ucfirst($this->generalInformation['service_status']) :'-';
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->generalInformation['model'] != '' ? $this->generalInformation['model'] :'-';
    }

    /**
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->generalInformation['serialnumber1'] != '' ? $this->generalInformation['serialnumber1'] :'-';
    }

    /**
     * @return string
     */
    public function getPurchaseDate(): string
    {
        return $this->generalInformation['purchase_date'] != '' ? $this->generalInformation['purchase_date'] :'-';
    }

    /**
     * @return string
     */
    public function getWarrantyMonths(): string
    {
        $warrantyMonths = $this->generalInformation['warranty_months'];
        if ($warrantyMonths == '')
        {
            return 'Expired';
        }
        $years = 'Year';
        $months = 'Month';
        if (floor(intval($warrantyMonths)/12) > 1 || floor(intval($warrantyMonths)/12) == 0)
        {
            $years = 'Years';
        }
        if (intval($warrantyMonths)%12 > 1 || intval($warrantyMonths)%12 == 0)
        {
            $months = 'Months';
        }
        return floor(intval($warrantyMonths)/12) . ' ' .$years .  ' ' . intval($warrantyMonths)%12 . ' ' .  $months ;
    }

    /**
     * @return string
     */
    public function getOrderID(): string
    {
        return $this->generalInformation['order_id'] != '' ? $this->generalInformation['order_id'] :'-';
    }
}