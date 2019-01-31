<?php
require_once('models/work.php');
require_once('connection.php');

use PHPUnit\Framework\TestCase;

class WorksControllerTest extends TestCase
{
    use PHPUnit_Extensions_Database_TestCase_Trait;

    /**
    * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
    */
	
    public function getConnection()
    {
        $database = 'nal_text_php';
        $user = 'root';
        $password = '';
        $pdo = new PDO('mysql:host=localhost;dbname=nal_text_php', $user, $password);
        return $this->createDefaultDBConnection($pdo, $database);
    }

    public function testCreateWork()
    {
        // get default values for new work
        $values = $this->getWorkValues();

        $tableNames = ['works'];
        $dataSet = $this->getConnection()->createDataSet($tableNames);
				
        // count number of records before create
        $before = $this->getConnection()->getRowCount('works');

        // assert work is created
        $work = Work::save($values);

        // check work has been incremented
        $after = $this->getConnection()->getRowCount('works');
        $this->assertGreaterThan($before, $after);
    }
	
    public function testUpdateWork()
    {
        // get default values for new work
        $values = $this->getWorkValues();
        $values['id'] = 3;

        // assert work is update
        Work::save($values);
		
        $work = Work::findById(3);

        $this->assertEquals($values['name'], $work->name);
    }
	
    public function testFindWorkByWorkId()
    {	
        $workId = 1;
        $work = Work::findById($workId);
        $this->assertEquals(1, $work->id);
    }
	
    public function testDeleteWorkByWorkId()
    {	
        $tableNames = ['works'];
        $dataSet = $this->getConnection()->createDataSet($tableNames);
		
        // count number of records before create
        $before = $this->getConnection()->getRowCount('works');
		
        $workId = 1;
        $work = Work::delete($workId);
		
        // check works has been incremented
        $after = $this->getConnection()->getRowCount('works');
        $this->assertGreaterThan($after, $before);
    }
	
	
	// protected functions

    protected function getWorkValues(array $values=array())
    {
        // defaults
        $work = array(
            'name' => 'Php unit test',
            'startDate' => date("Y-m-d H:i:s"),
            'endDate' => date("Y-m-d H:i:s"),
            'status' => 'Doing',
            'CDate' => date("Y-m-d H:i:s"),
            'UDate' => date("Y-m-d H:i:s"),
        );

        // overwrite defaults above with those passed in
        foreach($values as $key => $value) {
            if(array_key_exists($key, $work)) $work[$key] = $value;
        }

        return $work;
    }
	
    public function getDataSet()
    {
        return $this->createXMLDataSet('tests/myXmlFixture.xml');
    }
}