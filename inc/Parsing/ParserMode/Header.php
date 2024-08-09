<?php

namespace dokuwiki\Parsing\ParserMode;

class Header extends AbstractMode
{
    /** @inheritdoc */
    public function connectTo($mode)
    {
        //we're not picky about the closing ones, two are enough
        $this->Lexer->addSpecialPattern(
            '[ \t]*={2,}[^\n]+={2,}[ \t]*(?=\n)',
            $mode,
            'header'
        );

        //ahmet: allow lists without spaces at the beginning (I'm too lazy to write a whole plugin for this simple change).
        global $conf;
        if($conf['onesidedheaders']){
            $this->Lexer->addSpecialPattern(
                '[ \t]*={2,}[^\n]+',
                $mode,
                'header'
            );
            }
    }

    /** @inheritdoc */
    public function getSort()
    {
        return 50;
    }
}
