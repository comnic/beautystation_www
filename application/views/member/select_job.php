<select>
<?php 
foreach($job_list[0] as $parent){
	foreach($job_list[$parent['idx']] as $job){
		echo("<option value='${job['idx']}'>${parent['name']} > ${job['name']}</option>");
	}
}
?>
</select>