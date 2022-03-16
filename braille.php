<?php

/*	braille.php

	Author(s):
	
		*** holdoffhunger
			(2022 release)
			(new documentation in English)
		
		*** wimulkeman
			(2013 release)
			(all documentation was in Dutch)
	
*/

class BrailleHandler {
	/**
	* Het braille alfabet
	* De verdeling van de punten ten opzichte van de 0/1 notatie is bij bijvoorbeeld
	* de n is:
	* Braille: Nummering:      Bitnotatie:
	* o o      32 16    = 56   110110
	* - o      8  4
	* o -      2  1
	*
	* @var array
	* @access public
	*/
	public $brailleAlphabet = [
		'a' => '⠁',
		'b' => '⠃',
		'c' => '⠉',
		'd' => '⠙',
		'e' => '⠑',
		'f' => '⠋',
		'g' => '⠛',
		'h' => '⠓',
		'i' => '⠊',
		'j' => '⠚',
		'k' => '⠅',
		'l' => '⠇',
		'm' => '⠍',
		'n' => '⠝',
		'o' => '⠕',
		'p' => '⠏',
		'q' => '⠟',
		'r' => '⠗',
		's' => '⠎',
		't' => '⠞',
		'u' => '⠥',
		'v' => '⠧',
		'w' => '⠺',
		'x' => '⠭',
		'y' => '⠽',
		'z' => '⠵',
	];
	public $brailleAsciiAlphabet = [
		'a' => 'A',
		'b' => 'B',
		'c' => 'C',
		'd' => 'D',
		'e' => 'E',
		'f' => 'F',
		'g' => 'G',
		'h' => 'H',
		'i' => 'I',
		'j' => 'J',
		'k' => 'K',
		'l' => 'L',
		'm' => 'M',
		'n' => 'N',
		'o' => 'O',
		'p' => 'P',
		'q' => 'Q',
		'r' => 'R',
		's' => 'S',
		't' => 'T',
		'u' => 'U',
		'v' => 'V',
		'w' => 'W',
		'x' => 'X',
		'y' => 'Y',
		'z' => 'Z',
	];
	
	public $brailleBinaryAlphabet = [
		'a' => '100000',
		'b' => '101000',
		'c' => '110000',
		'd' => '110100',
		'e' => '100100',
		'f' => '111000',
		'g' => '111100',
		'h' => '101100',
		'i' => '011000',
		'j' => '011100',
		'k' => '100010',
		'l' => '101010',
		'm' => '110010',
		'n' => '110110',
		'o' => '100110',
		'p' => '111010',
		'q' => '111110',
		'r' => '101110',
		's' => '011010',
		't' => '011110',
		'u' => '100011',
		'v' => '101011',
		'w' => '011101',
		'x' => '110011',
		'y' => '110111',
		'z' => '100111',
	];
	
	/**
	* De braille nummering
	* Voor de verdeling, zie het braille alfabet
	*
	* @var array
	* @access public
	*/
	public $brailleIntegers = [
		0 => '⠚',
		1 => '⠁',
		2 => '⠃',
		3 => '⠉',
		4 => '⠙',
		5 => '⠑',
		6 => '⠋',
		7 => '⠛',
		8 => '⠓',
		9 => '⠊',
	];
	
	public $brailleAsciiIntegers = [
		1 => 'a',
		2 => 'b',
		3 => 'c',
		4 => 'd',
		5 => 'e',
		6 => 'f',
		7 => 'g',
		8 => 'h',
		9 => 'i',
		0 => 'j',
	];
	
	public $brailleBinaryIntegers = [
		0 => '011100',
		1 => '100000',
		2 => '101000',
		3 => '110000',
		4 => '110100',
		5 => '100100',
		6 => '111000',
		7 => '111100',
		8 => '101100',
		9 => '011000',
	];
	
	/**
	* Speciale tekens in braille
	* Voor de verdeling, zie het braille alfabet
	*
	* @var array
	* @access public
	*/
	public $brailleSpecialCharacters = [
		'capital' =>    '⠠',
		'integer' =>    '⠼',
		',' =>          '⠂',
		';' =>          '⠆',
		':' =>          '⠒',
		'.' =>          '⠲',
		'?' =>          '⠦',
		'!' =>          '⠖',
		'"' =>          '⠶', // Double quotes
		'(' =>          '⠐⠣',
		'[' =>          '⠐⠣',
		'*' =>          '⡠',
		')' =>          '⠐⠜',
		']' =>          '⠐⠜',
		'\'' =>         '⡀', // Single quote
		'’' =>		'⡀',
		'-' =>          '⠤',
		'—' =>		'⠤',
		'/' =>          '⠸⠌',
		'\\' =>         '⠸⠡',
	];
	
	public $brailleAsciiSpecialCharacters = [
		'capital' =>    ',',
		'integer' =>    '#',
		',' =>          '1',
		';' =>          '2',
		':' =>          '3',
		'.' =>          '4',
		'?' =>          '8',
		'!' =>          '6',
		'"' =>          '0', // Double quotes
		'(' =>          '7',
		'*' =>          '"9',
		')' =>          '7',
		'\'' =>         '\'', // Single quote
		'’' =>		'\'',
		'-' =>          '-',
		'—' =>		'-',
		'/' =>          '_/',
		'\\' =>         '_*',
		'#' =>		'_?',
		'$' =>		'@s',
		'%' =>		'.0',
		'&' =>		'@&',
		'+' =>		'"4',
		'<' =>		'@<',
		'>' =>		'@>',
		'=' =>		'"7',
		'@' =>		'@a',
		'[' =>		'.<',
		']' =>		'.>',
		'^' =>		'@5',
		'_' =>		'.-',
		'`' =>		'^*',
		'{' =>		'_<',
		'}' =>		'_>',
		'~' =>		'@9',
	];
	
	public $brailleBinarySpecialCharacters = [
		'capital' =>    '000001',
		'integer' =>    '010111',
		',' =>          '001000',
		';' =>          '001010',
		':' =>          '001100',
		'.' =>          '001101',
		'?' =>          '001011',
		'!' =>          '001110',
		'"' =>          '001111', // Double quotes
		'(' =>          '000100101001',
		'[' =>          '000100101001',
		'*' =>          '000110',
		')' =>          '000100010110',
		']' =>          '000100010110',
		'\'' =>         '000010', // Single quote
		'’' =>         '000010', // Single quote
		'-' =>          '000011',
		'/' =>          '010101010010',
		'\\' =>         '010101100001',
	];
	
	/**
	* In deze variabele zal de instantie van deze class worden opgeslagen
	*
	* @var object
	*/
	private static $_instanceOfMe;
	
	/**
	* De construct van deze class is private om te voorkomen dat hij van buitenaf
	* aangeroepen kan worden
	*
	* @return void
	* @access private
	* @author WIM
	*/
	public function __construct($args) {
		$this->mode = $args['mode'];	# can be "binary", "dots", or "ascii"
		
		$this->errors = [];
		
		return $this;
	}
	
	/**
	* Deze functie moet aangeroepen worden om een instantie van deze class te kunnen
	* verkrijgen
	*
	* @return object  Een instantie van deze class
	* @access public
	* @author WIM
	*/
	public static function init() {
		// Controleer of de class al geiniteerd is door een andere aanroep
		if (empty(self::$_instanceOfMe)) {
			self::$_instanceOfMe = new self();
		}
		
		// Geef een initiatie van de class terug
		return self::$_instanceOfMe;
	}
	
	/**
	* Zet een stuk tekst om naar braille
	*
	* @param string $text Het stuk tekst dat omgezet moet worden
	*
	* @return string De braille weergave voor de tekst
	* @access array
	* @author WIM
	*/
	public function convertText($text) {
		// Het eindresultaat
		$output = [];
		
		// Haal eerst alle paragrafen uit de tekst
		$paragraphs = explode("\n", $text);
		
		// Loop door de paragrafen heen en zet deze om
		foreach ($paragraphs as $paragraph) {
			// Kijk of er sprake is van een break punt
			if (empty($paragraph)) {
				$output[] = [
					'braille'=>"\n",
				];
				continue;
			}
			
			$braille = $this->convertParagraph($paragraph);
			// Plaats na elk stuk weer een enter om de explode werking op te heffen
			$braille[] = [
				'braille'=>"\n",
			];
			$output = array_merge($output, $braille);
		}
		
		return $output;
	}
	
	/**
	* Zet een paragraaf om naar braille
	*
	* @param string $paragraph De paragraaf die omgezet moet worden
	*
	* @return string De braille weergave voor de paragraaf
	* @access array
	* @author WIM
	*/
	public function convertParagraph($paragraph) {
		return $this->convertSentence($paragraph);
	}
	
	/**
	* Zet een zin om naar braille
	*
	* @param string $sentence De zin die omgezet moet worden
	*
	* @return array De braille weergave voor de zin
	* @access array
	* @author WIM
	*/
	public function convertSentence($sentence) {
		// Het eindresultaat
		$output = [];
		
		// Haal eerst alle woorden uit de tekst
		$words = explode(" ", $sentence);
		
		if($this->mode === 'binary') {
			$space = '(space)';
		} else {
			$space = ' ';
		}
		
		// Loop door de woorden heen en zet deze om
		foreach ($words as $word) {
			// Kijk of er sprake is van een break punt
			if (empty($word)) {
				$output[] = [
					'braille'=>$space,
				];
				continue;
			}
			
			$output[] = $this->convertWord($word);
			// Plaats na elk stuk weer een spatie om de explode werking op te heffen
			$output[] = [
				'braille'=>$space,
			];
		}
		
		return $output;
	}
	
	/**
	* Zet een woord om naar braille
	*
	* @param string $word Het woord dat omgezet moet worden
	*
	* @return array De braille weergave voor het woord
	* @access array
	* @author WIM
	*/
	public function convertWord($word) {
		// De geformateerde braille string
		$braille = '';
		
		// Geeft aan of een bepaalde indicator wordt toegevoegd
		$indicatorAdded = false;
		$indicator = '';
		
		// Kijk of het woord alleen cijfers is
		if (preg_match('/^[0-9]+$/', $word)) {
			$indicatorAdded = true;
			if($this->mode === 'binary') {
				$indicator = $this->brailleBinarySpecialCharacters['integer'];
			} elseif($this->mode === 'ascii') {
				$indicator = $this->brailleAsciiSpecialCharacters['integer'];
			} else {
				$indicator = $this->brailleSpecialCharacters['integer'];
			}
		}
		
		// Zet het woord per karakter om
		for ($i = 0; $i < strlen($word); ++ $i) {
			if(($i + 1) < strlen($word)) {
				$next_letter = $word[$i + 1];
			} else {
				$next_letter = '';
			}
			
			if(($i + 2) < strlen($word)) {
				$third_letter = $word[$i + 2];
			} else {
				$third_letter = '';
			}
			
			$braille .= $this->convertCharacter($word[$i], $indicatorAdded, $word, $next_letter, $third_letter);
		}

		if($this->mode === 'ascii') {
			$braille = str_ireplace(array_keys($this->getAsciiReplacements()), array_values($this->getAsciiReplacements()), $braille);
		}
		
		// Geef de uitkomst terug
		return [
			'text' => $word,
			'braille' => $indicator . $braille,
		];
	}
	
	public function getAsciiReplacements() {
		return [
			'THE'=>'!',
			'ED'=>'$',
			'SH'=>'%',
			'AND'=>'&',
			'OF'=>'(',
			'WITH'=>')',
			'CH'=>'*',
			'ING'=>'+',
			'ST'=>'/',
			'EN'=>'5',
			'IN'=>'9',
			'WH'=>':',
			'GH'=>'<',
			'FOR'=>'=',
			'AR'=>'>',
			'TH'=>'?',
			'OW'=>'[',
			'OU'=>'\\',
			'ER'=>']',
			
			',T,H,E'=>',!',
			',E,D'=>',$',
			',S,H'=>',%',
			',A,N,D'=>',&',
			',O,F'=>',(',
			',W,I,T,H'=>',)',
			',C,H'=>',*',
			',I,N,G'=>',+',
			',S,T'=>',/',
			',E,N'=>',5',
			',I,N'=>',9',
			',W,H'=>',:',
			',G,H'=>',<',
			',F,O,R'=>',=',
			',A,R'=>',>',
			',T,H'=>',?',
			',O,W'=>',[',
			',O,U'=>',\\',
			',E,R'=>',]',
		];
	}
	
	/**
	* Zet het karakter om naar een braille teken
	*
	* @param string  $letter         De letter die omgezet moet worden
	* @param boolean $indicatorAdded Geeft aan of al een indicatie teken is toegevoegd
	*                                (nummer | hoofdletter)
	*
	* @return array De braille weergave voor de letter
	* @access array
	* @author WIM
	*/
	public function convertCharacter($character, $indicatorAdded = false, $word, $next_letter, $third_letter) {
		// De geformateerde braille string
		$braille = '';
		
		if(empty($character)) {
			return $braille;
		}
		
		// Kijk wat van soort karakter het is
		// Voor letters
		if (preg_match('/[a-z]/i', $character)) {
			// Controleer of het om een hoofdletter gaat en of dit aangegeven moet worden
			if ($indicatorAdded == false && preg_match('/[A-Z]/', $character)) {
				if($this->mode === 'binary') {
					$braille .= $this->brailleBinarySpecialCharacters['capital'];
				} elseif($this->mode === 'ascii') {
					$braille .= $this->brailleAsciiSpecialCharacters['capital'];
				} else {
					$braille .= $this->brailleSpecialCharacters['capital'];
				}
			}
			
			$character = strtolower($character);
			
			// Zet het letter om naar het alfabet
			if($this->mode === 'binary') {
				return $braille . $this->brailleBinaryAlphabet[$character];
			} elseif($this->mode === 'ascii') {
				return $braille . $this->brailleAsciiAlphabet[$character];
			} else {
				return $braille . $this->brailleAlphabet[$character];
			}
		}
		
		// Voor getallen
		if (preg_match('/[0-9]/', $character)) {
			// Controleer of het om een hoofdletter gaat en of dit aangegeven moet worden
			if ($indicatorAdded == false) {
				if($this->mode === 'binary') {
					$braille .= $this->brailleBinarySpecialCharacters['integer'];
				} elseif($this->mode === 'ascii') {
					$braille .= $this->brailleAsciiSpecialCharacters['integer'];
				} else {
					$braille .= $this->brailleSpecialCharacters['integer'];
				}
			}
			
			if($this->mode === 'binary') {
				return $braille . $this->brailleBinaryIntegers[$character];
			} elseif($this->mode === 'ascii') {
				return $braille . $this->brailleAsciiIntegers[$character];
			} else {
				return $braille . $this->brailleIntegers[$character];
			}
		}
		
		// Kijk of het speciale teken omgezet kan worden
		
		if($this->mode === 'binary') {
			$replacement = $this->brailleBinarySpecialCharacters[$character];
		} elseif($this->mode === 'ascii') {
			$replacement = $this->brailleAsciiSpecialCharacters[$character];
		} else {
			$replacement = $this->brailleSpecialCharacters[$character];
		}
		
		if (strlen($replacement) !== 0) {
			return $braille . $replacement;
		}
		
		// Als niks kan worden gevonden, Geef dan een foutmelding en retourneer een lege string
		if($this->validError(['letter'=>$character, 'next_letter'=>$next_letter, 'third_letter'=>$third_letter])) {
			$this->errors[] = [
				'description'=>'Character: ' . $character . '; Ord: ' . ord($character) . '; Hex: ' . bin2hex($character) . '; MB_ord: ' . mb_ord($character) . '; Ctype: ' . ctype_print($character) . '; Word: ' . $word . '; Next Letter: ' . $next_letter . '; Next-Next Letter: ' . $third_letter . '.',
			];
		}
		
		return $braille;
	}
	
	public function validError($args) {
		return TRUE;
		$letter = $args['letter'];
		$next_letter = $args['next_letter'];
		
		if($this->skip_next_error > 0) {
			$this->skip_next_error--;
			return FALSE;
		}
		
		switch($letter) {
			case (ORD($letter) === 226 && ORD($next_letter) === 128 && ORD($next_letter) === 115): # ’
				$this->skip_next_error = TRUE;
				return FALSE;
				break;
		}
		
		return TRUE;
		
	}
	
	public function formattedOutput($text) {
		$result = $this->convertText($text);
		
		return implode('', (array_column($result, 'braille')));
	}
}

?>
