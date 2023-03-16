<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp;

/**
 * Block
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
class Block
{
    /**
     * @var string|null
     */
    public $type;

    /**
     * @var Block|null
     */
    public $parent;

    /**
     * @var string
     */
    public $sourceName;

    /**
     * @var int
     */
    public $sourceIndex;

    /**
     * @var int
     */
    public $sourceLine;

    /**
     * @var int
     */
    public $sourceColumn;

    /**
     * @var array|null
     */
    public $selectors;

    /**
     * @var array
     */
    public $comments;

    /**
     * @var array
     */
    public $children;

    /**
     * @var Block|null
     */
    public $selfParent;
}
