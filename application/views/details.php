<?php
if(sizeof($full)==0)
{
  echo '<h1>Not available</h1>';
}
else
{
foreach ($full as $row) {
  
echo '    <div class="panel panel-default"></div>

      </div>
    </div>
<div class="row">
    <div class="contanier">
  

            <div class="col-md-8 col-md-offset-2">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
                
            
                <h3>'.$row->name.'</h3>
                <h4>'.$row->tag.'</h4>
                <p>'.$row->desc.'</p>
                <div class="row">
                <div class="col-md-6">
                <label>Team Members</team>
                <h4>'.$row->mem1.'</h4>
                <h4>'.$row->mem2.'</h4>
                <h4>'.$row->mem3.'</h4>
                <h4>'.$row->mem4.'</h4>
                </div>
                <div class="col-md-6">
                <label>Timeline</team>
                <h4>KICKOFF  --------->'.$row->kickoff.'</h4>
                <h4>PHASE 1  --------->'.$row->phase1.'</h4>
                <h4>PHASE 2  --------->'.$row->phase2.'</h4>
                <h4>PHASE 3  --------->'.$row->phase3.'</h4>
                <h4>CLOSING  --------->'.$row->closing.'</h4>
                </div>
            </div>

          
  </div>
  </div>';

}

echo $links;
}
?>