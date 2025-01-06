<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title_for_layout ?></title>

    <style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
		text-align: left;
		font: 10px Helvetica, Arial, Sans-serif;
    }
	
	table th{
		text-align: left;
		font: 9px Arial, Sans-serif;
	}
	
</style>

</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        window.print(); // Trigger the print dialog
    });
</script>
