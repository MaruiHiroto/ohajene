function LinkClick(param){
    var elem = document.getElementById("face");
    var id = "image_" + param;
    var element = document.getElementById(id);
    var src = element.getAttribute("src");
    elem.setAttribute("src", src)
    return 0;
}

function idol_select(number){
    var name = document.getElementsByClassName("face_select");
    var elem = document.getElementById("face");
    let text = document.getElementById("name");
    switch(number){
        case 0:
            var haruka = ["normal", "huzake", "ayasimi", "oowarai", "tere"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_haruka/haruka_" + haruka[i] +".png";
            }
            elem.src = "face_765/face_haruka/haruka_normal.png";
            text.textContent = "天海春香";
        break;
        case 1:
            var chihaya = ["normal", "warai", "kultu", "hukigen", "rage"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_chihaya/chihaya_" + chihaya[i] +".png";
            }
            elem.src = "face_765/face_chihaya/chihaya_normal.png"
            text.textContent = "如月千早";
            break;
        case 2:
            var miki = ["normal", "iyanano", "nano", "nemuino", "tere"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_miki/miki_" + miki[i] +".png";
            }
            elem.src = "face_765/face_miki/miki_normal.png"
            text.textContent = "星井美希";
            break;
        case 3:
            var yukiho = ["normal", "egao", "kiduki", "otikomi", "uresii"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_yukiho/yukiho_" + yukiho[i] +".png";
            }
            elem.src = "face_765/face_yukiho/yukiho_normal.png"
            text.textContent = "萩原雪歩";
            break;
        case 4:
            var yayoi = ["normal", "kawaii", "odoroki", "oowarai", "warai"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_yayoi/yayoi_" + yayoi[i] +".png";
            }
            elem.src = "face_765/face_yayoi/yayoi_normal.png"
            text.textContent = "高槻やよい";
            break;
        case 5:
            var makoto = ["normal", "ibukasimi", "tere", "tere2", "yarii"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_makoto/makoto_" + makoto[i] +".png";
            }
            elem.src = "face_765/face_makoto/makoto_normal.png"
            text.textContent = "菊地真";
            break;
        case 6:
            var iori = ["normal", "kurai", "okori", "oowarai", "takabisya"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_iori/iori_" + iori[i] +".png";
            }
            elem.src = "face_765/face_iori/iori_normal.png"
            text.textContent = "水瀬伊織";
            break;
        case 7:
            var takane = ["normal", "harapeko", "hungai", "odoroki", "uresii"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_takane/takane_" + takane[i] +".png";
            }
            elem.src = "face_765/face_takane/takane_normal.png"
            text.textContent = "四条貴音";
            break;
        case 8:
            var ritsuko = ["normal", "ankokubisyou", "gimon", "odoroki", "yaruki"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_ritsuko/ritsuko_" + ritsuko[i] +".png";
            }
            elem.src = "face_765/face_ritsuko/ritsuko_normal.png"
            text.textContent = "秋月律子";
            break;
        case 9:
            var azusa = ["normal", "gimon", "otona", "terewarai", "warai"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_azusa/azusa_" + azusa[i] +".png";
            }
            elem.src = "face_765/face_azusa/azusa_normal.png"
            text.textContent = "三浦あずさ";
            break;
        case 10:
            var mami = ["normal", "itadura", "komari", "odoroki", "warai"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_mami/mami_" + mami[i] +".png";
            }
            elem.src = "face_765/face_mami/mami_normal.png"
            text.textContent = "双海真美";
            break;
        case 11:
            var ami = ["normal", "aogu", "ibukasimi", "oowarai", "tere"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_ami/ami_" + ami[i] +".png";
            }
            elem.src = "face_765/face_ami/ami_normal.png"
            text.textContent = "双海亜美";
            break;
        case 12:
            var hibiki = ["normal", "kurai", "oowarai", "tere", "warai"];
            for(var i=0; i<5; i++){
                name[i].src = "face_765/face_hibiki/hibiki_" + hibiki[i] +".png";
            }
            elem.src = "face_765/face_hibiki/hibiki_normal.png"
            text.textContent = "我那覇響";
            break;
    }
    return 0;
}

function tsuika(){
/*var canvas = document.getElementById("kanseihin");
var canvas_height = Number(canvas.getAttribute("height"));
var context = canvas.getContext('2d'); 
var names = document.getElementsByClassName("idol_name");
var inputValues = document.getElementsByClassName("preview").textContent;
var srcs = document.getElementsByClassName("fae");

canvas_height = canvas_height + 170;
canvas.setAttribute("height", canvas_height);

var imgs = [];
for(var i = 0; i < names.length - 1; i++){
    imgs[i] = new Image();
    var haikei = new Image();
    var fukidashi = new Image();
    haikei.onload = function onImageLord() {
        var height = 170 * i;
        for (var k = 0; k < 17; k++){
            context.drawImage(haikei, 0, height);
            height = height + 10;
        }
        context.fillStyle = "#f33281";
        context.font = "bold 28px Arial";

        if(inputValues[i+1] != null){
            var len = inputValues[i+1].length;
            var strArray = [];
            var tmp = "";
            var j = 0;

            for (j = 0; j < len; j++){
                var c = inputValues[i+1].charAt(j);
                if(context.measureText(tmp + c).width <= 440){
                    tmp += c;
                }else{
                    strArray.push(tmp);
                    tmp = c;
                }
            }
            if(tmp.length > 0){
                strArray.push(tmp);
            }
        }
        context.drawImage(imgs[i+1], 10, 8 + height);
        context.drawImage(fukidashi, 175, 8 + height);
        context.fillText(names[i+1].textContent, 185, 43 + height);
        context.fillStyle = "#000000";
        var n = strArray.length;
        for(var l = 0; l < n; l++){
            context.fillText(strArray[l], 185, 74 + height + 40 * i);
        }
    }
    
    imgs[i].src = srcs[i+1];
    haikei.src = "buck_ground/haikei.png";
    fukidashi.src = "buck_ground/hukidashi.png";*/



    let ta = document.getElementById("serif");
    ta.value = "";


    const parent = document.getElementById("scenario");

    let div_1 = document.createElement("div");
    div_1.className = "section";
    parent.appendChild(div_1);

    const section = document.getElementsByClassName("section");

    let div_2 = document.createElement("div");
    div_2.className = "relative";
    section[section.length - 1].appendChild(div_2);

    var elem = document.getElementById("face");
    var src = elem.getAttribute("src");

    let img_face = document.createElement("img");
    img_face.className = "fae";
    img_face.src = src;

    const relative = document.getElementsByClassName("relative");
    relative[relative.length - 1].appendChild(img_face);

    var fukidasi = document.createElement("div");
    fukidasi.className = "fukidasi";
    relative[relative.length - 1].appendChild(fukidasi);

    var idol_name = document.createElement("p");
    idol_name.className = "idol_name";
    var idol_name1 = document.getElementById("name").textContent;
    idol_name.textContent = idol_name1;

    const div_fukidasi = document.getElementsByClassName("fukidasi");
    div_fukidasi[div_fukidasi.length - 1].appendChild(idol_name);

    var serif_p = document.createElement("p");
    serif_p.textContent = document.getElementById("preview").textContent;
    serif_p.className = "preview";
    div_fukidasi[div_fukidasi.length - 1].appendChild(serif_p);

    document.getElementById("preview").innerHTML = "";



    var canvas = document.getElementById("kanseihin");
    var context = canvas.getContext("2d");
    var canvas_height = Number(canvas.getAttribute("height"));
    var names = document.getElementsByClassName("idol_name");
    var inputValues = document.getElementsByClassName("preview").textContent;
    var srcs = document.getElementsByClassName("fae");
    canvas_height = canvas_height + 170;
    var height = 0;
    canvas.setAttribute("height", canvas_height);
    var fukidashi = [];
    var fukidashi_src = "buck_ground/hukidashi.png";
    var haikei_src = "buck_ground/haikei.png";

    

    var haikei = new Image();
    haikei.src = haikei_src;
    haikei.onload = function(){
    for (var i = 0; i < srcs.length - 1; i++){
        for (var j = 0; j < 17; j++){
            context.drawImage(haikei, 0, height);
            height = height + 10;
            }
        }
    }
    

    var src = [];
    for (var i = 0; i < srcs.length - 1; i++){
        src[i] = srcs[i+1].getAttribute("src");
    }

    var faces = [];
    
    for (var i in src){
        faces[i] = new Image();
        faces[i].src = src[i];
    }

    var k = 0;
    var loadedCount = 1;
    for (var i in faces){
        faces[i].addEventListener('load', function() {
            if (loadedCount == faces.length){
                for (var j in faces){
                    context.drawImage(faces[j], 8, 170 * k + 8);
                    k += 1;
                }
            }
            loadedCount += 1
        },false);
    }

    var name_list = [];
    for (var i = 0; i < names.length - 1; i++){
        name_list[i] = names[i+1].textContent;
    }

    var fukidashi = new Image();
    fukidashi.src = fukidashi_src;

    context.lineWidth = 12;
    
    context.font = "bold 28px Arial";
    count = 0;
    fukidashi.onload = function(){
        for (var i = 0; i < name_list.length; i++){
            context.fillStyle = "#f33281";
            context.drawImage(fukidashi, 175, 170 * i + 8);
            context.fillText(name_list[i], 185, 43 + 170 * i);
            context.fillStyle = "#000000";
        }
    }
}

function inputCheck() {
    var inputValue = document.getElementById("serif").value;
    document.getElementById("preview").innerHTML = inputValue;
}