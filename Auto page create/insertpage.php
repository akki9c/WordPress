<?php
/*
Author: AKASH
URI: github.com/akki9c
*/
?>
<?php


 include('wp-blog-header.php');
   global $wpdb;    
   
   $product_result = $wpdb->get_results ( "SELECT product_image,product_name,id FROM wp_pswe_komper_product" );    
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
		
	$field_name_result = $wpdb->get_results ( "SELECT field_name,field_type FROM wp_pswe_komper_field" );    
	/*print_r($field_name_result);	*/

	/*ARRAY TO PRINT FIELD NAME*/
	$field_name = array();
		foreach($field_name_result as $key => $object)			
			{
							
				$field_name[] = $object->field_name;	
							
			}					
	/*print_r($field_name);*/
	$field_value_result = $wpdb->get_results ( "SELECT field_values,product_id FROM wp_pswe_komper_value" );
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
	$rev_page_name=array();
	for($i=0;$i<count($product_result); $i++)
		{				
			for($j=0;$j<count($product_result);$j++)			
			{
				if($product_name[$i]!=$product_name[$j])
					{										
						$page_name[] = $product_name[$i].' ' .'VS'.' '.$product_name[$j];	
						$rev_page_name[] = 	$product_name[$j].' ' .'VS'.' '.$product_name[$i];
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
// check page name and its reverse name.
// print_r(str_replace('<br />','', $page_name));
// print_r(str_replace('<br />','', $rev_page_name));
// die();

/* function to get page content*/
$pagenumber=count($page_name);
//echo 'Total number of pages created='.$pagenumber;

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
$ak_pagenumber=0;
/*page is creating by using wp_insert_post() method by akash here $count represents number of pages*/
if($_GET['ak']=='ak'){
echo '<h1 style="text-align: center; background-color: brown; color: #fff;">List of Pages Create </h1><br />';
if($compare_content!=NULL){
echo "<ul style='margin:0px 182px 0px 182px !important;' class='list-group'>";		
for($count=0;$count<$pagenumber;$count++){
	
	
	if (get_page_by_title($page_name[$count], OBJECT, 'page') OR get_page_by_title($rev_page_name[$count], OBJECT, 'page') ){
		echo"<li  style='letter-spacing: 1px !important;' class='list-group-item'>";
		echo "Page title matched, Skipping page creation of "."<div style='color:red; font-weight:bold;'>".$page_name[$count].".</div>";/*skipped duplicate page creation*/
		echo"</li>";
	}
	else{
		//echo "page title not matched ".$page_name[$count];/*page is successfully created*/
		//echo"<br />";
		$ak_pagenumber++;	
		$postarr = array(	
		'post_title'         =>     str_replace('<br />','', $page_name[$count]),	
		'post_content'         =>   $compare_content[$count],	
		'post_status'        =>    'publish', /* can be changed to 'draft', 'publish', 'pending', or 'future'*/	
		'post_author'        =>    1, /*post author 1 is admin, can be changed to the ID of the post author*/	
		'post_type'            =>    'page', /* can also use 'post' here.*/	
	/* 'post_parent'            =>    '22',  (completely optional) you can assign a parent ID to create child pages.*/	
	);	
	wp_insert_post($postarr, $wp_error ); ?>	
	<?php 
		echo"<li style='letter-spacing:1px !important;' class='list-group-item'>";
		echo $page_name[$count].' is '.' '.'<span style="color:green; font-weight:600;">successfully Created</span>.</li>';?>
		
	
<?php } ?>
<?php } ?>
<?php	echo '<h3 style="text-align: center; background-color: brown; color: #fff;"> Total number of pages created = '.'<span style="color:green;">'.$ak_pagenumber.'</span></h3>'; ?>
<?php }
	else echo"<br /><h2> Unable to create page, Please first import the CSV file.</h2>";?>
<?php } 


// echo'<link rel="stylesheet" href="wp-content\plugins\komper\assets\css\bootkomper.css" type="text/css">';
 echo'<link rel="stylesheet" href="wp-content\themes\Frank-master\style.css" type="text/css">';
// echo '<style type="text/css" >


// .kompericon-ok{
	    // background-image:url("wp-content/plugins/komper/assets/img/ok.png");
// }
// .kompericon-remove{
	// background-image:url("wp-content/plugins/komper/assets/img/cancel.png");
// }

// </style>';
echo '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>';

?>
 
