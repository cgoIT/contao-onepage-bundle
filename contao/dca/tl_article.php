<?php

declare(strict_types=1);

/*
 * This file is part of cgoit\contao-onepage-bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2024, cgoIT
 * @author     cgoIT <https://cgo-it.de>
 * @author     Daniel Steuri <https://webrealisierung.ch>
 * @license    LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = preg_replace('/{expert_legend:hide}/', '{onepage_legend:hide},in_onepage;{expert_legend:hide}', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_article']['fields']['in_onepage'] =
[
    'label' => &$GLOBALS['TL_LANG']['tl_article']['in_onepage'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];
