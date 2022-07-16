<?php

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;


// add component for use
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\CommonComponent;

use voku\helper\HtmlDomParser;

class CrawlCommand extends Command
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Common = new CommonComponent(new ComponentRegistry());
    }

    protected $delimited = ' --------------------------------------------- ';
    protected $result = [];

    protected function get_one_page($page, &$row, $year, $month, ConsoleIo $io) {
        $result = $this->Common->handling_crawl_web($year, $month, $page);
        $io->out($this->delimited);
        $io->out('---> Page: ' . $page);
        $io->out($this->delimited);

        if ($result['status'] == 200) {

            $dom = HtmlDomParser::str_get_html($result['result']);

            $tables = $dom->find('FORM[method=post] table', 2);

            $trs = $tables->find('tr');
            $result  = [];

            $skip_first_tr = true;  // title

            $count_tr = 0;
            foreach ($trs as $tr) {
                $count_tr++;

                if ($skip_first_tr) {
                    $skip_first_tr = !$skip_first_tr;
                    continue;
                }
               
                $tds = $tr->find('td');
              
                $skip_first_td = true;  // checkbox
                $records = [];

                foreach ($tds as $td) {

                    if ($skip_first_td) {
                        $skip_first_td = !$skip_first_td;
                        continue;
                    }

                    $records[] = str_replace("&nbsp;", ' ', $td->plaintext);
                }

                if (count($records) > 3) {
                    // $result[] = $records;
                    //debug ('retrieved row: ' . $row . ' successfully: ' . implode(", ", $records));
                    $io->out($row . ': ' . implode(", ", $records));

                    $rel = explode(' ', $records[1]);
                    $name       = count($rel) >= 2 ? $rel[1] : '';
                    $building   = count($rel) >= 3 ? $rel[2] : '';

                    $this->result[] = array(
                        'registration_date'     => $records[0],
                        'address'               => $records[1],
                        'name'                  => $name, 
                        'building'              => $building,
                        'layers'                => $records[2],
                        'unit'                  => $records[3],
                        'construction_area'     => $records[4],
                        'transaction'           => $records[5],
                        'price_per_square_foot' => $records[6]
                    );
                } 

                $row++;
            }

            if ($count_tr <= 4) {       // chi co 4 dong
                return array(
                    'status' => false,
                    'result' => array(),
                );
            }

            return array(
                'status' => true,
                'result' => $this->result,
            );
            
        } else {
            return array(
                'status' => false,
                'result' => array(),
            );
        }
    }

    public function execute(Arguments $args, ConsoleIo $io)
    {
        $page = 1;
        $row = 1;
        $year = 2022;
        $month = 6;

        $obj_CppclRecords = TableRegistry::get('CppclRecords');

        $io->out('----> Start Crawling: cppcl.property.hk');
        while (true) {
            $rel = $this->get_one_page($page++, $row, $year, $month, $io);
            
            if (!$rel['status']) {
                break;
            }           
        }
        $io->out('----> Retrieved all data successfully!, Going to store data into database, please wait ...');

        if ($this->result) {

            $obj_CppclRecords = TableRegistry::get('CppclRecords');
            
            // clear
            $obj_CppclRecords->deleteAll(array(
                'YEAR(registration_date) = ' . $year, 
                'MONTH(registration_date) = ' . $month,
            ));
            
            // save
            $cppcl = $obj_CppclRecords->newEntities($this->result);
            
            if ($obj_CppclRecords->saveMany($cppcl)) {
                $io->out('----> data is saved');
            }
        }
        $io->out('----> End Crawling: cppcl.property.hk');
    }
}
