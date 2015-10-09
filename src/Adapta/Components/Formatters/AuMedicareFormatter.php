<?php namespace Adapta\Components\Formatters;

class AuMedicareFormatter extends AbstractCodeFormatter implements FormatterInterface
{
	protected $format = '0000 00000 0';
	
	public function format($input)
	{
		if (strlen($this->unformat($input)) == 11)
		{
			$this->setFormat('0000 00000 0/0');
		}
		
		return parent::format($input);
	}
	
}