function test(){
    var canvas = document.getElementById("test");
    var context = canvas.getContext("2d");
    var loadCount = 0;
    var height = 0;
    var srcs = document.getElementsByClassName("img");
    for (let i = 0; i < srcs.length; i++){
        var image = new Image();
        var haikei = new Image();
        var src = srcs[i].getAttribute("src");
        haikei.onload = function(){
            for (var j = 0; j < 17; j++){
                context.drawImage(haikei, 0, height);
                height = height + 10;
            }
            context.drawImage(image, i * 100, i * 100);
        }
        image.src = src;
        haikei.src = "buck_ground/haikei.png";
    }

}