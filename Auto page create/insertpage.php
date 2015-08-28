<?php

/*
Author: AKASH
URI: github.com/akki9c
*/


?>

<?php

 include('wp-blog-header.php');
   global $wpdb;    
   
   $product_result = $wpdb->get_results ( "SELECT product_image,product_name,id FROM table_name" );    
   /*print_r($product_result);	
   echo count($product_result);	
   echo"<br /><br />";	*/			
   $product_name =array();	
   for($i=1;$i<=count($product_result); $i++)
		{				
			foreach($product_result as $key => $object)			
			{
				if($i == $object->id)
					{			
						$product_name[$i-1] = $object->product_name;	
															
					}			
			}					
		}
		
	$field_name_result = $wpdb->get_results ( "SELECT field_name,field_type FROM table_name" );    
	/*print_r($field_name_result);	*/

	/*ARRAY TO PRINT FIELD NAME*/
	$field_name = array();
		foreach($field_name_result as $key => $object)			
			{
							
				$field_name[] = $object->field_name;	
							
			}					
	/*print_r($field_name);*/
	$field_value_result = $wpdb->get_results ( "SELECT field_values,product_id FROM table_name" );
    /*print_r($field_value_result);*/
	
	
	/*ARRAY TO PRINT FIELD VALUE FOR EACH PRODUCT*/
	$field_value = array();
	for($i=1;$i<=count($product_result); $i++)
		{				
			foreach($field_value_result as $key => $object)			
			{
				if($i == $object->product_id)
					{			
						$field_value[$i-1][] = $object->field_values;	
															
					}			
			}					
		}
	/*print_r($field_value);*/

	/*echo "akki"; 
	print_r($product_name);
	echo $product_name[0];*/
	$page_name = array();
	for($i=0;$i<count($product_result); $i++)
		{				
			for($j=0;$j<count($product_result);$j++)			
			{
				if($product_name[$i]!=$product_name[$j])
					{										
						$page_name[] = $product_name[$i].' ' .'VS'.' '.$product_name[$j];									
					}			
			}					
		}
	/*print_r(str_replace('<br />','', $page_name));
	
	for($i=0;$i<count($page_name);$i++){
	echo (str_replace('<br />','', $page_name[$i])).'<br />';
	
}*/
/*function to get page title*/ 
/*function get_title_name_ak(){
	for($i=0;$i<count($page_name);$i++){
								 $title_name =(str_replace('<br />','', $page_name[$i])).'<br />';
	
								}
								
	return $title_name;
}*/

/* function to get page content*/
$pagenumber=count($page_name);
echo 'Total number of pages created='.$pagenumber;

$compare_content = array();
for($i=1;$i<=count($product_result); $i++)
									{				
										for($j=1;$j<=count($product_result);$j++)			
										{
											if($product_name[$i]!=$product_name[$j])
												{																							$compare_content[] = do_shortcode('[komper pid='.$i.','.$j.']');													
													
													}									
												}			
										}	
/*print_r ($compare_content);*/				

/*page is creating by using wp_insert_post() method by akash here $count represents number of pages*/
echo '<h1>List of page Create </h1><br />';
if($compare_content!=NULL){
for($count=0;$count<$pagenumber;$count++){
	$postarr = array(	
	'post_title'         =>     str_replace('<br />','', $page_name[$count]),	
	'post_content'         =>   $compare_content[$count],	
	'post_status'        =>    'publish', /* can be changed to 'draft', 'publish', 'pending', or 'future'*/	
	'post_author'        =>    1, /*post author 1 is admin, can be changed to the ID of the post author*/	
	'post_type'            =>    'page', /* can also use 'post' here.*/	
	/* 'post_parent'            =>    '22',  (completely optional) you can assign a parent ID to create child pages.*/	
	);	
	wp_insert_post($postarr); ?>	
	<p><?php echo $page_name[$count].' '. 'successfully Created';?>.</p>			
 <?php } ?>
<?php }else echo"<br /><h2> Unable to create page, Please first import the CSV file.</h2>";?>

  
 
 
 
 
 
 
 
 