<?php

$message = '';

$messageClass = '';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if the file was uploaded without errors

    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

        // Define the maximum file size (20 MB)

        $maxFileSize = 20 * 1024 * 1024;



        // Check the file size

        if ($_FILES['file']['size'] <= $maxFileSize) {

            // Define the target directory and file path

            $targetDirectory = '/var/www/html/';

            $targetFilePath = $targetDirectory . basename($_FILES['file']['name']);



            // Move the uploaded file to the target directory

            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

                $message = "The file " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded to " . $targetFilePath;

                $messageClass = 'success';

            } else {

                $message = "Sorry, there was an error moving your file.";

                $messageClass = 'error';

            }

        } else {

            $message = "Sorry, your file is too large. Maximum allowed size is 20 MB.";

            $messageClass = 'error';

        }

    } else {

        $message = "Sorry, there was an error uploading your file.";

        $messageClass = 'error';

    }

}



?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>File Upload</title>

    <style>

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        body {

            font-family: "Inter", sans-serif;

        }

        .formbold-mb-5 {

            margin-bottom: 20px;

        }

        .formbold-main-wrapper {

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 48px;

        }

        .formbold-form-wrapper {

            margin: 0 auto;

            max-width: 550px;

            width: 100%;

            background: white;

        }

        .formbold-form-label {

            display: block;

            font-weight: 500;

            font-size: 16px;

            color: #07074d;

            margin-bottom: 12px;

        }

        .formbold-form-label-2 {

            font-weight: 600;

            font-size: 20px;

            margin-bottom: 20px;

        }

        .formbold-form-input {

            width: 100%;

            padding: 12px 24px;

            border-radius: 6px;

            border: 1px solid #e0e0e0;

            background: white;

            font-weight: 500;

            font-size: 16px;

            color: #6b7280;

            outline: none;

            resize: none;

        }

        .formbold-form-input:focus {

            border-color: #6a64f1;

            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);

        }

        .formbold-btn {

            text-align: center;

            font-size: 16px;

            border-radius: 6px;

            padding: 14px 32px;

            border: none;

            font-weight: 600;

            background-color: #6a64f1;

            color: white;

            cursor: pointer;

        }

        .formbold-btn:hover {

            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);

        }

        .flex {

            display: flex;

        }

        .flex-wrap {

            flex-wrap: wrap;

        }

        .w-full {

            width: 100%;

        }

        .formbold-file-input {

            position: relative;

        }

        .formbold-file-input input {

            opacity: 0;

            position: absolute;

            width: 100%;

            height: 100%;

            cursor: pointer;

        }

        .formbold-file-input label {

            border: 1px dashed #e0e0e0;

            border-radius: 6px;

            min-height: 200px;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 48px;

            text-align: center;

            cursor: pointer;

        }

        .formbold-drop-file {

            display: block;

            font-weight: 600;

            color: #07074d;

            font-size: 20px;

            margin-bottom: 8px;

        }

        .formbold-or {

            font-weight: 500;

            font-size: 16px;

            color: #6b7280;

            display: block;

            margin-bottom: 8px;

        }

        .formbold-browse {

            font-weight: 500;

            font-size: 16px;

            color: #07074d;

            display: inline-block;

            padding: 8px 28px;

            border: 1px solid #e0e0e0;

            border-radius: 4px;

        }

        @media (min-width: 540px) {

            .sm\:w-half {

                width: 50%;

            }

        }

        .message-box {

            margin-top: 20px;

            padding: 10px;

            border-radius: 6px;

            font-size: 16px;

        }

        .message-box.success {

            background-color: #d4edda;

            color: #155724;

            border: 1px solid #c3e6cb;

        }

        .message-box.error {

            background-color: #f8d7da;

            color: #721c24;

            border: 1px solid #f5c6cb;

        }

    </style>

</head>

<body>

    <div class="formbold-main-wrapper">

        <div class="formbold-form-wrapper">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-6 pt-4">

                    <label class="formbold-form-label formbold-form-label-2">

                        Exfiltrate File

                    </label>



                    <div class="formbold-mb-5 formbold-file-input">

                        <input type="file" name="file" id="file" onchange="displayFileName()" />

                        <label for="file">

                            <div>

                                <span id="file-name" class="formbold-drop-file">Drop files here</span>

                                <span id="or-text" class="formbold-or">Or</span>

                                <span id="browse-text" class="formbold-browse">Browse</span>

                            </div>

                        </label>

                    </div>

                    <div>

                        <button type="submit" class="formbold-btn w-full">Send File</button>

                    </div>

                </div>

            </form>

            <?php if ($message): ?>

                <div class="message-box <?php echo $messageClass; ?>">

                    <?php echo $message; ?>

                </div>

            <?php endif; ?>

        </div>

    </div>



    <script>

        function displayFileName() {

            var input = document.getElementById('file');

            var fileName = input.files[0].name;

            document.getElementById('file-name').textContent = fileName;

            document.getElementById('or-text').style.display = 'none';

            document.getElementById('browse-text').textContent = 'Browse some other file';

        }

    </script>

</body>

</html>

