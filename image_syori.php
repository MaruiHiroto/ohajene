<?php
    
    function imagewordwrap (int $size, int $angle, string $fontfile, string $text, int $imagewidth, string $break = "\r\n"){
        $chars = mb_str_split($text);
        $lines = [];
        $currentLine = '';
        foreach ($chars as $ch) {
            $wh = getTextSize($size, $angle, $fontfile, $currentLine.$ch);
            if ($wh['width'] > $imagewidth){
                $lines[] = $currentLine;
                $currentLine = $ch;
            } else {
                $currentLine .= $ch;
            }
        }
        $lines[] = $currentLine;

        return implode($break, $lines);
    }

    function getTextSize(int $size, int $angle, string $fontfile, string $text): array
    {
        $boundingBox = imagettfbbox($size, $angle, $fontfile, $text);

        return [
            'width' => $boundingBox[2] - $boundingBox[0],
            'height' => $boundingBox[1] - $boundingBox[7],
        ];
    }

    function mergeImages($save) {
        global $idollist;
        global $idolarticles;
        global $count;
        $haruka = ["face_765/face_haruka/haruka_normal.png",
            "face_765/face_haruka/haruka_ayasimi.png",
            "face_765/face_haruka/haruka_huzake.png",
            "face_765/face_haruka/haruka_tere.png",
            "face_765/face_haruka/haruka_oowarai.png"];
        $chihaya = ["face_765/face_chihaya/chihaya_normal.png",
            "face_765/face_chihaya/chihaya_hukigen.png",
            "face_765/face_chihaya/chihaya_kultu.png",
            "face_765/face_chihaya/chihaya_rage.png",
            "face_765/face_chihaya/chihaya_warai.png"];
        $miki = ["face_765/face_miki/miki_normal.png",
            "face_765/face_miki/miki_iyanano.png",
            "face_765/face_miki/miki_nano.png",
            "face_765/face_miki/miki_nemuino.png",
            "face_765/face_miki/miki_tere.png"];
        $makoto = ["face_765/face_makoto/makoto_normal.png",
            "face_765/face_makoto/makoto_ibukasimi.png",
            "face_765/face_makoto/makoto_tere.png",
            "face_765/face_makoto/makoto_tere2.png",
            "face_765/face_makoto/makoto_yarii.png"];
        $yukiho = ["face_765/face_yukiho/yukiho_normal.png",
            "face_765/face_yukiho/yukiho_egao.png",
            "face_765/face_yukiho/yukiho_kiduki.png",
            "face_765/face_yukiho/yukiho_otikomi.png",
            "face_765/face_yukiho/yukiho_uresii.png"];
        $yayoi = ["face_765/face_yayoi/yayoi_normal.png",
            "face_765/face_yayoi/yayoi_kawaii.png",
            "face_765/face_yayoi/yayoi_odoroki.png",
            "face_765/face_yayoi/yayoi_oowarai.png",
            "face_765/face_yayoi/yayoi_warai.png"];
        $iori = ["face_765/face_iori/iori_normal.png",
            "face_765/face_iori/iori_kurai.png",
            "face_765/face_iori/iori_okori.png",
            "face_765/face_iori/iori_oowarai.png",
            "face_765/face_iori/iori_takabisya.png"];
        $azusa = ["face_765/face_azusa/azusa_normal.png",
            "face_765/face_azusa/azusa_gimon.png",
            "face_765/face_azusa/azusa_otona.png",
            "face_765/face_azusa/azusa_terewarai.png",
            "face_765/face_azusa/azusa_warai.png"];
        $ami = ["face_765/face_ami/ami_normal.png",
            "face_765/face_ami/ami_aogu.png",
            "face_765/face_ami/ami_ibukasimi.png",
            "face_765/face_ami/ami_oowarai.png",
            "face_765/face_ami/ami_tere.png"];
        $ritsuko = ["face_765/face_ritsuko/ritsuko_normal.png",
            "face_765/face_ritsuko/ritsuko_ankokubisyou.png",
            "face_765/face_ritsuko/ritsuko_gimon.png",
            "face_765/face_ritsuko/ritsuko_odoroki.png",
            "face_765/face_ritsuko/ritsuko_yaruki.png"];
        $takane = ["face_765/face_takane/takane_normal.png",
            "face_765/face_takane/takane_harapeko.png",
            "face_765/face_takane/takane_hungai.png",
            "face_765/face_takane/takane_odoroki.png",
            "face_765/face_takane/takane_uresii.png"];
        $hibiki = ["face_765/face_hibiki/hibiki_normal.png",
            "face_765/face_hibiki/hibiki_kurai.png",
            "face_765/face_hibiki/hibiki_oowarai.png",
            "face_765/face_hibiki/hibiki_tere.png",
            "face_765/face_hibiki/hibiki_warai.png"];
        $mami = ["face_765/face_mami/mami_normal.png",
            "face_765/face_mami/maim_itadura.png",
            "face_765/face_mami/mami_komari.png",
            "face_765/face_mami/mami_odoroki.png",
            "face_765/face_mami/mami_warai.png"];

        $hyoujou_count = 0;
        $hyoujou_list = file(__DIR__ . '/hyoujou.txt', FILE_IGNORE_NEW_LINES);
        $idollist = file(__DIR__ . '/idol.txt', FILE_IGNORE_NEW_LINES);
        $idolarticles = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);
        
        foreach($idollist as $idol){
            if ($idol == 'haruka'){
                $idollist_a[] = $haruka[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'chihaya'){
                $idollist_a[] = $chihaya[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'miki'){
                $idollist_a[] = $miki[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'makoto'){
                $idollist_a[] = $makoto[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'yukiho'){
                $idollist_a[] = $yukiho[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'yayoi'){
                $idollist_a[] = $yayoi[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'iori'){
                $idollist_a[] = $iori[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'azusa'){
                $idollist_a[] = $azusa[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'ami'){
                $idollist_a[] = $ami[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'ritsuko'){
                $idollist_a[] = $ritsuko[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'takane'){
                $idollist_a[] = $takane[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'hibiki'){
                $idollist_a[] = $hibiki[$hyoujou_list[$hyoujou_count]-1];
            }
            if ($idol == 'mami'){
                $idollist_a[] = $mami[$hyoujou_list[$hyoujou_count]-1];
            }
            $hyoujou_count++;
        }
        $count = count($idollist) * 17;
        $count_i = count($idollist);
        $total_w = 0;
        $total_h = 0;
            for ($i = 0; $i < $count; $i++){
                list($w, $h) = getimagesize($save);
                $total_h += $h;
                if ($w > $total_w) {
                    $total_w = $w;
                }
            }
        
        global $result_im;
        $result_im = imagecreatetruecolor($total_w, $total_h);
        $merged_img_h_sum = 0;
        for ($i = 0; $i < $count; $i++){
            $img = imagecreatefrompng($save);
            list($width, $height) = getimagesize($save);
            
            imagecopy(
                $result_im,
                $img,
                0,
                $merged_img_h_sum,
                0,
                0,
                $width,
                $height);
            imagedestroy($img);
            $merged_img_h_sum += $height;
        }
        $merged_img_h_sum = 10;
        for ($i = 0; $i < $count_i; $i++){
            $hukidashi_u = "buck_ground/hukidashi.png";
            $hukidashi = imagecreatefrompng($hukidashi_u);
            list($wid, $hei) = getimagesize($hukidashi_u);
            imagecopy($result_im, $hukidashi, 173, $merged_img_h_sum, 0, 0, $wid, $hei);
            $merged_img_h_sum = $merged_img_h_sum + $hei + 18;
        }
        $h_sum = 10;
        foreach ($idollist_a as $face_path){
            $face = imagecreatefrompng($face_path);
            list($wi, $hei) = getimagesize($face_path);
            imagecopy(
                $result_im,
                $face, 10,
                $h_sum,
                0,
                0,
                $wi,
                $hei);
            $h_sum = $h_sum + $hei + 18;
        }
        $y = 72;
        foreach($idolarticles as $idolarticle) {
            $text = $idolarticle;
            $fontfile = "C:\Windows\Fonts\meiryob.ttc";
            $color = imagecolorallocate($result_im, 0, 0, 0);
            $size =19;
            $angle = 0;
            $image_width = 430;
            $x = 182;
            $text_i = imagewordwrap($size, $angle, $fontfile, $text, $image_width);
            $textWH = getTextSize($size, $angle, $fontfile, $text_i);
            imagettftext(
                $result_im,
                $size,
                $angle,
                $x,
                $y,
                $color,
                $fontfile,
                $text_i
            );
            $y += 170;
        }
        $y = 42;
        foreach($idollist as $idol_face){
            if ($idol_face == "haruka"){
                $idolname = "天海春香";
            }
            if ($idol_face == "chihaya"){
                $idolname = "如月千早";
            }
            if ($idol_face == "miki"){
                $idolname = "星井美希";
            }
            if ($idol_face == "yukiho"){
                $idolname = "萩原雪歩";
            }
            if ($idol_face == "makoto"){
                $idolname = "菊地真";
            }
            if ($idol_face == "azusa"){
                $idolname = "三浦あずさ";
            }
            if ($idol_face == "ritsuko"){
                $idolname = "秋月律子";
            }
            if ($idol_face == "ami"){
                $idolname = "双海亜美";
            }
            if ($idol_face == "iori"){
                $idolname = "水瀬伊織";
            }
            if ($idol_face == "mami"){
                $idolname = "双海真美";
            }
            if ($idol_face == "takane"){
                $idolname = "四条貴音";
            }
            if ($idol_face == "hibiki"){
                $idolname = "我那覇響";
            }
            if ($idol_face == "yayoi"){
                $idolname = "高槻やよい";
            }
            $fontfile = "C:\Windows\Fonts\meiryob.ttc";
            $color = imagecolorallocate($result_im, 243, 50, 129);
            $size =19;
            $angle = 0;
            $x = 182;
            imagettftext(
                $result_im,
                $size,
                $angle,
                $x,
                $y,
                $color,
                $fontfile,
                $idolname
            );
            $y += 170;
        }
    }

    $save = 'buck_ground/haikei.png';
    mergeImages($save);

    global $plt_path;
    $plt_path = 'ichizisouko/plt_im.png';

    imagepng($result_im, $plt_path);
    require_once 'chihaya.php';
?>

