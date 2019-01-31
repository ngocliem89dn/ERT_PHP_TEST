<?php
require_once('controllers/MainController.php');
require_once('models/work.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class WorksController extends MainController
{
    function __construct()
    {
        $this->folder = 'works';
    }

    /*
    ** Index page : full calendar for list of work
    */
    public function listWorks()
    {
        $this->render('index');
    }

    /*
    ** Create new work page
    */
    public function createWorks()
    {
        $this->render('create');
    }

    /*
    ** Update work page
    */
    public function editWorks()
    {
        $workId = $_GET['id'];
        $work = Work::findById($workId);
        $data = array('work' => $work);
        $this->render('update',$data);
    }

    /*
    **@Return json for list of work
    */
    public function listJsonWorks()
    {
        header('Content-Type: application/json');
        $works = Work::getAllArray();
        echo json_encode($works); 
        exit;
    }

    /*
    ** Add new work
    ** @Param str name, datetime startDate, datetime endDate, enum status
    */
    public function addWorks()
    {
        if (isset($_POST['Submit'])) { 
            $work = Work::save($_POST);
            if ($work) {
                header("Location: index.php?controller=works&action=index&insert_success=" . (bool)$work);
            } else {
                $logger = new Logger('default');
                $logger->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
                $logger->ERROR("Update to do work fail : ".$_POST['id']);
            }
         }
        $this->render('create',$_POST);
    }

    /*
    ** Update work
    ** @Param int id, str name, datetime startDate, datetime endDate, enum status
    */
    public function updateWorks()
    {
        $result = false;
        if (isset($_POST['id'])) { 
            $work = Work::save($_POST);
            $result = (bool)$work;
        }
        if ($result) {
            header("Location: index.php?controller=works&action=edit&id=". $_POST['id'] ."&update_success=1");
        } else {
            $logger = new Logger('default');
            $logger->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
            $logger->ERROR("Update to do work fail : ".$_POST['id']);
            header("Location: index.php?controller=works&action=edit&id=". $_POST['id'] ."&update_success=2");
        }
    }

    /*
    ** Delete work
    ** @Param int workId
    */
    public function deleteWorks()
    {
        header('Content-Type: application/json');
        if (isset($_POST['id'])) { 
            $work = Work::delete($_POST['id']);
            echo json_encode($work); 
            exit;
        } else {
            $logger = new Logger('default');
            $logger->pushHandler(new StreamHandler('app.log', Logger::DEBUG));
            $logger->ERROR('No have record to delete');
        }
    }


    /*
    ** Error Page
    */
    public function error()
    {
        $this->render('error');
    }
}