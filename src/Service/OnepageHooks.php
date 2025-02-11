<?php

declare(strict_types=1);

/*
 * This file is part of cgoit\contao-onepage-bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2025, cgoIT
 * @author     cgoIT <https://cgo-it.de>
 * @author     Daniel Steuri <https://webrealisierung.ch>
 * @license    LGPL-3.0-or-later
 */

namespace Cgoit\ContaoOnepageBundle\Service;

use Contao\ArticleModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\StringUtil;

#[AsHook('getArticle')]
class OnepageHooks
{
    public function __invoke(ArticleModel $objData): void
    {
        $arrCSS = StringUtil::deserialize($objData->cssID, true);
        if (!empty($objData->in_onepage) && !empty($objData->published)) {
            $arrCSS[0] = trim($arrCSS[0].' '.$objData->alias);
        }
        $objData->cssID = serialize($arrCSS);
    }
}
