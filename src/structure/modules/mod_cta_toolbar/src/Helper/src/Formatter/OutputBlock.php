<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Formatter;

/**
 * Output block
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
class OutputBlock
{
    /**
     * @var string|null
     */
    public $type;

    /**
     * @var int
     */
    public $depth;

    /**
     * @var array|null
     */
    public $selectors;

    /**
     * @var string[]
     */
    public $lines;

    /**
     * @var OutputBlock[]
     */
    public $children;

    /**
     * @var OutputBlock|null
     */
    public $parent;

    /**
     * @var string|null
     */
    public $sourceName;

    /**
     * @var int|null
     */
    public $sourceLine;

    /**
     * @var int|null
     */
    public $sourceColumn;
}
