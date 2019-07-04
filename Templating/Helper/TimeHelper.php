<?php

namespace Knp\Bundle\TimeBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Knp\Bundle\TimeBundle\DateTimeFormatter;
use DateTime;
use DateTimeInterface;

class TimeHelper extends Helper
{
    protected $formatter;

    public function __construct(DateTimeFormatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Returns a single number of years, months, days, hours, minutes or
     * seconds between the specified date times or a date in long format
     * @param  mixed  $since The datetime for which the diff will be calculated
     * @param  mixed  $since The datetime from which the diff will be calculated
     * @param  string $time The time from which the date is displayed in long format (must be in a format accepted by strtotime())
     * @return string
     */

    public function diff($from, $to = null, $time = null)
    {
        $from = $this->getDatetimeObject($from);
        $to = $this->getDatetimeObject($to);

        if(!is_null($time))
        {
            $newDateFrom = (clone $from)->modify($time);
            if($newDateFrom->getTimestamp() < $to->getTimestamp())
            {
                return $this->formatter->longDateFormat($from);
            }
            else
            {
                return $this->formatter->formatDiff($from, $to);
            }
        }
        else
        {
            return $this->formatter->formatDiff($from, $to);
        }
    }

    /**
     * Returns a DateTime instance for the given datetime
     *
     * @param  mixed $datetime
     *
     * @return DateTimeInterface
     */
    public function getDatetimeObject($datetime = null)
    {
        if ($datetime instanceof DateTimeInterface) {
            return $datetime;
        }

        if (is_integer($datetime)) {
            $datetime = date('Y-m-d H:i:s', $datetime);
        }

        return new DateTime($datetime);
    }

    public function getName()
    {
        return 'time';
    }
}
