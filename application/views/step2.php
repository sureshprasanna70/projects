<?if(validation_errors())?>

<div class="alert alert-danger"><?echo validation_errors();?></div>
<?php
foreach ($full as $row) {
	# code...
}
echo '<form name="addnew" action="'.base_url().'edit" method="post">
<div class="form-group">
<div class="row">
<div class="col-md-3">
<label>Project name</label><br>
</div>
<div class="col-md-5">
<input class="form-control input-md" type="text" name="project_name" value="'.$row->name.'" size="50"/><br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3">
<label>Tag line for the project</label><br>
</div>
<div class="col-md-5">
<input class="form-control input-md" type="text" name="tag" value="'.$row->tag.'" size="50"/><br>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3">
<label>Year</label>
</div>
<div class="col-md-5">
<select id="year" name="year" class="form-control">
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
</select>
 </div>
</div>
</div>
<br>
<br>
<div class="row form-group">
	<div class="col-md-3">
<label class="control-label" for="projectdescription">Project description</label><br>
</div>
<div class="col-md-5">                     
<input type="text" class="form-control" value="'.$row->desc.'" size="200" name="project_desc"/>
</div>
</div>
</div>
<div class="row form-group">
	<div class="col-md-3">
<label class="control-label"> Team Members</label>
</div>
<div class="col-md-5">
<input class="form-control input-md" type="text" value="'.$row->mem1.'" placeholder="Member 1" name="mem_1" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->mem2.'" placeholder="Member 2" name="mem_2" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->mem3.'" placeholder="Member 3" name="mem_3" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->mem4.'" placeholder="Member 4" name="mem_4" size="50"/><br>
</div>
</div>
<div class=" row form-group">
<div class="col-md-3">
<label>Timeline</label>
</div>
<div class="col-md-5">
<input class="form-control input-md" type="text" value="'.$row->kickoff.'" placeholder="Kickoff" name="kickoff" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->phase1.'" placeholder="Phase 1"name="phase1" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->phase2.'" placeholder="Phase 2" name="phase2" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->phase3.'" placeholder="Phase 3" name="phase3" size="50"/><br>
<input class="form-control input-md" type="text" value="'.$row->closing.'" placeholder="Phase 4" name="closing" size="50"/><br>
  </div>
</div>
<!--div class="row">
	<div class="col-md-3">
<label>Photo</label><br>
</div>
<div class="col-md-5">
<input class="form-control" type="file"  name="photo"/>
</div>
</div-->
<br>
<div class="row">
	<div class="col-md-6">
<input class="form-control btn btn-success" type="submit" name="save" value="Update"/>
</div>
<div class="col-md-6">
<input class="form-control btn btn-danger" type="reset" name="clear" value="Clear"/>
</div>
</div>
<input type="hidden" value="'.$row->id.'" name="id">
</form>';
?>