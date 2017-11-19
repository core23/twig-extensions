<?php

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\TwigExtensions\Util;

class StringUtils
{
    /**
     * @param string $string
     * @param int    $start
     * @param int    $end
     * @param string $replacement
     *
     * @return string
     */
    public static function obfuscate($string, $start = 0, $end = 3, $replacement = '*'): string
    {
        $len = strlen($string);

        if ($start < 0) {
            $start += $len;
        }
        $start = min($start, $len - 1);

        if ($end < 0) {
            $end += $len;
        }
        $end = min($end, $len - 1);

        if ($len === 0 || $len === $start + 1 || $len === $end + 1 || $len <= $start + $end) {
            return $string;
        }

        return substr($string, 0, $start).str_repeat($replacement, $len - $end - $start).substr($string, $len - $end, $end);
    }
}
