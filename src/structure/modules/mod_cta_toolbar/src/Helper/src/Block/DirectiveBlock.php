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
class DirectiveBlock extends Block
{
    /**
     * @var string|array
     */
    public $name;

    /**
     * @var string|array|null
     */
    public $value;

    public function __construct()
    {
        $this->type = Type::T_DIRECTIVE;
    }
}
