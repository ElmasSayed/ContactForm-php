<?php 
    // Message Vars
    $msg = "";
    $msgClass = "";

    // Check for submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // Get from data --- elmas: here are POST variables in real variables for further use
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
    
        // VALIDATION- Check required fields--elmas: chking the no empty fields
        if(!empty($name) && !empty($email) && !empty($message)){
            // validation passed
            // Check email ---elmas:after making sure there are no empty , we check if email is in correct fromat
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // Failed
                $msg = 'Please use a valid email';
                $msgClass = "alert-danger";               
            } else {
                // Passed
                echo 'passed';
            }
        }else{
            // validation Failed
            $msg = 'Please fill in all fields';
            $msgClass = "alert-danger";
        } 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class ="container">
                <div class ="navbar-header" style="background-color:black; width:100%;">
                    <a class= "navbar-brand" href="index.php"> My website</a>
                </div>
            </div>
        </nav>  
        <div class="container">

            <?php 
            if($msg !="") : ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?> </div>

            <?php endif; ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type = "text" name="name" class="form-control" value="<?php echo isset ($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type = "text" name="email" class="form-control" value="<?php echo isset ($_POST['email']) ? $email : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea  name="message" class="form-control"><?php echo isset ($_POST['message']) ? $message : ''; ?></textarea>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>         
    </body>
</html>

<!-- 
       Pseudocode:
    1) check for empty fields.... 
    2) put alert messages if not valid
    3) check for email validity
    4) put alert messages if not valid
    5) incase of error in some fields, keep other fields filled.
    6) give htmlspecialchars for inputs when setting their variables (these will detele any unwanted characs in the input field)

 -->
