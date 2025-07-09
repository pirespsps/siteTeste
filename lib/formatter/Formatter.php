<?php

class Formatter
{

    public static $lower = "lower";
    public static $upper = "upper";

    public function formatString(
        $str = "",
        string $toCase = "",
        bool $specialChars = true,
        int $maxChars = PHP_INT_MAX
    ) {

        $str = trim($str);

        if (strlen($str) == 0) {
            return "null string";
        }

        switch ($toCase) {
            case self::$lower:
                $str = strtolower($str);
                break;
            case self::$upper:
                $str = strtoupper($str);
                break;
        }

        if ($maxChars !== null) {
            $str = substr($str, 0, $maxChars);
        }

        if (!$specialChars) {
            $str = (string)preg_replace("/[^A-ZÀ-ú0-9]/", " ", $str);
        }

        return $str;
    }

}