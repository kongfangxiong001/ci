<h2>Create a news item</h2>
<?php echo validation_errors();?>
<?php echo form_open("news/create");?>
<label for="title">title</label>
<input type="input" name="title"/><br/>

<label for="text">Text</label>
<textarea name="text"></textarea><br/>

<input type="submit" name="submit" values="Create news item"/>

</form>