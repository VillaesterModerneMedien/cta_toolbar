<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */


namespace ScssPhp\ScssPhp\Compiler;

use ScssPhp\ScssPhp\CompilationResult;

/**
 * @internal
 */
class CachedResult
{
    /**
     * @var CompilationResult
     */
    private $result;

    /**
     * @var array<string, int>
     */
    private $parsedFiles;

    /**
     * @var array
     * @phpstan-var list<array{currentDir: string|null, path: string, filePath: string}>
     */
    private $resolvedImports;

    /**
     * @param CompilationResult  $result
     * @param array<string, int> $parsedFiles
     * @param array              $resolvedImports
     *
     * @phpstan-param list<array{currentDir: string|null, path: string, filePath: string}> $resolvedImports
     */
    public function __construct(CompilationResult $result, array $parsedFiles, array $resolvedImports)
    {
        $this->result = $result;
        $this->parsedFiles = $parsedFiles;
        $this->resolvedImports = $resolvedImports;
    }

    /**
     * @return CompilationResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return array<string, int>
     */
    public function getParsedFiles()
    {
        return $this->parsedFiles;
    }

    /**
     * @return array
     *
     * @phpstan-return list<array{currentDir: string|null, path: string, filePath: string}>
     */
    public function getResolvedImports()
    {
        return $this->resolvedImports;
    }
}
