<?php namespace Adapta\Components\Writers;

use TCPDFBarcode;
use TCPDF2DBarcode;
use Exception;
use Adapta\Components\Converters\ColorConverter;

// http://phpqrcode.sourceforge.net/index.php#demo

class BarcodeWriter extends AbstractWriter implements WriterInterface
{
	protected $formats2d = [
        'Code39'             => 'C39',
        'Code39Chk'          => 'C39+',
        'Code39Ext'          => 'C39E',
        'Code39ExtChk'       => 'C39E+',
        'Code93'             => 'C93',
        'Code25'             => 'S25',
        'Code25Chk'          => 'S25+',
        'Code25Int'          => 'I25',
        'Code25IntChk'       => 'I25+',
        'Code128'            => 'C128',
        'Code128A'           => 'C128A',
        'Code128B'           => 'C128B',
        'Code128C'           => 'C128C',
        'Ean2'               => 'EAN2',
        'Ean5'               => 'EAN5',
        'Ean8'               => 'EAN8',
        'Ean13'              => 'EAN13',
        'Upca'               => 'UPCA',
        'Upce'               => 'UPCE',
        'Msi'                => 'MSI',
        'MsiChk'             => 'MSI+',
        'Postnet'            => 'POSTNET',
        'Planet'             => 'PLANET',
        'RoyalMail'          => 'RMS4CC',
        'Rms4Cc'             => 'RMS4CC',
        'Cbc'                => 'RMS4CC',
        'Klant'              => 'KIX',
        'KIX'                => 'KIX',
        'IntelligentMail'    => 'IMB',
        'IntelligentMailPre' => 'IMBPRE',
        'Codabar'            => 'CODABAR',
        'Code11'             => 'CODE11',
        'Pharmacode'         => 'PHARMA',
        'Pharmacode2'        => 'PHARMA2T',
        'array'        => 'array',
	];
	
	protected $formats3d = [
		'DataMatrix'         => 'DATAMATRIX',
		'Pdf417'             => 'PDF417',
		'QrCode'             => 'QRCODE',
		'Qr'                 => 'QRCODE',
	];
	
	public function __construct($format, $options = [])
	{
		$defaults = [
			'output' => 'png',
			'width'  => 2,
			'height' => 30,
			'color'  => array(0,0,0),
		];
		$options['format'] = $format;
		$this->options = array_merge($defaults, $options);
	}
	
	public function write($input)
	{
		list($class, $format) = $this->getFormat($this->getOption('format'));
		
		if ($class == 'TCPDF2DBarcode') {
			$this->setOptions([
				'width'  => $this->getOption('size') ?: 3,
				'height' => $this->getOption('size') ?: 3,
			]);
						
			if ($format == 'QRCODE')
			{
				$params = [
					$this->getOption('error_correction') // L,M,Q,H
				];
			}
			elseif ($format == 'PDF417')
			{
				$params = [
					$this->getOption('aspect_ratio'), // aspect ratio (width/height)
					$this->getOption('error_correction'), // error correction level (0-8)
					$this->getOption('total_segments'), // total number of macro segments
					$this->getOption('segment_index'), // macro segment index (0-99998)
					$this->getOption('file_id'), // file ID
					$this->getOption('file_name'), // File Name (text)
					$this->getOption('segment_count'), // Segment Count (numeric)
					$this->getOption('timestamp'), // Time Stamp (numeric)
					$this->getOption('sender'), // Sender (text)
					$this->getOption('addressee'), // Addressee (text)
					$this->getOption('file_size'), // File Size (numeric)
					$this->getOption('checksum'), // Checksum (numeric)
				];
			}
			
			if (isset($params)) {
				$format = rtrim(implode(',',array_merge([$format], $params)),',');
			}
				
		}
		
		$this->barcode = new $class($input, $format);
		
		$color = $this->getOption('color');
		
		$conv = new ColorConverter('array');
		$color = $conv->convert($color);
		
		switch ($this->getOption('output')) {
			case 'svg':
				$conv = new ColorConverter('rgb');
				$color = $conv->convert($color);
				return $this->barcode->getBarcodeSVGcode($this->getOption('width'),$this->getOption('height'),$color);
			break;
 			case 'gif': // Not Implemented
			case 'png':
				return $this->barcode->getBarcodePngData($this->getOption('width'),$this->getOption('height'),$color);
			case 'data':
				return 'data:image/png;base64,'.base64_encode($this->barcode->getBarcodePngData($this->getOption('width'),$this->getOption('height'),$color)).'';
			break;
			case 'array':
				return $this->barcode->getBarcodeArray($this->getOption('width'),$this->getOption('height'),$color);
			break;
		}
		
		throw new Exception("You must specify a valid output format.");
		
	}
	
	public function getFormat($format)
	{
		if ($format) {
			if (isset($this->formats2d[$format])) {
				return ['TCPDFBarcode', $this->formats2d[$format]];
			}
			if (isset($this->formats3d[$format])) {
				return ['TCPDF2DBarcode', $this->formats3d[$format]];
			}
		}
		else {
			throw new Exception("You must specify a barcode format.");
		}
		
		throw new Exception("The format [$format] is not a valid barcode format.");
	}
	
}