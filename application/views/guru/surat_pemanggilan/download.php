<?php
function translateDayToIndonesian($day) {
    $days = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );

    return $days[$day];
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta name="generator" content="Aspose.Words for .NET 24.4.0" />
        <title>Surat pemanggilan orang tua siswa</title>
        <style type="text/css">body { font-family:'Times New Roman'; font-size:12pt }p { margin:0pt }li { margin-top:0pt; margin-bottom:0pt }.BodyTextIndent { margin-left:50pt; text-indent:-50pt; font-size:12pt }.Footer { font-size:12pt }.Header { font-size:12pt }span.Hyperlink { text-decoration:underline; color:#0000ff; -aw-style-name:hyperlink }</style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    </head>
    <body onload="window.print()">
        <div id="">
            <p style="text-align:center; line-height:150%; font-size:14pt"><img src="<?php echo base_url() . 'assets/kop.png' ?>" width="112" height="112" alt="" style="margin-right:9pt; margin-left:9pt; -aw-left-pos:-72pt; -aw-rel-hpos:margin; -aw-rel-vpos:margin; -aw-top-pos:-71.9pt; -aw-wrap-type:square; float:left; position:relative" /><span style="font-weight:bold">YAYASAN PENDIDIKAN BANI USMAN MANUNGGAL</span></p>
            <p style="text-align:center; line-height:150%; font-size:14pt"><span style="font-weight:bold">SMK BANI USMAN MANUNGGAL</span></p>
            <p style="text-align:center; line-height:150%"><span>Alamat : Jl. Raya Kresek Km. 06 Kp. Tarikolot Rt. 07/03, Kali Asin, Kec. Sukamulya, Kab. Tangerang Prov. Banten</span></p>
            <p style="border-bottom:6.75pt solid #000000; padding-bottom:1pt; -aw-border-bottom:2.25pt thin-thick-thin-medium-gap"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="line-height:150%"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p><span>Nomor</span><span style="width:16pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span>:</span><span style="width:10.47pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span><?php echo $surat->no_surat ?></span><span style="width:261.2pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:325pt">&#xa0;</span><span>Tangerang, <?php echo date('d-m-Y', strtotime($surat->tanggal_surat)) ?></span></p>
            <p><span>Hal</span><span style="width:32.67pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span>: </span><span style="width:7.47pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span>Panggilan Orang Tua Siswa ke Sekolah</span><span style="width:62.25pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:325pt">&#xa0;</span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span>Kepada Yth.</span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span>Bapak/Ibu Orang Tua/Wali Siswa</span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span><?php echo $surat->nama_ortu ?></span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span>Kelas <?php echo $surat->kelas ?></span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span><span>di tempat</span></p>
            <p><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:13.8pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:63.8pt">&#xa0;</span></p>
            <p><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:63.8pt; text-align:justify"><span style="font-style:italic">Assalamualaikum Wr. Wb.</span></p>
            <p class="BodyTextIndent" style="margin-left:63.8pt; text-indent:0pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p class="BodyTextIndent" style="margin-left:63.8pt; text-indent:0pt; text-align:justify"><span>Sehubungan dengan adanya permasalahan yang harus diselesaikan bersama, maka dengan ini kami mengharapkan kehadiran Bapak/Ibu Wali murid pada :</span></p>
            <p style="margin-left:63.8pt; text-indent:-50pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Hari</span><span style="width:42.88pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:127.6pt">&#xa0;</span><span>: </span><span style="width:7.82pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:141.75pt">&#xa0;</span><span><?php echo translateDayToIndonesian(date('D', strtotime($surat->tanggal_pemanggilan)))    ?></span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Tanggal</span><span style="width:24.88pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:127.6pt">&#xa0;</span><span>: </span><span style="width:7.82pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:141.75pt">&#xa0;</span><span><?php echo date('d-m-Y', strtotime($surat->tanggal_pemanggilan)) ?></span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Jam</span><span style="width:44.87pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:127.6pt">&#xa0;</span><span>: </span><span style="width:7.82pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:141.75pt">&#xa0;</span><span><?php echo date('H:i', strtotime($surat->jam_pemanggilan)) ?></span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Tempat</span><span style="width:27.55pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:127.6pt">&#xa0;</span><span>: </span><span style="width:7.82pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:141.75pt">&#xa0;</span><span>Ruang BK SMK BANI USMAN MANUNGGAL</span></p>
            <p style="margin-left:63.8pt; text-indent:-50pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Mengingat pentingnya acara tersebut, kehadiran Bapak/Ibu sangat kami harapkan.</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span>Demikian, terima kasih.</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:63.8pt; text-indent:-0.4pt; text-align:justify"><span style="font-style:italic">Wassalamu’alaikum Wr.Wb.</span></p>
            <p style="margin-left:50pt; text-indent:-50pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:50pt; text-indent:-50pt; text-align:justify"><span style="width:50pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:65pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:115pt">&#xa0;</span><span style="width:210pt; text-indent:0pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:325pt">&#xa0;</span><span>Tangerang, <?php echo date('d-m-Y', strtotime($surat->tanggal_surat)) ?></span></span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:justify"><span style="width:50pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:50pt">&#xa0;</span><span style="width:65pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:115pt">&#xa0;</span><span style="width:210pt; display:inline-block; -aw-tabstop-align:left; -aw-tabstop-pos:325pt">&#xa0;</span><span>Kepala Sekolah</span></p>
            <p style="margin-left:50pt; text-indent:-50pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="margin-left:50pt; text-indent:-50pt; text-align:justify"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span></span></p>
            <p><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span>Yumni Tohir</span></p>
            <p><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span></p>
            <p style="line-height:150%"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p style="line-height:150%"><span style="-aw-import:ignore">&#xa0;</span></p>
            <p><span style="-aw-import:ignore">&#xa0;</span></p>
        </div>
    </body>
</html>