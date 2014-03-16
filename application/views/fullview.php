
<?php
echo '<h1>Projects '.$year.'</h1>';
if(sizeof($project)==0)
{

	echo "<h1>Thanks for your interest.<br>We haven't updated yet</h1>";
}
else
{
    echo '<div class="row">
            <div class="contanier">
            <div class="col-md-3 ">
    <div class="jumbotron">
       <h3>Highlight of the year</h3>
        <p>Mention the project here</p>
</div>
    </div>';
foreach ($project as $row) {
		
		echo '
        <div class="col-md-9" style="float:right;">
          <div class="col-lg-7 col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>

            <div class="col-lg-5 col-md-5">
                <h3>'.$row->name.'</h3>
                <h4>'.$row->tag.'</h4>
                <p>'.substr($row->desc,0,20).'</p>
                <a class="btn btn-primary" href="'.base_url().'show/'.$row->id.'">View Project>></a>
            </div>

  </div>
  </div>
</div>

<br>
<br>';

}
}
?>