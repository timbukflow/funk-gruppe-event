<div id="optoutbanner99">
    <p>Wir verwenden Cookies für ein besseres Online-Erlebnis. </p>
    <a id="acceptga" onclick="accept()">akzeptieren</a>
</div>

<script src="js/vendor/modernizr-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<script>
    var gaProperty = 'UA-142487628-7';
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) {
        window[disableStr] = true;
        document.getElementById("optoutbanner99").remove();
    }
    function accept() {
        expiry = new Date('July 1, 2099');
        document.cookie = "accepted=yes, i accept google analytics; expires=" + expiry.toGMTString();
        document.getElementById('optoutbanner99').remove();
    }
    if (document.cookie.indexOf("accepted=") >= 0) {
        document.getElementById('optoutbanner99').remove();
    }
</script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-142487628-7', 'auto');
ga('set', 'anonymizeIp', true);
ga('send', 'pageview');
</script>
