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
 * Base node
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
abstract class Node
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $sourceIndex;

    /**
     * @var int|null
     */
    public $sourceLine;

    /**
     * @var int|null
     */
    public $sourceColumn;
}
