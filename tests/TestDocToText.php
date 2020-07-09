<?php 
namespace Tests;
use PHPUnit\Framework\TestCase;
use DocToText\DocToText;

final class TestDocToText extends TestCase
{
    public function testConvertDocumentToText()
    {
        $path = __DIR__ . '/fixtures/document.doc' ;
        $output =  __DIR__ . '/fixtures';

        $docToText = new DocToText($path, $output);
        
        // BOM is used at the beginning of the text flow to indicate the unicode   
        // characters the file uses. Libreoffice saves the text document using BOM.
        $BOM = "\xef\xbb\xbf";
        $expected = $BOM . "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean volutpat lobortis urna, a dictum sem.\r\n";  
        
        $this->assertEquals($expected, $docToText->getText());
    }
}
