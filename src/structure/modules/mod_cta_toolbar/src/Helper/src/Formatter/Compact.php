<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Formatter;

use ScssPhp\ScssPhp\Formatter;

/**
 * Compact formatter
 *
 * @author Leaf Corcoran <leafot@gmail.com>
 *
 * @deprecated since 1.4.0. Use the Compressed formatter instead.
 *
 * @internal
 */
class Compact extends Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        @trigger_error('The Compact formatter is deprecated since 1.4.0. Use the Compressed formatter instead.', E_USER_DEPRECATED);

        $this->indentLevel = 0;
        $this->indentChar = '';
        $this->break = '';
        $this->open = ' {';
        $this->close = "}\n\n";
        $this->tagSeparator = ',';
        $this->assignSeparator = ':';
        $this->keepSemicolons = true;
    }

    /**
     * {@inheritdoc}
     */
    public function indentStr()
    {
        return ' ';
    }
}
