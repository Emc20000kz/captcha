
<html>

<head>
  <meta charset="utf-8">
  <title>Kazu.dev - Funcaptcha Handler</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://roblox-api.funcaptcha.com/fc/api/?onload=loadArkose" async></script>
<script type="text/javascript">
    function loadArkose() {
            var arkose = new ArkoseEnforcement({
                public_key: "476068BF-9607-4799-B53D-966BE98E2B81",
                language: "en",
                target_html: "arkose",
                callback: function() {
                    parent.postMessage(JSON.stringify({
                        eventId: "challenge-complete",
                        payload: {
                            sessionToken: arkose.getSessionToken()
                        }
                    }), "*")
                },
                loaded_callback: function() {
                    frameHeight = document.getElementById("fc-iframe-wrap").offsetHeight;
                    frameWidth = document.getElementById("fc-iframe-wrap").offsetWidth;
                    parent.postMessage(JSON.stringify({
                        eventId: "challenge-loaded",
                        payload: {
                            sessionToken: arkose.getSessionToken(),
                            frameHeight: frameHeight,
                            frameWidth: frameWidth
                        }
                    }), "*")
                },
                onsuppress: function() {
                    parent.postMessage(JSON.stringify({
                        eventId: "challenge-suppressed",
                        payload: {
                            sessionToken: arkose.getSessionToken()
                        }
                    }), "*")
                },
                onshown: function() {
                    parent.postMessage(JSON.stringify({
                        eventId: "challenge-shown",
                        payload: {
                            sessionToken: arkose.getSessionToken()
                        }
                    }), "*");
                }
            });
        }
</script>

</head>

<body style="margin: 0px">
  <div id="arkose">
  </div>
</body>

</html>