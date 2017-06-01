<?php

namespace Davidvandertuijn;

class Password
{
    /**
     * Generate.
     *
     * @param int $iLength
     * @param bool $bIncludeLowercaseCharacters
     * @param bool $bIncludeUppercaseCharacters
     * @param bool $bIncludeNumbers
     * @param bool $bIncludeSymbols
     * @param bool $bExcludeSimilarCharacters
     * @param bool $bExcludeAmbiguousCharacters
     *
     * @return string $sPassword
     */
    public static function generate(
        $iLength = 8,
        $bIncludeLowercaseCharacters = true,
        $bIncludeUppercaseCharacters = true,
        $bIncludeNumbers = true,
        $bIncludeSymbols = false,
        $bExcludeSimilarCharacters = true,
        $bExcludeAmbiguousCharacters = false
    ){
        $sChars = null;

        // Include lowercase characters.

        if ($bIncludeLowercaseCharacters) {
            $sChars .= 'abcdefghijklmnopqrstuvwxyz';
        }

        // Include uppercase characters.

        if ($bIncludeUppercaseCharacters) {
            $sChars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        // Include numbers.

        if ($bIncludeNumbers) {
            $sChars .= '0123456789';
        }

        // Include symbols.

        if ($bIncludeSymbols) {
            $sChars .= "`~!@#$%^&*()_-+={}[]\|:;\"'<>,.?/";
        }

        // Exclude similar characters.

        if ($bExcludeSimilarCharacters) {
            $aSearch = ['i', 'I', '1', 'l', 'L', 'o', 'O', '0'];
            $aReplace = ['', '', '', '', '', '', '', ''];

            $sChars = str_replace($aSearch, $aReplace, $sChars);
        }

        // Exclude ambiguous characters.

        if ($bExcludeAmbiguousCharacters) {
            $aSearch = ['{', '}', '[', ']', '(', ')', '/', '\\', "'", '"', '~', ',', ';', ':', '.', '>'];
            $aReplace = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''];

            $sChars = str_replace($aSearch, $aReplace, $sChars);
        }

        $iSize = strlen($sChars) - 1;

        $sPassword = null;

        while ($iLength--) {
            $sPassword .= $sChars[rand(0, $iSize)];
        }

        return $sPassword;
    }
}
