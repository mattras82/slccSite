<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Styles Test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <style>
            html, body {
                margin: 0;
                height: 100%;
                width: 100%;
            }
            h4 {
                display: none;
            }
            .wrapper {
                width: 100%;
                height: 5em;
                background-color: #666666;
                display: table;
            }
            nav {
                float: right;
                display: table-cell;
            }
            #menuParent {
                list-style-type: none;
                padding-top: 1em;
                padding-right: 1em;
            }
            .parent {
                display: inline;
                float: left;
            }
            .child {
                display: none;
            }
            .parent a:link, a:visited {
                display: block;
                font-weight: bold;
                color: #FFFFFF;
                text-align: center;
                height: 1.65em;
                background-color: aquamarine;
                font-size: 1.25em;
                text-decoration: none;
                text-transform: uppercase;
                padding: .25em;
            }
            .parent a:hover, a:active {
                color: #999999;
            }
            .parent a:hover, a:active ~ .child {
                display: inline-table;
            }
            @media all and (min-width: 400px) and (max-width: 699px) {
                h1 {
                    float: left;
                    color: #444;
                }
                #small {
                    display: inline;
                }
            }
            @media all and (min-width: 700px) and (max-width: 999px){
                h1 {
                    display: table-cell;
                    color: #cc0033;
                }
                #medium {
                    display: inline;
                }
            }
            @media all and (min-width: 1000px) {
                h1 {
                    margin: auto;
                    color: #0000ff;
                    max-width: 200px;
                    display: table-cell;
                }
                #large {
                    display: inline;
                }
            }
        </style>
    </head>
    <body>
        <div class="wrapper head">
            <h1>Website</h1>
            <nav>
                <ul id="menuParent">
                    <li class="parent"><a href=#>First</a></li>
                    <li class="parent"><a href=#>Second</a>
                        <ul class="child">
                            <li class="chitem"><a href="#">One</a></li>
                            <li class="chitem"><a href="#">Two</a></li>
                            <li class="chitem"><a href="#">Three</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href=#>Third</a></li>
                    <li class="parent"><a href=#>Fourth</a></li>
                </ul>
            </nav>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
