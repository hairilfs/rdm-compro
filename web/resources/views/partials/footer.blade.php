<footer id="footer">
	<div class="container">
		<div class="footer--inner flexed justify">
			<p class="copyright no-margin f-med">ALL CONTENT © 2018 RDM.</p>
			@if ($em = getSetting('Contact', 'footer_email'))
			<a href="mailto:{{ strtolower($em) }}?Subject=Hello" target="_blank" class="link f-med">{{ strtoupper($em) }}</a>
			@endif
		</div>
	</div>
</footer><!-- #footer -->