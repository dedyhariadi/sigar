<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>jQuery Clearme Plugin</title>
	<meta name="description" content="jQuery Clearme Plugin" />
	<meta name="keywords" content="jQuery Clearme Plugin" />
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/clearme.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		//example 1
		$('#example-1').clearme();
		
		//example 2
		$('#example-2').clearme({
			restoreValue:false//clears field on first click
		});
		
		//example 3
		$('#example-3').clearme({
			autocomplete:true//leave firefox default behavior
		});
		
		$('textarea').clearme();
		
		
		$('input[type="email"]').clearme();
		
		$('input[type="tel"]').clearme();
		
		$('input[type="url"]').clearme();
		
		$('input[type="search"]').clearme();
		
		$('input[type="number"]').clearme();
	});
	</script>
</head>
<body>
	<div id="wrapper">
		<h1>jQuery Clearme Plugin</h1>
		<h2>PHP version to demonstrate fields on form submission</h2>
		<h3>Markup requirements</h3>
		<ul>
			<li>Field should be input (text,email,tel,url,search or number) or textarea element.</li>
			<li>Field should have a title attribute to hold the watermark text.</li>
		</ul>
		<p>&nbsp;</p>
		<?php
		if(isset($_POST['submit'])){
			echo '<h2>Submitted data:</h2>';
			echo '<pre>'.print_r($_POST, true).'</pre>';
		}
		?>
		<p>Example:</p>
		<pre>&lt;input <strong>type</strong>="text" <strong>title</strong>="Watermark text to show when field is empty" /&gt;</pre>
		<form id="form1" method="post" action="">
			<div class="entry-example">
				<h2>Example 1 - Default</h2>
				<pre>$('#example-1').clearme();</pre>
				<label for="example-1">First Name:</label>
				<input type="text" name="first_name" id="example-1" value="<?php echo @$_POST['first_name']; ?>" title="Your First Name please..." />
			</div>
			
			<div class="entry-example">
				<h2>Example 2 - One time clear</h2>
				<p>Clears field on first click.</p>
				<pre>$('#example-2').clearme({
	restoreValue:false
});</pre>
				<label for="example-2">Middle Name:</label>
				<input type="text" name="middle_name" id="example-2" value="<?php echo @$_POST['middle_name']; ?>" title="Your Middle Name please..." />
			</div>
			
			<div class="entry-example">
				<h2>Example 3 - Leave firefox behavior alone</h2>
				<p>Leave firefox default behavior, that is, the current value of fields are restored on page refresh and not the initial value. Try changing the value and hit refresh (F5). Notice the value typed will remain in firefox.</p>
				<pre>$('#example-3').clearme({
	autocomplete:true
});</pre>
				<label for="example-3">Last Name:</label>
				<input type="text" name="last_name" id="example-3" value="<?php echo @$_POST['last_name']; ?>" title="Your Last Name please..." />
			</div>
			
			<div class="entry-example">
				<h2>Example 4 - Textarea</h2>
				<p>Also applies to textareas</p>
				<pre>$('textarea').clearme();</pre>
				<label for="example-4">Message:</label><br />
				<textarea name="message" id="message" title="Your message here..." cols="30" rows="10"><?php echo @$_POST['message'];?></textarea>
			</div>
			
			<div class="entry-example">
				<h2>Example 5 - HTML5 Email Field</h2>
				<pre>$('input[type="email"]').clearme();</pre>
				<label for="example-5">Email:</label>
				<input type="email" name="email" id="example-5" value="<?php echo @$_POST['email']; ?>" title="youremail@email.com" />
			</div>
			
			<div class="entry-example">
				<h2>Example 6 - HTML5 Tel Field</h2>
				<pre>$('input[type="tel"]').clearme();</pre>
				<label for="example-6">Telephone:</label>
				<input type="tel" name="telephone" id="example-6" value="<?php echo @$_POST['telephone']; ?>" title="555-55-55" />
			</div>
			
			<div class="entry-example">
				<h2>Example 7 - HTML5 Url Field</h2>
				<pre>$('input[type="url"]').clearme();</pre>
				<label for="example-7">URL:</label>
				<input type="url" name="url" id="example-7" value="<?php echo @$_POST['url']; ?>" title="Example: http://www.website.com" />
			</div>
			
			<div class="entry-example">
				<h2>Example 8 - HTML5 Search Field</h2>
				<pre>$('input[type="search"]').clearme();</pre>
				<label for="example-8">Search:</label>
				<input type="search" name="search" id="example-8" value="<?php echo @$_POST['search']; ?>" title="Search..." />
			</div>
			
			<div class="entry-example">
				<h2>Example 9 - HTML5 Number Field</h2>
				<pre>$('input[type="number"]').clearme();</pre>
				<label for="example-9">Number:</label>
				<input type="number" name="number" id="example-9" value="<?php echo @$_POST['number']; ?>" title="Enter numeric value..." />
			</div>
			<input type="submit" name="submit" />
		</form>
		
	</div>
	<!-- /wrapper -->
</body>
</html>
