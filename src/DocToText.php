<?php
namespace DocToText;

class DocToText
{
    private $docFile;
    private $outputDir;
    private $text;

    public function __construct($docFile, $outputDir = '/tmp')
    {
        $this->docFile = $docFile;
        $this->outputDir = $outputDir;
    }

    public function getText()
    {
        $info = pathinfo($this->docFile);
        exec('libreoffice --headless --convert-to "txt:Text (encoded):UTF8" --outdir ' . $this->outputDir . ' ' . $this->docFile);
        $this->text = file_get_contents($this->outputDir . DIRECTORY_SEPARATOR . $info['filename'].'.txt');
        unlink($this->outputDir . DIRECTORY_SEPARATOR . $info['filename'].'.txt');
        return $this->text;
    }

    public function wordCount()
    {
        if ($this->text) {
            return str_word_count($this->text);
        }
        return str_word_count($this->getText());
    }
}