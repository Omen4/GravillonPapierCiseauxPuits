<?php
namespace services;

use interfaces\MoveInterface;

class ASCIIMoves
{
    public $ASCIIfist = "\n
                        _    ,-,    _\n
                 ,--, /: :\/': :`\/: :\ \n
                |`;  ' `,'   `.;    `: | \n
                |    |     |  '  |     |. \n
                | :  |     |     |     || \n
                | :. |  :  |  :  |  :  | \ \n
                 \__/: :.. : :.. | :.. |  ) \n
                      `---',\___/,\___/ /' \n
                           `==._ ____ /' \n
    \n ";

    public $ASCIIpaper = "\n
                     _.-._ \n
                    | | | |_ \n
                    | | | | | \n
                    | | | | | \n
                  _ |  '-._ | \n
                  \`\`-.'-._; \n
                   \    '   | \n
                    \  .`  / \n
                     |    | \n
    \n ";

    public $ASCIIscissors = "\n
        _______\n
    ---'   ____)____\n
              ______)\n
           __________)\n
          (____)\n
    ---.__(___)\n
    ";

    public $ASCIIki = '  /\_/\ \n
                       =( °w° )= \n
                         )   (  // \n
                        (__ __)// \n';

    public function returnASCIIArt($moveValue)
    {
        switch ($moveValue) {
            case MoveInterface::PIERRE:
                return $this->ASCIIfist;
            case MoveInterface::CISEAUX:
                return $this->ASCIIscissors;
            case MoveInterface::FEUILLE;
                return $this->ASCIIpaper;
            default:
                break;
        }
    }
}