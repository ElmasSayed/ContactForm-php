
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
            echo "all good";
        }else{
            // validation Failed
            $msg = 'Please fill in all fields';
            $msgClass = "alert-primary";
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
                    <input type = "text" name="name" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type = "text" name="email" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea  name="message" class="form-control"></textarea>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>         
    </body>
</html>