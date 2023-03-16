<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Exception;

/**
 * Parser Exception
 *
 * @author Oleksandr Savchenko <traveltino@gmail.com>
 *
 * @internal
 */
class ParserException extends \Exception implements SassException
{
    /**
     * @var array|null
     * @phpstan-var array{string, int, int}|null
     */
    private $sourcePosition;

    /**
     * Get source position
     *
     * @api
     *
     * @return array|null
     * @phpstan-return array{string, int, int}|null
     */
    public function getSourcePosition()
    {
        return $this->sourcePosition;
    }

    /**
     * Set source position
     *
     * @api
     *
     * @param array $sourcePosition
     *
     * @return void
     *
     * @phpstan-param array{string, int, int} $sourcePosition
     */
    public function setSourcePosition($sourcePosition)
    {
        $this->sourcePosition = $sourcePosition;
    }
}
