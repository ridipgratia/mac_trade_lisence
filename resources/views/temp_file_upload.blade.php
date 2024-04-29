<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Drag and Drop</title>
<style>
    #drop-area {
        width: 300px;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 20px;
        text-align: center;
        line-height: 200px;
        font-size: 20px;
        margin: 0 auto;
        margin-top: 50px;
    }

    #drop-area.hover {
        border-color: #007bff;
    }
</style>
</head>
<body>

<div id="drop-area">
    Drop files here
</div>

<input type="hidden" id="file-input">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Prevent default drag behaviors
        $(document).on('dragenter', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#drop-area').addClass('hover');
        });

        $(document).on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });

        $(document).on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#drop-area').removeClass('hover');
        });

        $(document).on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#drop-area').removeClass('hover');

            var files = e.originalEvent.dataTransfer.files;

            if (files.length > 0) {
                handleFiles(files);
            }
        });

        function handleFiles(files) {
            var file = files[0];
            $('#file-input').val(file.name);
        }
    });
</script>

</body>
</html>
