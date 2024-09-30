<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
		<div class="alert alert-danger my-2 h-25" role="alert">
		<p><?php echo $error ?></p>
		</div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>