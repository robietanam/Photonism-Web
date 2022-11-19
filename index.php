<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>

<body>
    <header> Chat App </header>
    <div class="wrapper">
        <section class="form signup-tag">

            <!-- Form jangan lupa ditambah required -->
            <!--  <input type="text" name="nickname" placeholder="Nickname" required> -->
            
            <form action="#" enctype="multipart/form-data"> 
                <div class="field input">
                    <label> Nickname</label>
                    <input type="text" name="nickname" placeholder="Nickname">
                </div>
                <div class="field input">
                    <label> Nama Lengkap </label>
                    <input type="text" name="nama_lengkap" placeholder="Nama lengkap">
                </div>
                <div class="field input">
                    <label> Email</label>
                    <input type="text" name="email" placeholder="Masukkan Email">
                </div>  
                <div class="field input">
                    <label> Password </label>
                    <input type="password" name="password" placeholder="Buat Password ">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label> Masukkan Foto Profil</label>
                    <input type="file" name="image" >
                </div>
                <div class="field button">
                    <input type="submit" value="Sign Up">
                </div>
                <div class="error-text">Error Nih</div>
            </form>
            <div class="link">Sudah punya akun? <a href="login.php">Log in</a></div>
        </section>
    </div>
    
    <script src="javascript/pass-show-hide.js"></script>
    <script src="./javascript/signup.js"></script>
</body>
<footer>
    
</footer>
</html>