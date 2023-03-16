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
class EachBlock extends Block
{
    /**
     * @var string[]
     */
    public $vars = [];

    /**
     * @var array
     */
    public $list;

    public function __construct()
    {
        $this->type = Type::T_EACH;
    }
}
