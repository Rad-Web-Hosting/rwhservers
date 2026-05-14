<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages;

class ServerInformation
{
    protected $serverInformation = [];

    protected $installInformation = [];
    protected $productSettings = [];

    public function __construct($serverInformation,$installInformation,$productSettings)
    {
        $this->serverInformation = $serverInformation;
        $this->installInformation = $installInformation;
        $this->productSettings = $productSettings;
    }

    /**
     * @return string
     */
    public function getIPAddresses(): string
    {
        $ipAddresses = implode('<br>',$this->serverInformation['ip_addresses']);
        return  $ipAddresses != '' ? $ipAddresses :'-';
    }

    /**
     * @return string
     */
    public function getServiceStatus(): string
    {
        return $this->serverInformation['service_status']  != '' ? ucfirst($this->serverInformation['service_status']) :'-';
    }

    /**
     * @return string
     */
    public function getDeviceStatus(): string
    {
        return $this->serverInformation['device_status'] != '' ? ucfirst($this->serverInformation['device_status']) :ucfirst('Unassigned');
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->serverInformation['label'] != '' ? $this->serverInformation['label'] :'-';
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->serverInformation['metadata']['Hostname'] != '' ? $this->serverInformation['metadata']['Hostname'] :'-';
    }

    /**
     * @return string
     */
    public function getMacAddress(): string
    {
        return $this->serverInformation['metadata']['MAC Address'] != '' ? $this->serverInformation['metadata']['MAC Address'] :'-';
    }

    /**
     * @return string
     */
    public function getCurrentOS(): string
    {
        return $this->serverInformation['metadata']['OS'] != '' ? $this->serverInformation['metadata']['OS'] :'-';
    }

    /**
     * @return string
     */
    public function getInstallationStatus(): string
    {
        return $this->installInformation['status'] != '' ? $this->installInformation['status'] :'-';
    }

    /**
     * @return string
     */
    public function getServerID(): string
    {
        return $this->serverInformation['id'] != '' ? $this->serverInformation['id'] :'-';
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        $caMetadata = $this->productSettings['caMetadata'];
        $data = [];
        foreach($caMetadata as $key=>$value)
        {
            if ($value['CustomMetadata'] == "Hostname" && $this->productSettings['Hostname'] == 'on' || $value['CustomMetadata'] == "IP Address" && $this->productSettings['IPAddresses'] == 'on' || $value['CustomMetadata'] == "MAC Address" && $this->productSettings['MACAddress'] == 'on')
            {
                continue;
            }
            elseif($value['CustomMetadata'] == "SSH Password" || $value['CustomMetadata'] == "SSH Root Password"){
                $data[] = [
                    'header'=>$value['CustomMetadata'],
                    'value'=>$this->serverInformation['metadata'][$value['CustomMetadata']],
                ];
            }
            else{
                $data[] = [
                    'header'=>$value['CustomMetadata'],
                    'value'=>$this->serverInformation['metadata'][$value['CustomMetadata']] == ''? '-':$this->serverInformation['metadata'][$value['CustomMetadata']],
                ];
            }
        }
        return $data;
    }
}