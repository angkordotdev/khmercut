<?php

namespace Angkor\Khmercut;

use Angkor\Khmercut\Exceptions\BinaryNotFoundException;
use Illuminate\Process\PendingProcess;

class Tokenizer
{
    const DEFAULT_DELIMITER = "\u{200B}";

    public static string $binaryPath = 'khmercut';

    /**
     * Tokenizer constructor.
     *
     *
     * @throws BinaryNotFoundException
     */
    public function __construct(protected PendingProcess $process, string $binary_path)
    {
        self::binaryPath($binary_path);
    }

    /**
     * Set the path to the binary file
     */
    public static function binaryPath(?string $path = null): string
    {
        if ($path) {
            static::$binaryPath = $path;
        }

        if (! file_exists(static::$binaryPath)) {
            throw new BinaryNotFoundException('Binary file not found: '.static::$binaryPath);
        }

        return static::$binaryPath;
    }

    /**
     * Tokenize the given text
     */
    public static function make(string $text, ?string $delimiter = null): ?string
    {
        return app()->make(__CLASS__)->tokenize($text, $delimiter);
    }

    /**
     * Tokenize the given text
     */
    public function tokenize(string $text, ?string $delimiter = null): ?string
    {
        $delimiter = $delimiter ?? static::DEFAULT_DELIMITER;
        $pattern   = '/[\x{1780}-\x{17FF}]+/u';

        return preg_replace_callback($pattern, function ($matches) use ($delimiter) {

            return $this->process->run($this->getCommand($matches[0], $delimiter))->output();

        }, $text);

    }

    /**
     * Get the command to run the tokenizer
     *
     * @return array <string>
     */
    protected function getCommand(string $text, ?string $delimiter): array
    {
        return [static::binaryPath(), "--text={$text}", "--delimiter={$delimiter}"];
    }
}
