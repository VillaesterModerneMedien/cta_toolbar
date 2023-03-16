<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Compiler;

/**
 * Compiler environment
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
class Environment
{
    /**
     * @var \ScssPhp\ScssPhp\Block|null
     */
    public $block;

    /**
     * @var \ScssPhp\ScssPhp\Compiler\Environment|null
     */
    public $parent;

    /**
     * @var Environment|null
     */
    public $declarationScopeParent;

    /**
     * @var Environment|null
     */
    public $parentStore;

    /**
     * @var array|null
     */
    public $selectors;

    /**
     * @var string|null
     */
    public $marker;

    /**
     * @var array
     */
    public $store;

    /**
     * @var array
     */
    public $storeUnreduced;

    /**
     * @var int
     */
    public $depth;
}
