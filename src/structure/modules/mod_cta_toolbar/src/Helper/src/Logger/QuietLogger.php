<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Logger;

/**
 * A logger that silently ignores all messages.
 *
 * @final
 */
class QuietLogger implements LoggerInterface
{
    public function warn($message, $deprecation = false)
    {
    }

    public function debug($message)
    {
    }
}
