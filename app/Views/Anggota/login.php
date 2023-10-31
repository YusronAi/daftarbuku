<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login & Registration Form | Codehal</title>
    <link rel="stylesheet" type="text/css" href="\css\style.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="name" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" name="submit">Login</button>
                <div class="signUp-link">
                    <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="form-wrapper sign-up">
            <form action="/anggota/register" method="post">
                <?= csrf_field(); ?>
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="name" required>
                    <label for="">Nama</label>
                </div>
                <div class="input-group">
                    <input type="text" name="alamat" required>
                    <label for="">Alamat</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox"> I agree to the terms & conditions</label>
                </div>
                <button type="submit">Sign Up</button>
                <div class="signUp-link">
                    <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
                </div>
            </form>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" style="color: green;" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="\js\script.js"></script>
</body>

</html>