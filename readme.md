# English to Braille (in PHP)

Convert your English to Braille in PHP.

## What YOU Do

* Give the program ENGLISH text.

## What WE Do

* Give you the output of the English text in braille, using ascii-format (machine-readable), dotted-format (human-readable), and binary-format (for more intricate projects).

<img src="image/braille.jpg" width="300">

## What are these formats?

You can set the mode of your braille converter when it is initialized, for instance...

    $braille = new brailleHandler(['mode'=>'ascii']);
