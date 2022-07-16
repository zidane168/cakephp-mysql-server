<?php 

namespace App\Event;

use Cake\Event\EventListenerInterface;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\EmailComponent;
use Cake\Log\Log;

class CourseListener implements EventListenerInterface
{
    public function implementedEvents(): array
    {
        return [
            'Model.Course.afterAddData'   => 'afterAddData',
            'Model.Course.writeLog'       => 'writeLog',
        ];
    }

    //public function call_send_mail($event)
    public function afterAddData($event, $data)
    {
        $this->Email = new EmailComponent(new ComponentRegistry());
        $this->Email->send($data, 'welcome', 'saved', 'Cheer you save succeed', 'vi.lh@vtl-vtl.com');
    }

    public function writeLog($event, $course) {

        // static Cake\Log\Log::emergency($message, $scope = [])
        // static Cake\Log\Log::alert($message, $scope = [])
        // static Cake\Log\Log::critical($message, $scope = [])
        // static Cake\Log\Log::error($message, $scope = [])
        // static Cake\Log\Log::warning($message, $scope = [])
        // static Cake\Log\Log::notice($message, $scope = [])
        // static Cake\Log\Log::info($message, $scope = [])
        // static Cake\Log\Log::debug($message, $scope = [])

        Log::warning('debug', ['scope' => ['cms']]);
        Log::info('info here: ' . json_encode($course) . " - event: " . json_encode($event), ['scope' => ['cms']]);
    }
}