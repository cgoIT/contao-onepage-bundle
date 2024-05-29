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

namespace Wr\OnepageBundle\Tests;

use PHPUnit\Framework\TestCase;
use Wr\OnepageBundle\WrOnepageBundle;

class WrOnepageBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new WrOnepageBundle();

        $this->assertInstanceOf(WrOnepageBundle::class, $bundle);
    }
}
