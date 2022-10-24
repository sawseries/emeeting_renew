<html>
    <head>
        <title>ระเบียบวาระการประชุม</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
        <script src="./assets/pdfview/js/pdfjs-viewer.js"></script>
        <link rel="stylesheet" href="./assets/pdfview/css/pdfjs-viewer.css">
        <link href="./assets/css/previewpage.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <script>
            // Let's initialize the PDFjs library
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

            $(document).ready(function () {
                pdfViewer.loadDocument("./storage/<?=$file;?>").then(function () {
                    pdfViewer.setZoom('fit');
                });
            });

        </script>
        <style>
            .pdftoolbar, .pdftoolbar i {
                font-size: 14px;
            }
            .pdftoolbar span {
                margin-right: 0.5em;
                margin-left: 0.5em;
                width: 4em !important;
                font-size: 12px;
            }
            .pdftoolbar .btn-sm {
                padding: 0.12rem 0.25rem;

            }
            .pdftoolbar {
                width: 100%;
                height: auto;
                background: #ddd;
                z-index: 100;
            }

            body {

                background: #F5FFFA;
            }
            
            .navbar_preview{
                background-image: linear-gradient(to right,#6495ed 0%, #36aed0  51%, #6495ed 100%);height:50px;
            }
            
            .navbar_preview a{
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="navbar_preview">
            <a class="navbar-brand" href="./index.php">อุทยานวิทยาศาสตร์ ภาคใต้</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               
            </div>
        </div>

        <div class="container" style="padding-bottom:100px;">
            <div style="padding-top:10px;"></div>
            <div class="row" style="background-color:white;">     
               
                <div style="padding:1em;">
                <a class="nav-link" style="font-size:14pt;" href="./index.php?controller=Master&action=detail&code=<?=$code;?>"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?=$topic;?></a>
                </div>
<!--                <center><h3><?= $top["doctopic_text"]; ?></h3></center><br><br>-->

                <div class="pdftoolbar text-center row m-0 p-0">
                    <div class="col-12 col-lg-6 my-1">
                        <button class="btn btn-secondary btn-sm btn-first" onclick="pdfViewer.first()"><i class="material-icons-outlined">skip_previous</i></button>
                        <button class="btn btn-secondary btn-sm btn-prev" onclick="pdfViewer.prev(); return false;"><i class="material-icons-outlined">navigate_before</i></button>
                        <span class="pageno"></span>
                        <button class="btn btn-secondary btn-sm btn-next" onclick="pdfViewer.next(); return false;"><i class="material-icons-outlined">navigate_next</i></button>
                        <button class="btn btn-secondary btn-sm btn-last" onclick="pdfViewer.last()"><i class="material-icons-outlined">skip_next</i></button>
                    </div>
                    <div class="col-12 col-lg-6 my-1">
                        <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('out')"><i class="material-icons-outlined">zoom_out</i></button>
                        <span class="zoomval">100%</span>
                        <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('in')"><i class="material-icons-outlined">zoom_in</i></button>
                        <button class="btn btn-secondary btn-sm ms-3" onclick="pdfViewer.setZoom('width')"><i class="material-icons-outlined">swap_horiz</i></button>
                        <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('height')"><i class="material-icons-outlined">swap_vert</i></button>
                        <button class="btn btn-secondary btn-sm" onclick="pdfViewer.setZoom('fit')"><i class="material-icons-outlined">fit_screen</i></button>
                    </div>
                </div>
                <div class="pdfjs-viewer" style="height:1500px;overflow-x:auto;"></div>    
            </div>
        </div>
    </body>
    <script>
        let pdfViewer = new PDFjsViewer($('.pdfjs-viewer'), {
            onZoomChange: function (zoom) {

                zoom = parseInt(zoom * 10000) / 100;
                $('.zoomval').text((zoom) + '%');
            },
            onActivePageChanged: function (page, pageno) {
                $('.pageno').text(pageno + '/' + this.getPageCount());
            },
        });

    </script>
</html>




