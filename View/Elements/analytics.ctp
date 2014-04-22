<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?=$propertyID?>']);
<?php if (isset($stack)) {
	foreach($stack as $command => $data) {
		echo "  _gaq.push(['$command', '$data']);\n";
	}
}?>
  _gaq.push(['_trackPageview'<?php
	echo isset($pageView) ?  ", '".$this->Html->url($pageView)."'" : '';
?>]);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>