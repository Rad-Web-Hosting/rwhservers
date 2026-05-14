<script src="{$assetsURL}/js/chart.min.js"></script>
<script src="{$jsDir}/EasyDCIMv2/aggregateTraffic.js"></script>
<script src="{$jsDir}/EasyDCIMv2/ping.js"></script>
<script src="{$jsDir}/EasyDCIMv2/status.js"></script>
<link rel="stylesheet" href="{$assetsURL}/css/layers-ui.css">
<div id="layers">
    <div class="lu-row">
        <div class="lu-col-md-12">
            <div class="lu-widget">
                <div class="lu-widget__header">
                    <div class="lu-widget__top lu-top">
                        <div class="lu-top__title">
                            {$MGLANG->absoluteT('EasyDCIMv2','aggregateTraffic')}
                        </div>
                        <div class="lu-top__toolbar">
                            <a data-toggle="modal" data-target="#aggregateModal" onclick="showTrafficModal()">
                                <i class="lu-btn__icon lu-zmdi lu-zmdi-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lu-widget__body">
                    <canvas id="aggregateTraffic" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="lu-row">
        <div class="lu-col-md-12">
            <div class="lu-widget">
                <div class="lu-widget__header">
                    <div class="lu-widget__top lu-top">
                        <div class="lu-top__title">
                            {$MGLANG->absoluteT('EasyDCIMv2','ping')}
                        </div>
                        <div class="lu-top__toolbar">
                            <a data-toggle="modal" data-target="#pingModal" onclick="showPingModal()">
                                <i class="lu-btn__icon lu-zmdi lu-zmdi-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lu-widget__body">
                    <canvas id="pingGraph" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="lu-row">
        <div class="lu-col-md-12">
            <div class="lu-widget">
                <div class="lu-widget__header">
                    <div class="lu-widget__top lu-top">
                        <div class="lu-top__title">
                            {$MGLANG->absoluteT('EasyDCIMv2','status')}
                        </div>
                        <div class="lu-top__toolbar">
                            <a data-toggle="modal" data-target="#statusModal" onclick="showStatusModal()">
                                <i class="lu-btn__icon lu-zmdi lu-zmdi-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lu-widget__body">
                    <canvas id="statusGraph" style="height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>


    <div id="confirmationModal1" class="lu-modal lu-modal--md">
        <div class="lu-modal__dialog">
            <div id="mgModalContainer" class="lu-modal__content">
                <div class="lu-modal__top lu-top">
                    <div class="lu-top__title lu-type-6"><span class="lu-text-faded lu-font-weight-normal">
                        Scope                    </span></div>
                    <div class="lu-top__toolbar">
                        <button data-dismiss="lu-modal" aria-label="Close"
                                class="lu-btn lu-btn--xs lu-btn--default lu-btn--icon lu-btn--link lu-btn--plain closeModal" onclick="hideTrafficModal()">
                            <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i></button>
                    </div>
                </div>
                <div class="lu-modal__body">
                    <div class="lu-row">
                        <div class="lu-col-md-12">
                            <form>
                                <div class="lu-form-group">
                                    <label class="lu-form-label"> Period </label>
                                    <select id="scope3" class="lu-form-control selectized">
                                        <option value="td">{$MGLANG->absoluteT('EasyDCIMv2','today')}</option>
                                        <option value="yd">{$MGLANG->absoluteT('EasyDCIMv2','yesterday')}</option>
                                        <option value="tw">{$MGLANG->absoluteT('EasyDCIMv2','thisweek')}</option>
                                        <option value="lw">{$MGLANG->absoluteT('EasyDCIMv2','lastweek')}</option>
                                        <option value="tm">{$MGLANG->absoluteT('EasyDCIMv2','thismonth')}</option>
                                        <option value="lm">{$MGLANG->absoluteT('EasyDCIMv2','lastmonth')}</option>
                                        <option value="ty">{$MGLANG->absoluteT('EasyDCIMv2','thisyear')}</option>
                                        <option value="ly">{$MGLANG->absoluteT('EasyDCIMv2','lastyear')}</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="lu-modal__actions">
                    <button id="reloadAggregateTraffic" class="lu-btn lu-btn--success submitForm mg-submit-form">
                        Save Changes
                    </button>
                    <a class="lu-btn lu-btn--danger lu-btn--outline lu-btn--plain" onclick="hideTrafficModal()">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmationModal2" class="lu-modal lu-modal--md">
        <div class="lu-modal__dialog">
            <div id="mgModalContainer" class="lu-modal__content">
                <div class="lu-modal__top lu-top">
                    <div class="lu-top__title lu-type-6"><span class="lu-text-faded lu-font-weight-normal">
                        Scope                    </span></div>
                    <div class="lu-top__toolbar">
                        <button data-dismiss="lu-modal" aria-label="Close"
                                class="lu-btn lu-btn--xs lu-btn--default lu-btn--icon lu-btn--link lu-btn--plain closeModal" onclick="hidePingModal()">
                            <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i></button>
                    </div>
                </div>
                <div class="lu-modal__body">
                    <div class="lu-row">
                        <div class="lu-col-md-12">
                            <form>
                                <div class="lu-form-group">
                                    <label class="lu-form-label"> Period </label>
                                    <select id="scope2" class="lu-form-control selectized">
                                        <option value="td">{$MGLANG->absoluteT('EasyDCIMv2','today')}</option>
                                        <option value="yd">{$MGLANG->absoluteT('EasyDCIMv2','yesterday')}</option>
                                        <option value="tw">{$MGLANG->absoluteT('EasyDCIMv2','thisweek')}</option>
                                        <option value="lw">{$MGLANG->absoluteT('EasyDCIMv2','lastweek')}</option>
                                        <option value="tm">{$MGLANG->absoluteT('EasyDCIMv2','thismonth')}</option>
                                        <option value="lm">{$MGLANG->absoluteT('EasyDCIMv2','lastmonth')}</option>
                                        <option value="ty">{$MGLANG->absoluteT('EasyDCIMv2','thisyear')}</option>
                                        <option value="ly">{$MGLANG->absoluteT('EasyDCIMv2','lastyear')}</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="lu-modal__actions">
                    <button id="reloadpingGraph" class="lu-btn lu-btn--success submitForm mg-submit-form">
                        Save Changes
                    </button>
                    <a class="lu-btn lu-btn--danger lu-btn--outline lu-btn--plain" onclick="hidePingModal()">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmationModal3" class="lu-modal lu-modal--md">
        <div class="lu-modal__dialog">
            <div id="mgModalContainer" class="lu-modal__content">
                <div class="lu-modal__top lu-top">
                    <div class="lu-top__title lu-type-6"><span class="lu-text-faded lu-font-weight-normal">
                        Scope                    </span></div>
                    <div class="lu-top__toolbar">
                        <button data-dismiss="lu-modal" aria-label="Close"
                                class="lu-btn lu-btn--xs lu-btn--default lu-btn--icon lu-btn--link lu-btn--plain closeModal" onclick="hideStatusModal()">
                            <i class="lu-btn__icon lu-zmdi lu-zmdi-close"></i></button>
                    </div>
                </div>
                <div class="lu-modal__body">
                    <div class="lu-row">
                        <div class="lu-col-md-12">
                            <form>
                                <div class="lu-form-group">
                                    <label class="lu-form-label"> Period </label>
                                    <select id="scope" class="lu-form-control selectized">
                                        <option value="td">{$MGLANG->absoluteT('EasyDCIMv2','today')}</option>
                                        <option value="yd">{$MGLANG->absoluteT('EasyDCIMv2','yesterday')}</option>
                                        <option value="tw">{$MGLANG->absoluteT('EasyDCIMv2','thisweek')}</option>
                                        <option value="lw">{$MGLANG->absoluteT('EasyDCIMv2','lastweek')}</option>
                                        <option value="tm">{$MGLANG->absoluteT('EasyDCIMv2','thismonth')}</option>
                                        <option value="lm">{$MGLANG->absoluteT('EasyDCIMv2','lastmonth')}</option>
                                        <option value="ty">{$MGLANG->absoluteT('EasyDCIMv2','thisyear')}</option>
                                        <option value="ly">{$MGLANG->absoluteT('EasyDCIMv2','lastyear')}</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="lu-modal__actions">
                    <button id="reloadstatusGraph" class="lu-btn lu-btn--success submitForm mg-submit-form">
                        Save Changes
                    </button>
                    <a class="lu-btn lu-btn--danger lu-btn--outline lu-btn--plain" onclick="hideStatusModal()">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>