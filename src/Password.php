<?php

namespace Davidvandertuijn;

/**
 * Password.
 */
class Password
{
    /**
     * Generate.
     *
     * @param int $length
     * @param bool $includeLowercaseCharacters
     * @param bool $includeUppercaseCharacters
     * @param bool $includeNumbers
     * @param bool $includeSymbols
     * @param bool $excludeSimilarCharacters
     * @param bool $excludeAmbiguousCharacters
     *
     * @return string $password
     */
    public static function generate(
        $length = 8,
        $includeLowercaseCharacters = true,
        $includeUppercaseCharacters = true,
        $includeNumbers = true,
        $includeSymbols = false,
        $excludeSimilarCharacters = true,
        $excludeAmbiguousCharacters = false
    ): string {
        $chars = null;

        // Include lowercase characters.

        if ($includeLowercaseCharacters) {
            $chars .= 'abcdefghijklmnopqrstuvwxyz';
        }

        // Include uppercase characters.

        if ($includeUppercaseCharacters) {
            $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        // Include numbers.

        if ($includeNumbers) {
            $chars .= '0123456789';
        }

        // Include symbols.

        if ($includeSymbols) {
            $chars .= "`~!@#$%^&*()_-+={}[]\|:;\"'<>,.?/";
        }

        // Exclude similar characters.

        if ($excludeSimilarCharacters) {
            $search = ['i', 'I', '1', 'l', 'L', 'o', 'O', '0'];
            $replace = ['', '', '', '', '', '', '', ''];

            $chars = str_replace($search, $replace, $chars);
        }

        // Exclude ambiguous characters.

        if ($excludeAmbiguousCharacters) {
            $search = ['{', '}', '[', ']', '(', ')', '/', '\\', "'", '"', '~', ',', ';', ':', '.', '>'];
            $replace = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];

            $chars = str_replace($search, $replace, $chars);
        }

        $size = strlen($chars) - 1;

        $password = null;

        while ($length--) {
            $password .= $chars[rand(0, $size)];
        }

        return $password;
    }
}
