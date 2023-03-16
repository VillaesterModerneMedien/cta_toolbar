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
class AtRootBlock extends Block
{
    /**
     * @var array|null
     */
    public $selector;

    /**
     * @var array|null
     */
    public $with;

    public function __construct()
    {
        $this->type = Type::T_AT_ROOT;
    }
}
