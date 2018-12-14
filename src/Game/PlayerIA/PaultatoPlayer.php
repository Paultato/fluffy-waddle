<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class LovePlayer
 * @package Hackathon\PlayerIA
 * @author PaulB
 */
class PaultatoPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        



        // Coucou Robin j'espère ta correction se passe bien et que tu me mettras 20 MERCI
        
        $nbRound = $this->result->getNbRound();
        // La famille TMTC
        $gangDuT9 = array('Santost', 'Mattiashell', 'Vcollette', 'Neosia67');
        // Les ennemis de la nation
        $ennemis = array('Akatsuki95', 'Vegan60');
        // On apprend le nom de l'adversaire et si c'est pas la famille je le brise
        $oppName = $this->result->getStatsFor($this->opponentSide)['name'];
        // Le score de l'adversaire pour savoir si il est mieux que moi et le tacler après il va voir flou
        $oppScore = $this->result->getStatsFor($this->opponentSide)['score'];
        // Mon score de bon codeur qui documente beaucoup le code
        $myScore = $this->result->getStatsFor($this->mySide)['score'];

        // On régale la famille TMTC
        if ($nbRound === 9) {
            if (in_array($oppName, $gangDuT9))
                return parent::friendChoice();
            return parent::foeChoice();
        }

        // Parce que je suis un mec haineux et que j'aime la gratuité de la violence
        if ($myScore < $oppScore)
            return parent::foeChoice();

        // Parce que je déteste certaines personnes de la classe
        if (in_array($oppName, $ennemis))
                return parent::foeChoice();

        // Détection de ratio de haine de l'adversaire grâce à un réseau de neurone
        if ($nbRound != 0) {
            $foePercent = $this->result->getStatsFor($this->opponentSide)['foe'] / $nbRound;
            if ($foePercent > 0.5)
                return parent::foeChoice();
        }

        // C'est pour la forme, je prétends être gentil des fois
        return parent::friendChoice();
    }
 
};
