<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RS Autowerkplaats</title>

    <link rel="stylesheet" href="src/css/index.css">

    <!-- materialize -->
    <link rel="stylesheet" href="src/lib/materialize/css/materialize.css">
    <script src="src/lib/materialize/js/materialize.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Hover.css -->
    <link rel="stylesheet" href="src/lib/hover/hover-min.css">

    <!-- Google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style="background: #e5e5e5">
    <div class="row">
        <nav class="z-depth-0 header">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">
                    <img src='src/media/logo.svg'>
                </a>
                <ul id="nav-mobile" class="right">
                    <li><span class="company_name flow-text">RS AUTOWERKPLAATS</span></li>
                    <li><a class="btn waves-effect yellow darken-2" style="border-radius: 50%"><i class="material-icons">settings</i></a></li>
                    <li><a class="btn waves-effect yellow darken-2" style="border-radius: 50%"><i class="material-icons">person_pin</i></a></li>
                </ul>
            </div>
        </nav>

        <div class="col s12">
            <div class="container white _container">

                <div class="tab_container">
                    <div class="button_container">
                        <!-- reparatie_tab -->
                        <button class="reparatie_tab" onclick="ShowPanel(0, '#2a1fa2')">
                            <h3 class="tab_text_reparatie flow-text">Reparatie</h3>
                            <div>
                                <svg viewBox="-5 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.535 33.082L23.8779 17.4249C25.4264 13.4676 24.5661 8.82207 21.2971 5.553C17.856 2.11188 12.6943 1.42365 8.56492 3.31627L15.9633 10.7147L10.8017 15.8764L3.23118 8.47795C1.16651 12.6073 2.02679 17.769 5.46791 21.2101C8.73698 24.4792 13.3825 25.3395 17.3398 23.791L32.9969 39.4481C33.6851 40.1363 34.7175 40.1363 35.4057 39.4481L39.363 35.4908C40.2233 34.8025 40.2233 33.5982 39.535 33.082Z" fill="white" />
                                </svg>
                            </div>
                        </button>

                        <!-- wegsleep_tab -->
                        <button class="wegsleep_tab" onclick="ShowPanel(1, '#2a1fa2')">
                            <h3 class="tab_text_wegsleep flow-text">Wegsleep</h3>
                            <div>
                                <svg viewBox="-5 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M34.625 4.625H26.7875C26 2.45 23.9375 0.875 21.5 0.875C19.0625 0.875 17 2.45 16.2125 4.625H8.375C6.3125 4.625 4.625 6.3125 4.625 8.375V34.625C4.625 36.6875 6.3125 38.375 8.375 38.375H34.625C36.6875 38.375 38.375 36.6875 38.375 34.625V8.375C38.375 6.3125 36.6875 4.625 34.625 4.625ZM21.5 4.625C22.5312 4.625 23.375 5.46875 23.375 6.5C23.375 7.53125 22.5312 8.375 21.5 8.375C20.4688 8.375 19.625 7.53125 19.625 6.5C19.625 5.46875 20.4688 4.625 21.5 4.625ZM25.25 30.875H12.125V27.125H25.25V30.875ZM30.875 23.375H12.125V19.625H30.875V23.375ZM30.875 15.875H12.125V12.125H30.875V15.875Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="41.2935" height="41.2935" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </button>

                        <!-- keuring_tab -->
                        <button class="keuring_tab" onclick="ShowPanel(2, '#2a1fa2')">
                            <h3 class="tab_text_keuring flow-text">Keuring</h3>
                            <div>
                                <svg viewBox="-3 5 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M37.1412 11.5256C36.7429 10.3504 35.6274 9.51382 34.3128 9.51382H12.4026C11.088 9.51382 9.99247 10.3504 9.57418 11.5256L5.43115 23.4567V39.3914C5.43115 40.4869 6.32748 41.3833 7.42299 41.3833H9.41483C10.5103 41.3833 11.4067 40.4869 11.4067 39.3914V37.3996H35.3087V39.3914C35.3087 40.4869 36.2051 41.3833 37.3006 41.3833H39.2924C40.3879 41.3833 41.2843 40.4869 41.2843 39.3914V23.4567L37.1412 11.5256ZM12.4026 31.4241C10.7494 31.4241 9.41483 30.0895 9.41483 28.4363C9.41483 26.7831 10.7494 25.4485 12.4026 25.4485C14.0558 25.4485 15.3904 26.7831 15.3904 28.4363C15.3904 30.0895 14.0558 31.4241 12.4026 31.4241ZM34.3128 31.4241C32.6596 31.4241 31.3251 30.0895 31.3251 28.4363C31.3251 26.7831 32.6596 25.4485 34.3128 25.4485C35.9661 25.4485 37.3006 26.7831 37.3006 28.4363C37.3006 30.0895 35.9661 31.4241 34.3128 31.4241ZM9.41483 21.4649L12.4026 12.5016H34.3128L37.3006 21.4649H9.41483Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="47" height="47" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Reparatie tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                        <p class="flow-text">
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                            Reparatie tab content gaat hier
                        </p>
                    </div>

                    <!-- Wegsleep tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                        <p class="flow-text">
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                            Wegsleep tab content gaat hier
                        </p>
                    </div>

                    <!-- Keuring Tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                        <p class="flow-text">
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                            Keuring Tab content gaat hier
                        </p>
                    </div>
                </div>

                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red">
                        <i class="large material-icons">add</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating red tooltipped" data-position="left" data-tooltip="Wegslepen">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.77826 8.23649C7.04354 8.40992 5.7885 8.83905 5.3261 9.07873C4.83074 9.33473 3.84002 10.1766 3.44386 10.6803C2.88258 11.3987 2.83298 11.44 2.42018 11.4976C1.8589 11.5885 1.14882 11.8445 0.834903 12.0838C0.438743 12.3894 0.273623 12.9011 0.331223 13.6358C0.372503 14.1808 0.578903 14.9651 0.719383 15.1219C0.744023 15.1549 1.1901 15.0806 1.69346 14.9568L2.61826 14.7341V14.3459C2.61826 14.1312 2.65954 13.8506 2.70914 13.7184C2.90722 13.1901 3.60898 12.703 4.1869 12.703C4.78146 12.703 5.51618 13.2314 5.64002 13.7434C5.67298 13.8506 5.74722 13.9414 5.82978 13.9331C5.90402 13.9331 7.67106 13.512 9.7597 13.0083L13.5575 12.0755L13.5328 11.7453C13.4832 11.0848 13.9127 10.4243 14.5648 10.1766C15.2912 9.896 16.1501 10.2262 16.4967 10.9114C16.5959 11.1014 16.6784 11.2666 16.6947 11.2829C16.7031 11.2912 17.0663 11.217 17.5037 11.1178L18.3047 10.9443V10.5398C18.3047 9.83808 17.9331 9.2272 17.3139 8.90528C16.5709 8.52544 15.0931 8.48417 13.5575 8.8144L12.8144 8.97121L12.3437 8.77313C10.8 8.12929 9.0829 7.93089 7.77826 8.23649ZM10.4122 8.74848C10.7095 8.83936 11.048 8.99616 11.1719 9.09504L11.3866 9.28513L9.71842 9.68128C8.80194 9.896 8.03426 10.0611 8.0093 10.0362C7.94338 9.96192 7.6461 8.72353 7.68738 8.68224C7.70402 8.6576 7.92674 8.608 8.16642 8.57504C8.78562 8.47585 9.78466 8.55008 10.4122 8.74848ZM7.3821 9.49984C7.47298 9.87968 7.52258 10.1933 7.49762 10.2016C7.46466 10.2182 6.7133 10.408 5.82146 10.631C4.64898 10.9117 4.1869 11.0026 4.1869 10.9283C4.1869 10.7466 4.81442 10.0202 5.22722 9.71456C5.65666 9.40097 6.18498 9.12032 6.65538 8.94688C7.19202 8.74848 7.21698 8.75648 7.3821 9.49984Z" fill="white" />
                                    <path d="M18.8829 10.3914V11.96H18.2224H17.5703L14.5732 14.0653L11.576 16.1706H6.23428H0.884521V17.632V19.1014L2.2714 19.1261C4.75652 19.1674 7.737 19.3654 8.16644 19.5142C8.95909 19.7949 9.66917 20.6784 9.79301 21.5286L9.84261 21.9085L14.8212 21.9331L19.7914 21.9498V19.1014V16.2531H17.0503C14.4909 16.2448 13.4589 16.2202 13.3847 16.1539C13.368 16.1376 14.3754 15.4109 15.6221 14.5357L17.8925 12.9504H18.3879H18.8832V13.6112V14.2717H19.3373H19.7914V11.5472V8.82272H19.3373H18.8832V10.3914H18.8829Z" fill="white" />
                                    <path d="M20.6992 15.3862V21.9498H21.5168H22.3258L22.3754 21.5453C22.4992 20.5296 23.2669 19.696 24.3405 19.4234C25.7853 19.0518 27.288 20.0838 27.5191 21.5949L27.5687 21.9498H29.6243H31.68V21.1654V20.3811H31.2672H30.8544V19.473V18.5648H31.2672H31.68V17.5494V16.5341L30.8461 15.1306C29.7645 13.3309 28.8067 11.927 28.1875 11.2582L27.7005 10.7216H25.7687H23.8448L23.5559 10.2758C23.1101 9.5824 22.433 9.15296 21.4506 8.93824C21.1533 8.88032 20.856 8.82272 20.8067 8.82272C20.7242 8.82272 20.6992 10.1933 20.6992 15.3862ZM28.9802 13.8176C29.7895 15.023 30.4416 16.0221 30.4416 16.0467C30.4416 16.0714 29.4592 16.088 28.2538 16.088H26.0659V13.8589V11.6298H26.7923H27.5271L28.9802 13.8176Z" fill="white" />
                                    <path d="M14.5485 10.4243C13.7725 10.7629 13.5248 11.8112 14.0698 12.4554C14.3587 12.8102 14.6806 12.9507 15.1514 12.9507C15.8944 12.9507 16.4394 12.3811 16.431 11.6214C16.4144 10.6637 15.4317 10.0365 14.5485 10.4243ZM15.4979 10.928C15.985 11.184 16.0675 11.8115 15.6714 12.216C15.3411 12.5462 14.9366 12.5462 14.5731 12.216C14.3501 12.0179 14.3008 11.9187 14.3008 11.6298C14.3008 11.3408 14.3504 11.2416 14.5731 11.0435C14.8704 10.7795 15.1427 10.7462 15.4979 10.928Z" fill="white" />
                                    <path d="M3.69157 13.0416C3.17957 13.2563 2.86597 13.7434 2.86597 14.3376C2.86597 15.0806 3.43557 15.6256 4.19525 15.6173C5.50789 15.601 5.97861 13.9661 4.91365 13.1734C4.65765 12.9837 3.99717 12.9094 3.69157 13.0416ZM4.74021 13.7104C4.99621 13.9498 5.06213 14.3542 4.89701 14.6682C4.73189 14.9821 4.53381 15.0976 4.14565 15.0976C3.49349 15.0976 3.13829 14.3379 3.53477 13.8262C3.86501 13.4048 4.36869 13.3635 4.74021 13.7104Z" fill="white" />
                                    <path d="M6.74624 20.0429C5.82143 20.3402 5.30975 21.0253 5.30975 21.9501C5.30975 23.7088 7.36544 24.559 8.60384 23.3123C9.55328 22.3629 9.31392 20.8189 8.1168 20.1997C7.76192 20.0182 7.05984 19.9357 6.74624 20.0429ZM7.88576 21.24C8.1584 21.496 8.19136 21.5619 8.19136 21.9418C8.19136 22.305 8.1584 22.3958 7.91904 22.6269C7.68768 22.8662 7.59712 22.8992 7.2336 22.8992C6.85376 22.8992 6.78784 22.8662 6.53183 22.5936C5.92095 21.9248 6.35007 20.9754 7.26656 20.959C7.50592 20.9594 7.64608 21.0253 7.88576 21.24Z" fill="white" />
                                    <path d="M24.2989 20.0842C22.8871 20.6125 22.5239 22.495 23.6551 23.4362C25.0173 24.5674 27.0733 23.4528 26.8669 21.7024C26.809 21.2154 26.6605 20.9098 26.3056 20.5632C25.777 20.0429 24.9431 19.8448 24.2989 20.0842ZM25.4055 21.0832C25.8429 21.3142 26.033 21.983 25.7853 22.4288C25.6368 22.7014 25.2404 22.9408 24.9514 22.9408C24.5965 22.9408 24.1754 22.6518 24.0349 22.3216C23.8781 21.9334 23.8861 21.7766 24.1092 21.4464C24.4311 20.9677 24.9181 20.8355 25.4055 21.0832Z" fill="white" />
                                </svg>
                            </a></li>
                        <li><a class="btn-floating blue darken-4 tooltipped" data-position="left" data-tooltip="Keuring"><i class="material-icons">directions_car</i></a></li>
                        <li><a class="btn-floating yellow darken-1 tooltipped" data-position="left" data-tooltip="Reparatie"><i class="material-icons">build</i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <script src="src/js/tabs.js"></script>

    <script>
        M.AutoInit();

        //reparatie tab hover
        $(function() {
            $('.reparatie_tab').hover(function() {
                $('.tab_text_reparatie').css('color', 'white');
            }, function() {
                if ($('.reparatie_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_reparatie').css('color', 'white');
                } else {
                    $('.tab_text_reparatie').css('color', '#676767');
                }
            });
        });

        //wegsleep tab hover
        $(function() {
            $('.wegsleep_tab').hover(function() {
                $('.tab_text_wegsleep').css('color', 'white');
            }, function() {
                if ($('.wegsleep_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_wegsleep').css('color', 'white');
                } else {
                    $('.tab_text_wegsleep').css('color', '#676767');
                }
            });
        });

        //keuring tab hover
        $(function() {
            $('.keuring_tab').hover(function() {
                $('.tab_text_keuring').css('color', 'white');
            }, function() {
                if ($('.keuring_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_keuring').css('color', 'white');
                } else {
                    $('.tab_text_keuring').css('color', '#676767');
                }
            });
        });
    </script>
</body>

</html>