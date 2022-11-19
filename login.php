<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
    <header> Chat App </header>
    <h1> Ssign Up </h1>
    <div class="wrapper">
        <section class="form login">

            <!-- Form jangan lupa ditambah required -->
            <!--  <input type="text" name="nickname" placeholder="Nickname" required> -->
            
            <form action="#" enctype="multipart/form-data"> 
                <div class="field input">
                    <label> Email</label>
                    <input type="text" name="email" placeholder="Masukkan Email">
                </div>  
                <div class="field input">
                    <label> Password </label>
                    <input type="password" name="password" placeholder="Buat Password ">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Login">
                </div>
                <div class="error-text">Error Nih</div>
            </form>
            <div class="link">Belum punya akun? <a href="index.php">Sign up</a></div>
        </section>
    </div>
    
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
<footer>
    
</footer>
</html>