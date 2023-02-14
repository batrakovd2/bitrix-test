<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}


$this->setFrameMode(true);
$this->SetViewTarget("sidebar", 199);
$frame = $this->createFrame()->begin();
?>

<div class="sidebar-widget sidebar-widget-bp">
    <div class="sidebar-widget-top">
        <div class="sidebar-widget-top-title"><?=GetMessage('COMPANY_WIDGET_TITLE')?></div>
    </div>
    <div class="sidebar-widget-item-wrap">
		<span class="task-item task-item-list">
			<? foreach ($arResult['COMPANIES'] as $company): ?>

                <span class="main-grid-cell-content" >
                    <div class="crm-client-summary-wrapper">
                        <div class="crm-client-photo-wrapper">
                            <div class="ui-icon crm-client-summary-photo ui-icon-common-company">
                                <i style="background-image: url(<?= $company['IMG'] ?>);"></i>
                            </div>
                        </div>
                        <div class="crm-client-info-wrapper">
                            <div class="crm-client-title-wrapper">
                                <a target="_top" href="/crm/company/details/<?= $company['ID'] ?>/"><?= $company['TITLE'] ?></a>
                            </div>
                        </div>
                    </div>
                </span>

            <? endforeach;?>
		</span>

    </div>
</div>

<?php

$frame->end();
$this->EndViewTarget();