<div class = 'container-fluid h-50'>
	<div id = 'editor'></div>
	<link href = 'https://cdn.quilljs.com/1.3.6/quill.snow.css' rel = 'stylesheet'>
	<script type = 'text/JavaScript' src = 'https://cdn.quilljs.com/1.3.6/quill.min.js'></script>
	<script type = 'text/JavaScript'>
		var quill = new Quill('#editor', {
			modules: {
				toolbar: true
			},
			theme: 'snow'
		});
	</script>
</div>