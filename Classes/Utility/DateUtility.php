<?php
declare(strict_types=1);

namespace Slavlee\FoodRecipes\Utility;

/*
 * This file is part of the TYPO3 extension food_recipes.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

class DateUtility
{
    /**
     * Converts a time given in minutes into a readable format (e.g., "1 hour 30 minutes").
     *
     * @param int $minutes The number of minutes.
     * @param string|null $hourText The text for "hour". Default: "hour"
     * @param string|null $hoursText The text for "hour(s)". Default: "hours"
     * @param string|null $minuteText The text for "minute". Default: "minute"
     * @param string|null $minutesText The text for "minute(s)". Default: "minutes"
     *
     * @return string A formatted string representing the time in hours and minutes.
     */
    public static function minutesToReadableTime(int $minutes, ?string $hourText = null, ?string $hoursText = null, ?string $minuteText = null, ?string $minutesText = null): string
    {
        // Set default values for the text components if none are provided.
        $hourText = $hourText ?? 'hour';
        $hoursText = $hoursText ?? 'hours';
        $minuteText = $minuteText ?? 'minute';
        $minutesText = $minutesText ?? 'minutes';

        // Ensure that the minutes are not negative.
        $minutes = max(0, $minutes);

        // Calculate the number of hours and remaining minutes.
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        // Build the output string.
        $output = '';

        // Add the hours to the output if present.
        if ($hours > 0) {
            $output .= $hours . ' ';
            // Plural form for hours.
            $output .= ($hours == 1) ? $hourText : $hoursText;
            $output .= ' ';
        }

        // Add the minutes to the output.
        $output .= $remainingMinutes . ' ';
        // Plural form for minutes.
        $output .= ($remainingMinutes == 1) ? $minuteText : $minutesText;

        return $output;
    }

    /**
     * Convert minutes as string to ISO 8601 format
     * @param string $value
     * @return string
     */
    public static function minutesToISO8601(int $minutes): string
    {
        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        $iso8601 = 'PT';
        if ($hours > 0) {
            $iso8601 .= $hours . 'H';
        }
        if ($remainingMinutes > 0 || $hours === 0) {
            $iso8601 .= $remainingMinutes . 'M';
        }

        return $iso8601;
    }
}
