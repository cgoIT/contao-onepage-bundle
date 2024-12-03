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

$GLOBALS['TL_DCA']['tl_module']['palettes']['wr-onepage-navigation'] = '{title_legend},name,headline,type;{redirect_legend},rootPage;{options_legend},loadDefaultJavascript;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

$GLOBALS['TL_DCA']['tl_module']['fields']['loadDefaultJavascript'] =
[
    'label' => &$GLOBALS['TL_LANG']['tl_module']['load_default_javascript'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'default' => ''],
];
