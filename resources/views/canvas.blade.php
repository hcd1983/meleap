<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div id="wrap">
    <canvas id="ptn"></canvas>
    <canvas id="canvas" width="1500" height="800" style="border:1px solid #d3d3d3;">
        Your browser does not support the HTML5 canvas tag.
    </canvas>
</div>

{{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
<script src="{{URL::asset('js/app.js')}}"></script>
<script>
    function renderCanvasBg(){
        const patternCanvas =  document.getElementById("ptn");
        const patternContext = patternCanvas.getContext('2d');
        // Give the pattern a width and height of 50
        patternCanvas.width = 131;
        patternCanvas.height = 110;

// Give the pattern a background color and draw an arc


        // patternContext.fillStyle = "#1b1e2d";
        // patternContext.fillRect(0,0, patternCanvas.width,patternCanvas.height);

        // patternContext.shadowOffsetX = 20;
        // patternContext.shadowOffsetY = 0;
        patternContext.shadowBlur = 2;
        patternContext.shadowColor = "#41a5dd";

        patternContext.strokeStyle = "#41a5dd";
        patternContext.lineWidth   = 1;
        patternContext.strokeRect(30,0, patternCanvas.width,patternCanvas.height);



        patternContext.stroke();
        // Create our primary canvas and fill it with the pattern
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext('2d');
        const pattern = ctx.createPattern(patternCanvas, 'repeat');

        let offsetX = 0;
        let offsetY = -90;
        ctx.fillStyle = pattern;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

// Add our primary canvas to the webpage
        document.body.appendChild(canvas);

    }
    renderCanvasBg()
</script>
</body>
</html>
