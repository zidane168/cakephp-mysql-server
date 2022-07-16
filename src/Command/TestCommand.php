<?php
namespace App\Command;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;

// add component for use
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\EmailComponent;
use App\Controller\Component\SmsComponent;

class TestCommand extends Command
{

    public function initialize() : void
    {
        parent::initialize();

        // Load Component
        $this->Sms = new SmsComponent(new ComponentRegistry());
    }


    public function execute(Arguments $args, ConsoleIo $io) {

        $temp = $this->Sms->init();
        $io->out($temp);
    }
}