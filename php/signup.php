<?php
    session_start();
    include_once "config.php";
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //$image = mysqli_real_escape_string($conn, $_POST['image']);

    if(!empty($nickname) && !empty($nama_lengkap) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) == 0){
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type =  $_FILES['image']['type'];
                    $tmp_name =  $_FILES['image']['tmp_name']; // nama sementara yang digunakan untuk menyimpan dan pindah file di folder kita
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    
                    $extensions = ['png','jpeg','jpg'];
                    
                    if(in_array($img_ext, $extensions) === true){
                        $time = time(); // untuk nama file;
                        
                        $new_img_name = $time.$img_name;
                        if (move_uploaded_file($tmp_name, '../data/images/'.$new_img_name)){
                            $status = "Aktif Sekarang";
                            $random_id = rand(time(), 1000000);
                            $encrypt_pass = md5($password);
                            // insert data
                            $sqlLagi = mysqli_query($conn, "INSERT INTO users (unique_id, nickname, nama_lengkap, email, password, gambar, status)
                                                    VALUES ({$random_id},'{$nickname}', '{$nama_lengkap}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                            if($sqlLagi){

                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
                                if (mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                            else{
                                echo "Insert Gagal";
                            }
                        }
                    }
                    else {
                        echo "Masukkan gambar dengan formay - jpeg,png,jpg";
                    }

                }
                else{

                    echo "Masukkan Gambar Untuk Foto Profil";
                }
            }
            else{
                echo "$email - sudah digunakan";
            }
        }
        else{
            echo "$email -  bukan email yang valid!";
        }
    }else {
        echo "Mohon lengkapi data terlebih dahulu";
    }
?>