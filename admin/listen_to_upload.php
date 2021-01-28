<?php 
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
 
// Create connection
 
$conn = mysql_connect($servername, $username, $password);
$db = mysql_select_db($dbname, $conn) or die(mysql_error());
 
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
 
// Include Spout library 
require_once 'spout-2.4.3/src/Spout/Autoloader/autoload.php';
 
// check file name is not empty
if (!empty($_FILES['file']['name'])) {
      
    // Get File extension eg. 'xlsx' to check file is excel sheet
    $pathinfo = pathinfo($_FILES["file"]["name"]);
     
    // check file has extension xlsx, xls and also check 
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
           && $_FILES['file']['size'] > 0 ) {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name']; 
    
        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);
 
        // Open file
        $reader->open($inputFileName);
        $count = 1;
        $rows = array(); 
         
        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {
             
            // Number of Rows in Excel sheet
            foreach ($sheet->getRowIterator() as $row) {
 
                // It reads data after header. In the my excel sheet, 
                // header is in the first row. 
                if ($count > 1) { 
 
                    // Data of excel sheet
                    $data['username'] = $row[0];
                    $data['password'] = $row[1];
                    $data['matric_no'] = $row[2];
                    $data['surname'] = $row[3];
                    $data['firstname'] = $row[4];
                    $data['lastname'] = $row[5];
                    $data['block'] = $row[6];
                    $data['room_num'] = $row[7];
                    $data['faculty'] = $row[8];
                    $data['department'] = $row[9];
                    $data['hall'] = $row[10];

                     
                    // Push all data into array to be inserted as 
                    // batch into MySql database.  
                    array_push($rows, $data);
                }
                $count++;
            }
 
            // Print All data
            //print_r($rows);
            /*echo $rows[0]['name'];
            echo $rows[0]['email'];
            echo $rows[0]['phone'];*/
            $username = "";
            $password= "";
            $matric_no = "";
            $surname = "";
            $firstname = "";
            $lastname = "";
            $block = "";
            $room_num = "";
            $faculty = "";
            $department = "";
            $hall = "";

            $counter = 0;
          foreach($rows as $section => $items)
          {
			foreach($items as $key => $value){
				//echo "$section:\t$key\t($value)<br>";  foreach ($rows as $key => $value) 
            	# code...
            	//echo $rows[$section][$key];
            	//echo "breake me";
            	$username = $rows[$section]['username'];
            	$password = $rows[$section]['password'];
            	$matric_no = $rows[$section]['matric_no'];
            	$surname = $rows[$section]['surname'];
                $firstname = $rows[$section]['firstname'];
                $lastname = $rows[$section]['lastname'];
                $block = $rows[$section]['block'];
                $room_num = $rows[$section]['room_num'];
                $faculty = $rows[$section]['faculty'];
                $department = $rows[$section]['department'];
                $hall = $rows[$section]['hall'];

            }
            //echo "$name and $email and $phone and $city";
            //echo "<br/><br/>";
              $sql = "INSERT INTO user VALUES (null, '$username', '$password', '$matric_no', '$surname', '$firstname', '$lastname', '$block', '$room_num', '$faculty', '$department', 1 , '$hall')";
            $result = mysql_query($sql) or die (mysql_error());
            if($result && $counter == 0){
            	echo "record submitted successfully";
            }
            $counter++;

          }
           // $sql = "INSERT INTO excel_data VALUES (null, '$rows[0]', '$rows[1]', '$rows[2]', '$rows[3]')";
            //$result = mysql_query($sql) or die mysql_error();
 
            // Now, here we can insert all data into database table.
 
        }
 
        // Close excel file
        $reader->close();
 
    } else {
 
        echo "Please Select Valid Excel File";
    }
 
} else {
 
    echo "Please Select Excel File";
     
}
?>
