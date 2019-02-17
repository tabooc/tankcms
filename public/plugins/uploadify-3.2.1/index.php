<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>UploadiFive Test</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="jquery.uploadify.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="uploadify.css">
        <style type="text/css">
            body {
                font: 13px Arial, Helvetica, Sans-serif;
            }
        </style>
    </head>

    <body>
        <h1>Uploadify Demo</h1>
        <form>
            <input type="hidden" name="track" id="track" value="<?php echo md5('this'); ?>" />
            <div id="queue"></div>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
        </form>

        <script type="text/javascript">
<?php $timestamp = time(); ?>
            $(function() {
                var i = 0;
                var j = 0;
                $('#file_upload').uploadify({
                    'formData': {
                        'timestamp': '<?php echo $timestamp; ?>',
                        'token': '<?php echo md5('unique_salt' . $timestamp); ?>',
                        'track':$("#track").val()
                    },
                    'removeCompleted': false,
                    'queueSizeLimit': 20,
                    'buttonText': '-选择文件-',
                    'swf': 'uploadify.swf',
                    'uploader': 'uploadify.php',
                    'width': 100,
                    'onUploadSuccess': function(file, data, response) {
                        i++;
                        $("#queue").html(i + ' / ' + j);
                    },
                    'onSelect': function(file) {
                        j++;
                        $("#queue").html(i + ' / ' + j);
                    },
                    'onQueueComplete': function(queueData) {
                       // window.location.href = 'http://www.baidu.com/';
                       console.log(queueData.uploadsSuccessful + ' files were successfully uploaded.');
                    }

                });
            });
        </script>
    </body>
</html>