<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Base;

/**
 * Range
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @internal
 */
class Range
{
    /**
     * @var float|int
     */
    public $first;

    /**
     * @var float|int
     */
    public $last;

    /**
     * Initialize range
     *
     * @param int|float $first
     * @param int|float $last
     */
    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }

    /**
     * Test for inclusion in range
     *
     * @param int|float $value
     *
     * @return bool
     */
    public function includes($value)
    {
        return $value >= $this->first && $value <= $this->last;
    }
}
