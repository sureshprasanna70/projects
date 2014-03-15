<h1><?echo $username.',';?></h1>
<h1>Click on one of the projects to edit</h1>
<div class="row">
	<div class="col-md-4">Project Name</div>
	<div class="col-md-4">Last edited By</div>
	<div class="col-md-4">Last edited At</div>
</div>
<?php
foreach($linki as $row)
{
	echo '<div class="row">
			<div class="col-md-4">';
	echo '<a href='.base_url().'showeditor/'.$row->id.'>'.$row->name.'</a></div>';
	echo '<div class="col-md-4">'.$row->edited_by.'</div>';
	echo '<div class="col-md-4">'.$row->edited_at.'</div>';


	echo '</div>';
	
}
?>