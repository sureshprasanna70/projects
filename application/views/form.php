<form name="addnew" action="<?echo base_url();?>add_to_gal" method="post">
<br>
<label>Project name</label>
<input type="text" name="project_name" size="50"/><br>
<label>Year</label>
<select name="year">
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>

</select>
<br>
<label>Project description</label><br>
<textarea rows="10" cols="50" name="project_desc"></textarea>
<br>
<label>Team Members</label><br>
<input type="text" name="mem_1" size="50"/><br>
<input type="text" name="mem_2" size="50"/><br>
<input type="text" name="mem_3" size="50"/><br>
<input type="text" name="mem_4" size="50"/><br>
<label>Timeline</label><br>
<input type="text" name="kickoff" size="50"/><br>
<input type="text" name="phase1" size="50"/><br>
<input type="text" name="phase2" size="50"/><br>
<input type="text" name="phase3" size="50"/><br>
<input type="text" name="closing" size="50"/><br>
<br>
<label>Photo</label><br>
<input type="file"  name="photo"/>
<input type="submit" name="save" value="Save"/>
<input type="reset" name="clear" value="Clear"/>
</form>