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

namespace Cgoit\ContaoOnepageBundle\Controller\Module;

use Contao\ArticleModel;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\Environment;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

#[AsFrontendModule(type: ModuleWrOnepage::TYPE, category: 'navigationMenu', template: 'mod_wr-onepage-navigation')]
class ModuleWrOnepage extends AbstractFrontendModuleController
{
    final public const TYPE = 'wr-onepage-navigation';

    public function __construct(private readonly UrlGenerator $urlGenerator)
    {
    }

    protected function getResponse(Template $template, ModuleModel $model, Request $request): Response
    {
        global $objPage;
        if ($model->rootPage) {
            $Articles = ArticleModel::findByPid($model->rootPage, ['order' => 'sorting']);
            $rootPageId = PageModel::findById($model->rootPage);
            $template->uri = $rootPageId->getFrontendUrl('');
        } else {
            $Articles = ArticleModel::findByPid($objPage->id, ['order' => 'sorting']);
            $template->uri = $this->urlGenerator->generate($objPage->alias);
        }

        if ($model->loadDefaultJavascript) {
            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/cgoitcontaoonepage/Scroller.min.js';
            $GLOBALS['TL_JAVASCRIPT'][] = 'bundles/cgoitcontaoonepage/Onepage.min.js';
            //            $GLOBALS['TL_BODY'][] = '<script src="bundles/cgoitcontaoonepage/Scroller.min.js"></script>';
            //            $GLOBALS['TL_BODY'][] = '<script src="bundles/cgoitcontaoonepage/Onepage.min.js"></script>';
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

        $template->request = StringUtil::ampersand(Environment::get('indexFreeRequest'));
        $template->skipId = 'skipNavigation'.$model->id;
        $template->loadStandartJavascipt = $model->loadDefaultJavascript;
        $template->arrArticle = $arrArticle;

        return $template->getResponse();
    }
}
