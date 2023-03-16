<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp;

class CompilationResult
{
    /**
     * @var string
     */
    private $css;

    /**
     * @var string|null
     */
    private $sourceMap;

    /**
     * @var string[]
     */
    private $includedFiles;

    /**
     * @param string $css
     * @param string|null $sourceMap
     * @param string[] $includedFiles
     */
    public function __construct($css, $sourceMap, array $includedFiles)
    {
        $this->css = $css;
        $this->sourceMap = $sourceMap;
        $this->includedFiles = $includedFiles;
    }

    /**
     * @return string
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @return string[]
     */
    public function getIncludedFiles()
    {
        return $this->includedFiles;
    }

    /**
     * The sourceMap content, if it was generated
     *
     * @return null|string
     */
    public function getSourceMap()
    {
        return $this->sourceMap;
    }
}
