<?php namespace Adapta\Components\Converters;

use Adapta\Components\Support\OptionableTrait;
use Carbon\Carbon;
use ReflectionMethod;

class DateTimeConverter implements ConverterInterface
{
	use OptionableTrait;
	
	public function convert($datetime)
	{
		if (is_array($datetime))
		{
			if (count($datetime) <= 6) {
				$datetime = array_pad($datetime, 6, null);
			}
			$datetime[] = $this->getOption('timezone');
			
			$method = new ReflectionMethod('Carbon\\Carbon', 'create');
			return $method->invokeArgs(null, $datetime);
		}
		elseif ('timestamp' == $this->getOption('format'))
		{
			return Carbon::createFromTimestamp($datetime, $this->getOption('timezone'));
		}
		elseif ('utc_timestamp' == $this->getOption('format'))
		{
			return Carbon::createFromTimestampUTC($datetime, $this->getOption('timezone'));
		}
		elseif ($format = $this->getOption('format'))
		{
			return Carbon::createFromFormat($format, $datetime, $this->getOption('timezone'));
		}
		
		return new Carbon($datetime, $this->getOption('timezone'));
	}

}