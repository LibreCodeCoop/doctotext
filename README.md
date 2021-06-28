# Convert doc to text

## Setup

```bash
sudo apt-get update
sudo apt-get install libreoffice-writer
composer require librecodecoop/doctotext
```

## Use

```php
<?php

use DocToText\DocToText;

$docFile = 'document.doc';
$outputDir = '/tmp';
$doctotext = new DocToText($docFile, $outputDir));
echo "Text:" . PHP_EOL;
echo $doctotext->getText();
echo "Total words:" . PHP_EOL;
echo $doctotext->count();
```

## Explain

This package is a wrapper to libreoffice.
