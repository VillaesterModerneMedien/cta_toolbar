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
class ForBlock extends Block
{
    /**
     * @var string
     */
    public $var;

    /**
     * @var array
     */
    public $start;

    /**
     * @var array
     */
    public $end;

    /**
     * @var bool
     */
    public $until;

    public function __construct()
    {
        $this->type = Type::T_FOR;
    }
}
