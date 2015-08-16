<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>mcShop installer</title>
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.indigo-pink.min.css">
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>
            body {
                background-color: #00bcd4;
            }
            .center .parent {
                position: relative;
            }

            .center .child {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .card-wide.mdl-card {
                width: 512px;
            }
            .card-wide > .mdl-card__title {
                color: #fff;
                height: 176px;
                background: url('images/bg.png') center / cover;
            }
            .card-wide > .mdl-card__menu {
                color: #fff;
            }
            .inputfield {
                margin-top: -10px;
                margin-bottom: -10px;
            }
            .mdl-card__actions {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="center parent">
            <div id="step0" class="center child">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Welcome</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        This wizard will help you install mcShop on your server.<br>Click next to continue.
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a onclick="nextstep()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Next
                        </a>
                    </div>
                </div>
            </div>
            <div id="step1" class="center child" style="display: none;">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Step 1 - MySQL settings</h2>
                    </div>
                    <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate progress-demo" id="loading1" style="display: none; width: 100%; margin-bottom: -4px;"></div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="mysqlhost" />
                            <label class="mdl-textfield__label" for="sample1">MySQL Host</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="mysqluser" />
                            <label class="mdl-textfield__label" for="sample1">MySQL User</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="mysqlpass" />
                            <label class="mdl-textfield__label" for="sample1">MySQL Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="mysqlname" />
                            <label class="mdl-textfield__label" for="sample1">MySQL Database Name</label>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a id="step1next" onclick="checkmysql()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Next
                        </a>
                    </div>
                </div>
            </div>
            <div id="step2" class="center child" style="display: none;">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Step 2 - General settings</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="appname" value="A Minecraft Server" />
                            <label class="mdl-textfield__label" for="appname">App name</label>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a onclick="nextstep()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Next
                        </a>
                    </div>
                </div>
            </div>
            <div id="step3" class="center child" style="display: none;">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Step 3 - TMTopup settings</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="uid" value="12345" />
                            <label class="mdl-textfield__label" for="appname">TMTopup UID</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label inputfield">
                            <input class="mdl-textfield__input" type="text" id="passkey" value="PASSKEY_HERE" />
                            <label class="mdl-textfield__label" for="appname">TMTopup Passkey</label>
                        </div>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a onclick="downloadFiles()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Install
                        </a>
                    </div>
                </div>
            </div>
            <div id="step4" class="center child" style="display: none;">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Step 4 - Installation</h2>
                    </div>
                    <div class="mdl-progress mdl-js-progress mdl-progress__indeterminate progress-demo" style="width: 100%;"></div>
                    <div id="statustext" class="mdl-card__supporting-text">
                        Preparing files...
                    </div>
                </div>
            </div>
            <div id="step5" class="center child" style="display: none;">
                <div class="mdl-card mdl-shadow--2dp card-wide">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Installation complete</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>
                            Click finish to start using mcShop.
                        </p>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a onclick="reloadPage()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Finish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        var currentstep = 0;
        var host;
        var user;
        var pass;
        var name;
        var appname;
        var uid;
        var passkey;

        function nextstep() {
            $('#step'+currentstep).fadeOut(300);
            currentstep = currentstep + 1;
            setTimeout(function() {
                $('#step'+currentstep).fadeIn(300);
            }, 400);
        }

        function checkmysql() {
            $('#mysqlhost').attr('disabled', true);
            $('#mysqluser').attr('disabled', true);
            $('#mysqlpass').attr('disabled', true);
            $('#mysqlname').attr('disabled', true);
            $('#step1next').attr('disabled', true);
            $('#loading1').css('display', 'block');

            host = $('#mysqlhost').val();
            user = $('#mysqluser').val();
            pass = $('#mysqlpass').val();
            name = $('#mysqlname').val();

            $.post("checkmysql.php", {
                    host: host,
                    user: user,
                    pass: pass,
                    name: name
                },
                function(result){
                    if(result == 'success') {
                        nextstep();
                    } else {
                        $('#mysqlhost').attr('disabled', false).val("").parent().removeClass("is-dirty");
                        $('#mysqluser').attr('disabled', false).val("").parent().removeClass("is-dirty");
                        $('#mysqlpass').attr('disabled', false).val("").parent().removeClass("is-dirty");
                        $('#mysqlname').attr('disabled', false).val("").parent().removeClass("is-dirty");
                        $('#step1next').attr('disabled', false);
                        $('#loading1').css('display', 'none');
                    }
                });
        }

        function downloadFiles() {
            appname = $('#appname').val();
            uid = $('#uid').val();
            passkey = $('#passkey').val();
            nextstep();
            $.post("downloadfiles.php", {},
                function(result){
                    if(result == 'ok') {
                        applySettings();
                    } else {
                        alert(result);
                    }
                });
        }

        function applySettings() {
            $('#statustext').html("Applying settings...");
            $.post("applysettings.php", {
                host: host,
                user: user,
                pass: pass,
                name: name,
                appname: appname,
                uid: uid,
                passkey: passkey
            },
                function(result){
                    clean();
                });
        }

        function clean() {
            $('#statustext').html("Finishing installation...");
            $.post("clean.php", {},
                function(result){
                    nextstep();
                });
        }

        function reloadPage() {
            location.reload();
        }
    </script>
</html>
