<div id="divQCRight" class="d-none d-lg-block" style="display: none; position: absolute; top: 0px">
    <a href="http://www.chiase69.com">
        <img src="http://3.bp.blogspot.com/-DFWCRf2oANg/UmDs8ZxWtiI/AAAAAAAAFC0/0Ecu36I5MgI/s1600/fptarena1.png" width="100" />
    </a>
</div>
<div id="divQCLeft" class="d-none d-lg-block" style="display: none; position: absolute; top: 0px">
    <a href="www.chiase69.com">
        <img src="http://3.bp.blogspot.com/-DFWCRf2oANg/UmDs8ZxWtiI/AAAAAAAAFC0/0Ecu36I5MgI/s1600/fptarena1.png" width="100" />
    </a>
</div>
<script type='text/javascript'>
    function floatTopDiv()
    {
        console.log(document.body.clientWidth);
        startLX = ((document.body.clientWidth - MainContentW)/2) - LeftBannerW - LeftQCjust;
        console.log('startLX: ' + startLX);
        startLY = TopQCjust;
        startRX = ((document.body.clientWidth - MainContentW)/2) + MainContentW + RightQCjust;
        startRY = TopQCjust;

        function m1(id)
        {
            var d = document;
            var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
            e2.sP=function(x,y){
                this.style.left=x + 'px';
                this.style.top=y + 'px';
            };
            if (id == "divQCRight") {
                e2.x = startRX;
                e2.y = startRY;
            } else {
                e2.x = startLX;
                e2.y = startLY;
            }
            return e2;
        }
        window.stayTopLeft = function()
        {
            if (document.documentElement && document.documentElement.scrollTop)
                var pY =  document.documentElement.scrollTop;
            else if (document.body)
                var pY =  document.body.scrollTop;
            if (document.body.scrollTop > 30){
                startLY = 3;
                startRY = 3;
            } else  {
                startLY = TopQCjust;
                startRY = TopQCjust;
            }
            ftlObj.y += (pY+startRY-ftlObj.y)/16;
            ftlObj.sP(ftlObj.x, ftlObj.y);
            ftlObj2.y += (pY+startLY-ftlObj2.y)/16;
            ftlObj2.sP(ftlObj2.x, ftlObj2.y);
            setTimeout("stayTopLeft()", 1);
        }
        ftlObj = m1("divQCRight");
        ftlObj2 = m1("divQCLeft");
        stayTopLeft();
    }
    function showBannerDiv()
    {
        var objQCDivRight = document.getElementById("divQCRight");
        var objQCDivLeft = document.getElementById("divQCLeft");
        if (document.body.clientWidth < 1000)
        {
            objQCDivRight.style.display = "none";
            objQCDivLeft.style.display = "none";
        }
        else
        {
            objQCDivRight.style.display = "block";
            objQCDivLeft.style.display = "block";
            floatTopDiv();
        }
    }
    document.write("<script type='text/javascript' language='javascript'>MainContentW = 1100;LeftBannerW = 100;RightBannerW = 100;LeftQCjust = 10;RightQCjust = 10;TopQCjust = 30;showBannerDiv();window.onresize=showBannerDiv;<\/script>");
</script>