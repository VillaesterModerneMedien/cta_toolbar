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
class MediaBlock extends Block
{
    /**
     * @var string|array|null
     */
    public $value;

    /**
     * @var array|null
     */
    public $queryList;

    public function __construct()
    {
        $this->type = Type::T_MEDIA;
    }
}
