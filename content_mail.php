<?php 

	$pesan = "<!doctype html>
                            <html>
                            <head>
                            <meta name='viewport' content='width=device-width'>
                            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                            <title>SiantroUGM</title>

                            </head>

                            <body>

                            <!-- body -->
                            <table style='padding: 20px; width: 100%;'>
                              <tr>
                                <td></td>
                                <td>

                                  <!-- content -->
                                  <div style='display: block; margin: 0 auto; max-width: 600px'>
                                  <table>
                                    <tr>
                                      <td>
                                        <h2>Aktivasi Akun SiantroUGM</h2><br/>
                                        <p>Selamat datang <?php echo $var_membername; ?>,</p>
                                        <p>
                                            Anda telah berhasil melakukan registrasi online pada website e-learning SiantroUGM. Mohon aktifkan akun anda dengan cara klik tombol dibawah ini dan untuk selanjutnya anda dapat menggunakan akun tersebut untuk mengakses fasilitas yang kami sediakan pada website e-learning kami. Terimakasih. <br/><br/>

                                              <!-- button -->
                                              <center>
                                              <table class='table' cellpadding='0' cellspacing='0' border='0'>
                                                <tr>
                                                  <td>
                                                    <a href='http://localhost/siantrougm/index.php?id=<?php echo $var_memberid; ?>' class='btn btn-success'>Aktifkan Akun</a>
                                                  </td>
                                                </tr>
                                              </table>
                                              </center>
                                              <!-- /button -->
                                        </p>
                                        <br/>
                                        <p>Jika tombol di atas tidak berfungsi silakan klik link di bawah ini</p>
                                        <p><a href='http://localhost/siantrougm/index.php?id=<?php echo $var_memberid; ?>'>http://localhost/siantrougm/index.php?id=<?php echo $var_memberid; ?></a></p>
                                        <p>

                                        <br/><br/>
                                        <p><i>Email ini dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</i></p>
                                        <hr>
                                        <p align='right'>Copyright &copy; Paleoantropologi UGM 2017</p>
                                      </td>
                                    </tr>
                                  </table>
                                  </div>
                                  <!-- /content -->
                                  
                                </td>
                                <td></td>
                              </tr>
                            </table>
                            <!-- /body -->

                            </body>
                            </html>";
                            
    $headers  = 'From: ambardhanes@gmail.com' . "\r\n" .
                  'MIME-Version: 1.0' . "\r\n" .
                  'Content-type: text/html; charset=utf-8';

?>