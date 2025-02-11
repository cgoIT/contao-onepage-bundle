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

namespace Cgoit\ContaoOnepageBundle\Tests;

use Cgoit\ContaoOnepageBundle\CgoitContaoOnepageBundle;
use PHPUnit\Framework\TestCase;

class CgoitContaoOnepageBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new CgoitContaoOnepageBundle();

        $this->assertInstanceOf(CgoitContaoOnepageBundle::class, $bundle);
    }
}
