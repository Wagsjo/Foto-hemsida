<?php 
$text_type = get_sub_field('text_type'); 
$text_content = get_sub_field('text_content'); 
?>

<div class="textrow">
   <?php echo "<".$text_type.">".$text_content."</".$text_type.">"; ?>
</div>