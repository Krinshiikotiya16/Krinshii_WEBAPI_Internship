<?php

$name = $email =$city= $cpass =$phone = $gender=$pan = $pass = $aadhar= "";
$nameErr = $emailErr = $cpassErr= $cityErr= $phoneErr = $genderErr=$panErr = $passErr = $aadharErr= "";

$showSignup = false;
$success = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['signup'])) {
    $showSignup = true;

    $name   = $_POST["uname"] ?? "";
    $city   =$_POST["ucity"] ?? "";
    $email  = $_POST["uemail"] ?? "";
    $phone  = $_POST["uphone"] ?? "";
    $gender  = $_POST["gender"] ?? "";
    $pan    = $_POST["upan"] ?? "";
    $aadhar = $_POST["uaadhar"] ?? "";

        //name   
        if(!preg_match("/^[A-Za-z]+\s+[A-Za-z]+\s+[A-Za-z]+$/", trim($name)))
            {
                $nameErr="Enter fisrt middle and last name!";
            }
        //city
        if(empty($city))
        {
            $cityErr = "Please select a city!";
        }

        //email    
        if(!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email))    
            {
                $emailErr="Invalid Email format!";
            }  
        //phone
        if(!preg_match("/^[6-9]\d{9}$/", $phone))    
            {
                $phoneErr="Invalid phone Number!";
            }      

        //gender
        if(empty($gender))
        {
            $genderErr = "Please select gender!";
        }    

        //pan number      
        if(!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/", $pan))    
            {
                $panErr="Ivalid PAN number!";
            }  

        //addhar number     
        if(!preg_match("/^[0-9]{12}$/", $aadhar))    
            {
                $aadharErr="Invalid Aadhar number !";
            } 
    }            

if(isset($_POST['login']))
{
    $uname = $_POST['uname'] ?? '';
    $pass = $_POST["upass"] ?? "";
    $cpass = $_POST["cpass"] ?? "";

        //username 
        if(empty($uname))
        {
            $nameErr = "Username required!";
        }
 
        //password    
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/", $pass)) {
                $passErr="Strong password needed!";
            }
        if($pass != $cpass)
        {
            $cpassErr = "Passwords do not match!";
        }    
    }  

        if(isset($_POST['signup']) &&
            empty($nameErr) &&
            empty($cityErr) &&
            empty($emailErr) &&
            empty($phoneErr) &&
            empty($genderErr) &&
            empty($panErr) &&
            empty($aadharErr)
        )    
        {
        $success = true;
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-plum: #4F6D9A;   
            --light-plum: #6E8DBB; 
            --dark-bg: #6A5ACD;
        }

        body{
    background:url('image/bgg.png');        
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    position:relative;

    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    background-attachment:fixed;

}
body::before{
    content:'';
    position:fixed;
    width:400px;
    height:400px;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    top:-100px;
    left:-100px;
    animation:float1 12s infinite alternate;
    z-index:-1;
}

body::after{
    content:'';
    position:fixed;
    width:500px;
    height:500px;
    border-radius:50%;
    background:rgba(255,255,255,.05);
    bottom:-150px;
    right:-150px;
    animation:float2 15s infinite alternate;
    z-index:-1;
}

@keyframes float1{
    from{
        transform:translate(0,0);
    }
    to{
        transform:translate(150px,120px);
    }
}

@keyframes float2{
    from{
        transform:translate(0,0);
    }
    to{
        transform:translate(-180px,-120px);
    }
}

        .container {
            background-color: #FDF6EC;;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 900px;
            max-width: 100%;
            min-height:690px;;
        }

         /* Left Decorative Panel */
    .left-panel {
    background: linear-gradient(135deg, var(--light-plum) 0%, var(--primary-plum) 100%);
    position: relative;
    z-index: 1;
    }

    
    /* Creating the diagonal geometric look */
.overlay-shapes{
    position:absolute;
    inset:0;
    opacity:.15;

    background-image:
    linear-gradient(45deg,
    rgba(255,255,255,.25) 25%,
    transparent 25%,
    transparent 75%,
    rgba(255,255,255,.25) 75%),

    linear-gradient(-45deg,
    rgba(255,255,255,.25) 25%,
    transparent 25%,
    transparent 75%,
    rgba(255,255,255,.25) 75%);

    background-size:80px 80px;
}

        /* --- FORM CONTAINERS --- */
        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        /* Movement Logic */
        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        
        }

        @keyframes show {
            0%, 49.99% { opacity: 0; z-index: 1; }
            50%, 100% { opacity: 1; z-index: 5; }
        }

        /* --- OVERLAY SECTION  --- */
        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
             background: linear-gradient(135deg,#6E8DBB 0%,#4F6D9A 100% );
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left { transform: translateX(-20%); }
        .container.right-panel-active .overlay-left { transform: translateX(0); }

        .overlay-right { right: 0; transform: translateX(0); }
        .container.right-panel-active .overlay-right { transform: translateX(20%); }

        /* --- STYLES FOR FORMS --- */
       /* ================= FORM STYLING ================= */

form{
    background:#FDF6EC;
    display:flex;
    flex-direction:column;
    justify-content:center;
    height:100%;
    padding:25px 35px;
    text-align:left;
    overflow-y:auto;
}

form h1{
    text-align:center;
    font-size:38px;
    margin-top:90px;
    color:#2d3436;
    font-weight:700;
}

form label{
    display:block;
    width:100%;
    font-size:14px;
    font-weight:600;
    color:#444;
    margin-bottom:8px;
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form input[type="number"],
form select{
    width:100%;
    height:40px;
    border:1px solid #d4d4d4;
    border-radius:8px;
    padding:0 12px;
    margin-top:4px;
    background:#f7f7f7;
    font-size:14px;
    outline:none;
    transition:.3s;
}

form input:focus,
form select:focus{
    border-color:#BC8F8F;
    background:#fff;
    box-shadow:0 0 8px rgba(188,143,143,.25);
}

form span{
    display:block;
    color:red;
    font-size:11px;
    margin-top:3px;
    min-height:14px;
}

/* Gender */
.gender-row{
    display:flex;
    align-items:center;
    gap:15px;
    margin-top:5px;
    margin-bottom:5px;
}

.gender-row input[type="radio"]{
    width:auto;
    margin:0;
}

/* Select Box */
select{
    cursor:pointer;
}

/* Buttons */
button{
    border-radius:25px;
    border:1px solid var(--dark-bg);
    background-color:var(--dark-bg);
    color:#fff;
    font-size:13px;
    font-weight:bold;
    padding:12px 40px;
    text-transform:uppercase;
    cursor:pointer;
    margin-top:12px;
    transition:.3s;
}

button:hover{
    background:#c798c1;
    transform:translateY(-2px);
    box-shadow:0 6px 15px rgba(0,0,0,.2);
}

/* Login small text */
form p,
form a{
    font-size:13px;
}
    </style>

</head>
<body>


<div class="container <?php echo $showSignup ? 'right-panel-active' : ''; ?>" id="container">

    <div class="form-container sign-up-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            
            <h1>Registration Form </h1>
            <br> 
            <!-- Full name -->
            <label> 
            FULL NAME:<input type="text" name="uname"  placeholder="FirstName/MiddleName/LastName" value="<?php echo $name; ?>" required>
            <span><?php echo $nameErr; ?></span>
            </label>

            <!-- city -->
            <label >
            SELECT CITY:            
            <select name="ucity" value="<?php echo $city; ?>" >
                <option value="">--Select Your Lovely City--</option>
                <option value="Porbandar" <?php if(($city ?? '') == 'Porbandar') echo 'selected'; ?>>Porbandar</option>
                <option value="Ahemedabad" <?php if(($city ?? '') == 'Ahmedabad') echo 'selected'; ?>>Ahmedabad</option>
                <option value="Surat" <?php if(($city ?? '') == 'Surat') echo 'selected'; ?>>Surat</option>
                <option value="Rajkot" <?php if(($city ?? '') == 'Rajkot') echo 'selected'; ?>>Rajkot</option>
            </select>
            <span><?php echo $cityErr; ?></span>
            </label>

            <!-- email -->
             <label>
            E-MAIL:<input type="email" name="uemail" placeholder="username@gmail.com" value="<?php echo $email; ?>" required>
            <span><?php echo $emailErr; ?></span>
            </label>

            <!-- contact -->
            <label>
            CONTACT:<input type="number" name="uphone" placeholder="Must be 10 digits" value="<?php echo $phone; ?>" required>
            <span><?php echo $phoneErr; ?></span>
            </label>

            <!-- contact -->
            <label>
            GENDER:</br>
            <input type="radio" name ="gender" value="male" <?php if(($gender ?? '') == 'male') echo 'checked'; ?>>Male:
            <input type="radio" name ="gender"  value="female" <?php if(($gender ?? '') == 'female') echo 'checked'; ?>>Female: 
            <input type="radio" name ="gender" value="others" <?php if(($gender ?? '') == 'other') echo 'checked'; ?>>Other: 
            <span><?php echo $genderErr; ?></span>
            </label>
    
            <!-- pan -->
            <label>
            PAN:<input type="text" name="upan" placeholder="ABCDE1234K" value="<?php echo $pan; ?>" required>
            <span><?php echo $panErr; ?></span>
            </label> 

            <!-- aadhar -->
            <label>
            AADHAR:<input type="text" name="uaadhar" placeholder="12 digits needed" value="<?php echo $aadhar; ?>" required>
            <span><?php echo $aadharErr; ?></span>
            </label> 
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>


    <div class="form-container sign-in-container">
        <form action="" method="post"  >
            <h1 style="font-family: 'Orbitron', sans-serif;font-size:70px;font-weight:1000; margin-top :10px;">LOGIN</h1><br>
            <span style="font-family:'Trebuchet MS', sans-serif;font-size:19px;font-weight:600;color:#6A5ACD;letter-spacing:1px;">Every great journey begins with a login.
            </span><br><br>
            <!-- user name -->
            <label>
            UserName:<input type="text" name="uname" value="<?php echo $name; ?>" required>
            <span><?php echo $nameErr; ?></span>
            </label>

            <!-- password-->
            <label> 
            Password:<input type="password" name="upass" required>
            <span><?php echo $passErr; ?></span>
            </label>

            <!-- confirm password-->
            <label> 
            Confirm Password:<input type="password" name="cpass"  required>
            <span><?php echo $cpassErr; ?></span>
            </label>
            
            <button type="submit" name="login">Login</button>
        </form>
    </div>

  <div class="overlay-container">
    <div class="overlay">
        <div class="overlay-shapes"></div> 

        <div class="overlay-panel overlay-left">
            <h1 style="font-family: Comic Sans MS, cursive;">Welcome Back!</h1>
            <p style="font-family: Comic Sans MS, cursive;">To keep connected with us please login with your personal info!</p>
            <button type="button" class="ghost" id="signIn">Sign Up</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h2 style="font-family: Comic Sans MS, cursive; margin-right: 130px;">Hello, fam!</h2>
            <img src="image/log.png" style="height: 230px; width: 330px;">
            <p style="font-family: Comic Sans MS, cursive;">Enter your personal detail and Start journey with us! </p>
            <button type="button" class="ghost" id="signUp">Sign In</button>
        </div>
    </div>  
</div>
</div>


<!--pop up -->
<?php if($success){ ?>
<script>

Swal.fire({
    icon: 'success',
    title: 'Registration Successful!',
    text: 'Your account has been created successfully.',
    confirmButtonText: 'Go to Login',
    confirmButtonColor: '#c798c1'
}).then((result) => {

    if(result.isConfirmed)
    {
        const container = document.getElementById('container');
        container.classList.remove('right-panel-active');
    }

});

</script>
<?php } ?>



<script>
    const container = document.getElementById('container');
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');

    // Transitions
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>


</body>
</html>