<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../build/css/styleIndex.css">
    <title>Workbench</title>
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row" style="height: 100vh;">
                <div class="col-sm-6 text-black">
                    <div id="title" class="px-5 ms-xl-4 text-center">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <span class="h1 fw-bold mb-0">Workbench</span>
                    </div>

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form style="width: 23rem;" action="authentication.php" method="post">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">sin up</h3>

                            <div class="form-outline mb-4">
                                <input type="text" id="username" class="form-control form-control-lg" name="username" required/>
                                <label class="form-label" for="form2Example18">username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control form-control-lg" name="password" id="password" required/>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" class="form-control form-control-lg" id="confirmPassword" required/>
                                <label class="form-label" for="confirmPassword" name="confirmPassword">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" name="sinup" type="submit">Sin up</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="forgotPassword.php">Forgot password?</a></p>
                            <p>have an account? <a href="login.php" class="link-info">Login here</a></p>

                        </form>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../dipository/img/header_backgrounds/hand-bulb.jpg" alt="Login image" class="w-100 h-100">
                </div>
            </div>
        </div>
    </section>
</body>

</html>