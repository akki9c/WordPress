<?php


/*Author: AKASH
  URI: github.com/akki9c
 
*/

?>
<?php


$conn = mysql_connect("localhost", "qosyco_wor5584", "fl2AfBAgXx2R");

if( $conn === false ) {
		die( 'unable to connect');
	}


if (!mysql_select_db('qosyco_wor5584', $conn)) {
		echo 'Could not select database';
		exit;
	}
	
	
$file_name = $_POST['filename'];	
$filename = "wp-content/uploads/csvfiles/$file_name";

/* function to create csv file in array */

	$delimiter=',';
    if(!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {
            if(!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }
/*print_r ($data);



echo "$count";
$each_data = $data[0];
echo $each_data[product_name];*/
$count=count($data);




/*query for Count the number of fields */
$result = mysql_query(("SELECT COUNT(*) as total FROM wp_pswe_komper_field"), $conn); 
					
$total=mysql_fetch_assoc($result);
$total_field = $total['total'];		
// echo $total_field;



/*query for minimum value of field Id*/
$result = mysql_query(("SELECT MIN(id) as Minimum FROM wp_pswe_komper_field"), $conn); 
					
$total=mysql_fetch_assoc($result);
$minimum_field_id = $total['Minimum'];
/*query for maximum value of product id*/
$result = mysql_query(("SELECT Max(id) as maximum FROM wp_pswe_komper_product"), $conn); 
					
$total=mysql_fetch_assoc($result);
$maximum_product_id = $total['maximum'];







if($maximum_product_id == NULL)
	{
	$p=1;
		while($p<=$count)
			{
				
	
				$each_data = $data[$p-1];
				$tsql = "INSERT INTO wp_pswe_komper_product (id,product_name,product_image,product_summary)
							VALUES ($p,'$each_data[product_name]', '$each_data[product_image]', '$each_data[product_summary]')"; 
					
					if( mysql_query($tsql, $conn))
						{
							/*echo "Statement executed.\n";*/
						} 
					else
						{
							echo "Error in statement execution.\n";
							die( print_r( mysql_error(), true));
						}
					$i=1; 
					$f = $minimum_field_id;
					while($i <= $total_field) 
						{
							$field = "field_"."$i";
							$tsql = "INSERT INTO wp_pswe_komper_value (field_values,product_id,field_id)
									VALUES ('$each_data[$field]',$p,$f)"; 
									
							if( mysql_query($tsql, $conn))
							{
								/*echo "Statement executed.";*/
								$i++;
								$f++;
							} 
							else
							{
								echo "Error in statement execution.\n";
								die( print_r( mysql_error(), true));
							}
					
					}
					$p++;
			}
			
	}
else{
	
	$p = ($maximum_product_id+1);

while($p<=($count+$maximum_product_id-1))
{
		$each_data = $data[($p-$maximum_product_id)-1];
	
	$tsql = "INSERT INTO wp_pswe_komper_product (id,product_name,product_image,product_summary)
							VALUES ($p,'$each_data[product_name]', '$each_data[product_image]', '$each_data[product_summary]')"; 
					
					if( mysql_query($tsql, $conn))
						{
							/*echo "Statement executed.\n";*/
						} 
					else
						{
							echo "Error in statement execution.\n";
							die( print_r( mysql_error(), true));
						}
					$i=1; 
					$f = $minimum_field_id;
					while($i <= $total_field) 
						{
							$field = "field_"."$i";
							$tsql = "INSERT INTO wp_pswe_komper_value (field_values,product_id,field_id)
									VALUES ('$each_data[$field]',$p,$f)"; 
									
							if( mysql_query($tsql, $conn))
							{
								/*echo "Statement executed.";*/
								$i++;
								$f++;
							} 
							else
							{
								echo "Error in statement execution.\n";
								die( print_r( mysql_error(), true));
							}
					
					}
					$p++;
			}
}

echo "<h1>All Records Are successfully Imported.</h1><br />";
echo "Number of row inserted="." ".$count." "."<br />";
echo "Number of column inserted=".($total_field+3)."<br />";

/*echo "<a href='http://brokernotes.co/'><- Go Back To Home</a><br />";*/
echo "<a href='http://brokernotes.co/insert_broker_page.php?ak=ak'>Click Here To Create Bulk Of Page</a><br /><strong>(NOTE:Don't Click twice.)</strong>";

?>

<?php

unlink($filename);

?>
