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
 * A logger that prints to a PHP stream (for instance stderr)
 *
 * @final
 */
class StreamLogger implements LoggerInterface
{
    private $stream;
    private $closeOnDestruct;

    /**
     * @param resource $stream          A stream resource
     * @param bool     $closeOnDestruct If true, takes ownership of the stream and close it on destruct to avoid leaks.
     */
    public function __construct($stream, $closeOnDestruct = false)
    {
        $this->stream = $stream;
        $this->closeOnDestruct = $closeOnDestruct;
    }

    /**
     * @internal
     */
    public function __destruct()
    {
        if ($this->closeOnDestruct) {
            fclose($this->stream);
        }
    }

    /**
     * @inheritDoc
     */
    public function warn($message, $deprecation = false)
    {
        $prefix = ($deprecation ? 'DEPRECATION ' : '') . 'WARNING: ';

        fwrite($this->stream, $prefix . $message . "\n\n");
    }

    /**
     * @inheritDoc
     */
    public function debug($message)
    {
        fwrite($this->stream, $message . "\n");
    }
}
