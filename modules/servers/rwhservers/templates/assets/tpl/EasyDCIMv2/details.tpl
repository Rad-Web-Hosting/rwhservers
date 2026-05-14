<link rel="stylesheet" href="{$assetsURL}/css/layers-ui.css">
<link rel="stylesheet" href="{$assetsURL}/css/mg_styles.css">
<div id="layers">
    {if $productConfig.action_serverInformation == 'on'}
        <div class="lu-row">
            <div class="lu-col-md-12">
                <div id="caServerInformationTable" class="lu-widget widgetActionComponent vueDatatableTable">
                    <div class="lu-widget__header"><div class="lu-widget__top lu-top">
                            <div class="lu-top__title">
                                {$MGLANG->absoluteT('EasyDCIMv2','Server Information')}
                            </div>
                        </div>
                    </div>
                    <div class="lu-widget__body">
                        <div data-table-container="" data-check-container="" class="lu-t-c  datatableLoader">
                            <div class="dataTables_wrapper no-footer">
                                <div>
                                    <table width="100%" role="grid" class="lu-table lu-table--mob-collapsible dataTable no-footer dtr-column">
                                        <tbody>
                                        {if $configuration.ServerID == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','ServerId')}</td>
                                                <td>{$serverInformation->getServerID()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.Label == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Label')}</td>
                                                <td>{$serverInformation->getLabel()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.ServerStatus == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Device Status')}</td>
                                                <td{if $serverInformation->getDeviceStatus() === 'Down'} class="lu-text-danger" {else} class="lu-text-success" {/if}>{$serverInformation->getDeviceStatus()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.CurrentOS == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','OS Template')}</td>
                                                <td>{$serverInformation->getCurrentOS()} - <b>{$serverInformation->getInstallationStatus()}</b></td>
                                            </tr>
                                        {/if}

                                        {if $configuration.Hostname == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Hostname')}</td>
                                                <td>{$serverInformation->getHostname()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.IPAddresses == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','IP Addresses')}</td>
                                                <td class="overflow">{$serverInformation->getIPAddresses()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.MacAddress == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','MAC Address')}</td>
                                                <td>{$serverInformation->getMacAddress()}</td>
                                            </tr>
                                        {/if}

                                        {foreach from=$serverInformation->getMetadata() key=myId item=i}
                                            <tr role="row">
                                                {if $i.header == 'SSH Password' || $i.header == 'SSH Root Password'}
                                                    {if $i.value == ''}
                                                        <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2',{$i.header})}</td>
                                                        <td>-</td>
                                                    {else}
                                                        <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2',{$i.header})}</td>
                                                        <td>
                                                            <a href="#" style="text-decoration: none; color: #17191c" class="mg-password-hiden"
                                                               data-secret="{$i.value}" data-hidden="******" onclick="changePasswordElement(event,this)">******</a>
                                                        </td>
                                                    {/if}
                                                {elseif $i.header == 'Additional IP Addresses'}
                                                    <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2',{$i.header})}</td>
                                                    <td class="overflow">{$i.value}</td>
                                                {else}
                                                    <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2',{$i.header})}</td>
                                                    <td>{$i.value}</td>
                                                {/if}
                                            </tr>
                                        {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
    {if $productConfig.action_generalInformation == 'on'}
        <div class="lu-row">
            <div class="lu-col-md-12">
                <div id="caGeneralInformationTable" class="lu-widget widgetActionComponent vueDatatableTable">
                    <div class="lu-widget__header"><div class="lu-widget__top lu-top">
                            <div class="lu-top__title">
                                {$MGLANG->absoluteT('EasyDCIMv2','General Information')}
                            </div>
                        </div>
                    </div>
                    <div class="lu-widget__body">
                        <div data-table-container="" data-check-container="" class="lu-t-c  datatableLoader">
                            <div class="dataTables_wrapper no-footer">
                                <div>
                                    <table width="100%" role="grid" class="lu-table lu-table--mob-collapsible dataTable no-footer dtr-column">
                                        <tbody>
                                        {if $configuration.Status == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Status')}</td>
                                                <td>{$generalInformation->getStatus()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.OrderID == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','OrderId')}</td>
                                                <td>{$generalInformation->getOrderID()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.ServiceStatus == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','ServiceStatus')}</td>
                                                <td {if $generalInformation->getServiceStatus() == 'Activated'} class="lu-text-success" {else} class="lu-text-danger" {/if}>{$generalInformation->getServiceStatus()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.Model == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Model')}</td>
                                                <td>{$generalInformation->getModel()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.SerialNumber == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','SerialNumber')}</td>
                                                <td>{$generalInformation->getSerialNumber()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.PurchaseDate == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','PurchaseDate')}</td>
                                                <td>{$generalInformation->getPurchaseDate()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.WarrantyMonths == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','WarrantyMonths')}</td>
                                                <td>{$generalInformation->getWarrantyMonths()}</td>
                                            </tr>
                                        {/if}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {/if}
    {if $productConfig.action_locationInformation == 'on'}
        <div class="lu-row">
            <div class="lu-col-md-12">
                <div id="caLocationInformationTable" class="lu-widget widgetActionComponent vueDatatableTable">
                    <div class="lu-widget__header"><div class="lu-widget__top lu-top">
                            <div class="lu-top__title">
                                {$MGLANG->absoluteT('EasyDCIMv2','Location Information')}
                            </div>
                        </div>
                    </div>
                    <div class="lu-widget__body">
                        <div data-table-container="" data-check-container="" class="lu-t-c  datatableLoader">
                            <div class="dataTables_wrapper no-footer">
                                <div>
                                    <table width="100%" role="grid" class="lu-table lu-table--mob-collapsible dataTable no-footer dtr-column">
                                        <tbody>
                                        {if $configuration.LocationName == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Location')}</td>
                                                <td>{$locationInformation->getLocationName()} ({$locationInformation->getRackName()})</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.LabeledRackWithPosition == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','LabeledRack')}</td>
                                                <td>{$locationInformation->getRackWithPosition()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.Floor == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Floor')}</td>
                                                <td>{$locationInformation->getFloor()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.PhoneNumber == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','PhoneNumber')}</td>
                                                <td>{$locationInformation->getPhoneNumber()}</td>
                                            </tr>
                                        {/if}

                                        {if $configuration.Description == 'on'}
                                            <tr role="row">
                                                <td class="informationTablesWidth">{$MGLANG->absoluteT('EasyDCIMv2','Description')}</td>
                                                <td>{$locationInformation->getDescription()}</td>
                                            </tr>
                                        {/if}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
</div>



<script>
    function changePasswordElement(e,input)
    {
        e.preventDefault();
        if($(input).html() == $(input).data('hidden')){
            $(input).html($(input).data('secret'));
        }else{
            $(input).html($(input).data('hidden'));
        }
    }
</script>

