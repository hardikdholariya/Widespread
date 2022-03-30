<?php
require_once("./session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="JavaScript image cropper.">

    <meta name="author" content="Chen Fengyuan">
    <title>Cropper.js</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Padauk&family=Passion+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/cropper.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="backgroundB">
        <div class="pop">
            <div class="pop_header">
                <div class="text"> Create new post </div>
                <a href="" class="close"><i class='bx bx-x'></i></a>
            </div>
            <div class="drop">
                <div class="docs-buttons drag">

                    <label class="inputFile" for="inputImage" title="Upload image file">

                        <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*, video/*">
                        <i class='bx bx-cloud-upload'></i>

                    </label>

                </div>
                <h2>Drag photo here</h2>
            </div>

        </div>
    </div>

    <div class="backgroundBc">

        <div class="container-crop">
            <div class="crop_header">
                <div class="text"> Crop </div>
                <a href="" class="crop_close"><i class='bx bx-x'></i></a>
            </div>

            <div class="img-container">
                <img src="" alt="Picture">
            </div>

            <div id="actions">
                <div class=" docs-buttons">
                    <div class="btnGroup">

                        <div class="btnS">
                            <button type="button" class="" data-method="zoom" data-option="0.1" title="Zoom In">
                                <span class="fa fa-search-plus"></span>
                            </button>
                            <button type="button" class="" data-method="zoom" data-option="-0.1" title="Zoom Out">
                                <span class="fa fa-search-minus"></span></button>
                        </div>

                        <div class="btnS">
                            <button type="button" class=" " data-method="rotate" data-option="-45" title="Rotate Left">
                                <span class="fa fa-undo-alt"></span>
                            </button>
                            <button type="button" class="" data-method="rotate" data-option="45" title="Rotate Right">
                                <span class="fa fa-redo-alt"></span>
                            </button>
                        </div>

                        <div class="btnS">
                            <button type="button" class=" " data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                <span class="fa fa-arrows-alt-h"></span>
                            </button>
                            <button type="button" class=" " data-method="scaleY" data-option="-1" title="Flip Vertical">
                                <span class="fa fa-arrows-alt-v"></span>
                            </button>
                        </div>
                    </div>


                    <form method="post" class="crop_comment" id="myForm">

                        <textarea name="caption" placeholder="Write a caption..." id="caption"></textarea>

                        <div class="btnSGreen">
                            <button type="button" class="postCaption" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
                                Share
                            </button>
                        </div>

                    </form>
                </div>

                <div class=" docs-toggles">
                    <div class="ratios" data-toggle="buttons">
                        <label class="ratio" style="border: 0;">
                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">
                            16:9
                        </label>
                        <label class="ratio">
                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">
                            4:3
                            </span>
                        </label>
                        <label class="ratio">
                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">
                            1:1
                            </span>
                        </label>
                        <label class="ratio">
                            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">
                            2:3
                            </span>
                        </label>
                        <label class="ratio">
                            <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN">
                            Free
                            </span>
                        </label>
                    </div>


                </div>
            </div>



        </div>
    </div>


    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="./js/pop.js?v=<?php echo time(); ?>"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/cropper.js"></script>
    <script src="./js/main.js?v=<?php echo time(); ?> "></script>
</body>

</html>