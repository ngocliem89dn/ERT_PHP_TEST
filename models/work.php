<?php
class Work
{
    public $id;
    public $name;
    public $startDate;
    public $endDate;
    public $status;
    public $CDate;
    public $UDate;

    function __construct($id, $name, $startDate, $endDate, $status, $CDate, $UDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
        $this->CDate = $CDate;
        $this->UDate = $UDate;
    }
	
	
    /**
    * Find work by id
    * @Params id
    * @Return work();
    */
    public function findById($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM works WHERE id = :id');
        $req->execute(array('id' => $id));
		
        $item = $req->fetch();
        if (isset($item['id'])) {
            return new Work($item['id'], $item['name'], $item['start_date'], $item['end_date'], $item['status'], $item['CDate'], $item['UDate']);
        }
        return null;
    }
  
    public function getAllArray()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM works');
		
        foreach ($req->fetchAll() as $item) {
            $color = '#3a87ad';
            $textColor = '#fff';
			
            if ($item['status'] == 'Doing') {
                $color = 'red';
            }
			
            if ($item['status'] == 'Complete') {
                $color = 'green';
            }
			
            $list[] = [
                "id" => $item['id'],
                "start" => $item['start_date'],
                "end" => $item['end_date'],
                "title" => $item['name'],
                "status" => $item['status'],
                "color" => $color,   // an option!
                "textColor" => $textColor // an option!
            ];
        }

        return $list;
    }
	
    public function save($data)
    {
        $db = DB::getInstance();
        if(isset($data['id'])) {
            $sql = "UPDATE `works` SET `name` = '". $data['name'] ."', `start_date` = '". $data['startDate'] ."', `end_date` = '". $data['endDate'] ."', `status` = '". $data['status'] ."' WHERE `id` = ". $data['id'] .";";
        } else {
            $sql = "INSERT INTO `works` (`id`, `name`, `start_date`, `end_date`, `status`, `CDate`, `UDate`) VALUES (NULL , '". $data['name'] ."', '". $data['startDate'] ."', '". $data['endDate'] ."', '". $data['status'] ."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)"	;
        }
        $req = $db->query($sql);
		
        return ($req) ? true : false;
    }
	
    public function delete($id)
    {
        $db = DB::getInstance();
        $sql = 'DELETE FROM works WHERE id = '.$id;
        $req = $db->query($sql);
		
        return ($req) ? true : false;
    }
}