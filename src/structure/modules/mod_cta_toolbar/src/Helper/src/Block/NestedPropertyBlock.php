<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Block;

use ScssPhp\ScssPhp\Block;
use ScssPhp\ScssPhp\Type;

/**
 * @internal
 */
class NestedPropertyBlock extends Block
{
    /**
     * @var bool
     */
    public $hasValue;

    /**
     * @var array
     */
    public $prefix;

    public function __construct()
    {
        $this->type = Type::T_NESTED_PROPERTY;
    }
}
