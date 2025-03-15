<?php
/*
 *  Copyright (C) 2018 Laksamadi Guko.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
session_start();
// Set zona waktu
date_default_timezone_set('Asia/Makassar');

// Array nama hari dan bulan dalam bahasa Indonesia
$hari_indonesia = array(
    "Sunday" => "Minggu",
    "Monday" => "Senin",
    "Tuesday" => "Selasa",
    "Wednesday" => "Rabu",
    "Thursday" => "Kamis",
    "Friday" => "Jumat",
    "Saturday" => "Sabtu"
);
$bulan_indonesia = array(
    "January" => "Januari",
    "February" => "Februari",
    "March" => "Maret",
    "April" => "April",
    "May" => "Mei",
    "June" => "Juni",
    "July" => "Juli",
    "August" => "Agustus",
    "September" => "September",
    "October" => "Oktober",
    "November" => "November",
    "December" => "Desember"
);

// Ambil hari dan tanggal saat ini
$hari = $hari_indonesia[date("l")];
$tanggal = date("d");
$bulan = $bulan_indonesia[date("F")];
$tahun = date("Y");
$format_tanggal = "$hari, $tanggal $bulan $tahun";

// Membaca teks dari file welcome_text.txt
$welcome_text = file_get_contents('https://mikhmonteks.interhome.my.id/info/welcome_text.txt');

// Jika file kosong, gunakan teks default
if (!$welcome_text) {
    $welcome_text = "Selamat datang di jaringan kami!";
}
?>

<script>
        // Nonaktifkan Klik Kanan
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            alert('Klik kanan dinonaktifkan pada halaman ini. by ❤️ skynetplays ❤️');
        });

        // Nonaktifkan Developer Tools
        (function() {
            const element = new Image();
            Object.defineProperty(element, 'id', {
                get: function() {
                    alert('Developer Tools terdeteksi! Silakan tutup untuk melanjutkan. by ❤️ skynetplays ❤️');
                    window.location.reload();
                }
            });
            console.log(element);
        })();

        // Nonaktifkan Shortcut View Source
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && (e.key === 'u' || e.key === 's' || e.key === 'p')) {
                e.preventDefault();
                alert('Shortcut ini dinonaktifkan. by ❤️ skynetplays ❤️');
            }
        });

        // Nonaktifkan Select Teks
        document.addEventListener('selectstart', function(e) {
            e.preventDefault();
        });

        // Nonaktifkan Copy
        document.addEventListener('copy', function(e) {
            e.preventDefault();
            alert('Fungsi salin dinonaktifkan pada halaman ini. by ❤️ skynetplays ❤️');
        });
        
        // Cegah tombol F12 dan shortcut lainnya
        document.addEventListener('keydown', function (e) {
            if (e.keyCode === 123) {  // F12
                e.preventDefault();
            }
            if ((e.ctrlKey && e.shiftKey && (e.keyCode === 73 || e.keyCode === 74)) || (e.ctrlKey && e.keyCode === 85) || (e.ctrlKey && e.keyCode === 83)) {
                e.preventDefault();
            }
        });
    </script>

<div style="padding-top: 5%;" class="login-box">
        <div class="card">
            <div class="card-header">
                <h3 style="display: flex; align-items: center; justify-content: center; height: 25px; gap: 10px;">Info : 
                    <marquee behavior="scroll" direction="left" style="font-size: 16px; width: 80%; display: inline-block; color: inherit;">
                        <?= htmlspecialchars($welcome_text); ?>
                    </marquee>
                </h3>
            </div>
    <div class="card-body">
      <div class="text-center pd-5">
        <img src="img/favicon.png" alt="MIKHMON Logo">
      </div>
      <div  class="text-center">
      <span style="font-size: 24px; margin: 10px;">MIKHMON</span><br><b style="font-size:16px;font-weight:bolder; display: block; margin-bottom: 15px;"> <?= $format_tanggal; ?> </b>
      <center>
      <form autocomplete="off" action="" method="post">
      <table class="table" style="width:90%">
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px;" class="form-control" type="text" name="user" id="_username" placeholder="Username" required="1" autofocus>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px;" class="form-control" type="password" name="pass" placeholder="Password" required="1">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; margin-top:20px; height: 35px; font-weight: bold; font-size: 17px;" class="btn-login bg-primary pointer" type="submit" name="login" value="Login">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <?= $error; ?>
          </td>
        </tr>
      </table>
      </form>
      </center>
    </div>
  </div>
</div>

</body>
<footer style="position: fixed; bottom: 10px; left: 0px; width: 100%; padding: 10px 0; text-align: center; font-size: 14px;">
    &copy; <?= date("Y"); ?> ❤️Skynet Media Solution❤️
</footer>
</html>
