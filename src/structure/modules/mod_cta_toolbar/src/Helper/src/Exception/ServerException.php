<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Exception;

@trigger_error(sprintf('The "%s" class is deprecated.', ServerException::class), E_USER_DEPRECATED);

/**
 * Server Exception
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 *
 * @deprecated The Scssphp server should define its own exception instead.
 */
class ServerException extends \Exception implements SassException
{
}
