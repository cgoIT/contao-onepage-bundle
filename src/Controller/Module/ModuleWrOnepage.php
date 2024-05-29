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

namespace Cgoit\ContaoOnepageBundle\Controller\Module;

use Contao\ArticleModel;
use Contao\Environment;
use Contao\Module;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\System;

class ModuleWrOnepage extends Module
{
    protected $strTemplate = 'mod_wr-onepage-navigation';

    protected function compile(): void
    {
        global $objPage;
        if ($this->rootPage) {
            $Articles = ArticleModel::findByPid($this->rootPage, ['order' => 'sorting']);
            $rootPageId = PageModel::findById($this->rootPage);
            $this->Template->uri = $rootPageId->getFrontendUrl('');
        } else {
            $Articles = ArticleModel::findByPid($objPage->id, ['order' => 'sorting']);
            $urlGenerator = System::getContainer()->get('contao.routing.url_generator');
            $this->Template->uri = $url = $urlGenerator->generate($objPage->alias);
        }

        if ($this->loadDefaultJavascript) {
            // $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/wronepage/Scroller.min.js';
            // $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/wronepage/Onepage.min.js';
            $GLOBALS['TL_BODY'][] = '<script src="bundles/wronepage/Scroller.min.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script src="bundles/wronepage/Onepage.min.js"></script>';
        }

        $arrArticle = [];

        foreach ($Articles as $article) {
            if (!empty($article->in_onepage) && !empty($article->published)) {
                $arrArticle[] =
                    [
                        'title' => $article->title,
                        'alias' => $article->alias,
                    ];
            }
        }

        $this->Template->request = StringUtil::ampersand(Environment::get('indexFreeRequest'));
        $this->Template->skipId = 'skipNavigation'.$this->id;
        $this->Template->loadStandartJavascipt = $this->loadDefaultJavascript;
        $this->Template->arrArticle = $arrArticle;
    }
}
