<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class CompanyWidgetComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if($this->startResultCache())
        {

            $companyDb = CCrmCompany::GetListEx(['ID' => 'DESC'], ['!TITLE' => ''], false, ['nTopCount' => 3], ['ID', 'TITLE', 'LOGO']);
            while($resCompany = $companyDb->fetch()) {
                $file = CFile::ResizeImageGet($resCompany['LOGO'], array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $resCompany['IMG'] = $file['src'];
                $this->arResult["COMPANIES"][] = $resCompany;

            }
            $this->includeComponentTemplate();
        }

        return $this->arResult["COMPANIES"];
    }
}
