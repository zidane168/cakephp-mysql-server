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

class HelloCommand extends Command
{

    public function initialize() : void
    {
        parent::initialize();

        // Load Component
        $this->Email = new EmailComponent(new ComponentRegistry());
    }


    public function execute(Arguments $args, ConsoleIo $io) {

        $mail = $this->Email->call_email_func('test');
        $data= array(
            'value1' => 'a',
            'value2' => 'b',
        );
        $mail = $this->Email->send_v1($data);
        $io->out($mail);

        $obj_Courses = TableRegistry::get('Courses');
        $data = $obj_Courses->get_all('zho');
        $io->out($data);
        $io->out(' -------------------------- ');
        $io->out('Hello world.');
    }
}