<h1><?echo $username.',';?></h1>
<h1>Click on one of the projects to edit</h1>
<?php

foreach($linki as $row)
{
	echo '<div class="row"><div class="col-md-6">';
	echo '<ul>';
	echo '<a href='.base_url().'showeditor/'.$row->id.'>'.$row->name.'</a>';
	echo '</ul></div></div>';
	
}
?>