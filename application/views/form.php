<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Main Form</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div>
        <span style="color:green;"><?php if(isset($success)) {echo $success;} ?></span>
        <h2>Random Title</h2>
        
        <span style="color:red;"><?php echo validation_errors(); ?></span>
        
        <?php echo form_open_multipart('welcome/process_form'); ?>

            <label for="fname">First Name</label>
            <input type="input" name="fname" /><br />
            
            <label for="lname">Last Name</label>
            <input type="input" name="lname" /><br />

            <label for="address1">Address1</label>
            <input type="input" name="address1" /><br />
            
            <label for="address2">Address2</label>
            <input type="input" name="address2" /><br />
            
            <label for="city">City</label>
            <input type="input" name="city" /><br />
            
            <label for="state">State</label>
            <input type="input" name="state" /><br />
            
            <label for="zip">Zip</label>
            <input type="input" name="zip" /><br />
            
            <label for="phone">Phone</label>
            <input type="input" name="phone" /><br />
            
            <label for="email">Email</label>
            <input type="input" name="email" /><br />
            
            <label for="c_info">Company Information</label>
            <textarea name="c_info"></textarea><br />
            
            <label for="c_name">Company Name</label>
            <input type="input" name="c_name" /><br />
            
            <label for="c_address">Company Address</label>
            <input type="input" name="c_address" /><br />
            
            <label for="c_city">Company City</label>
            <input type="input" name="c_city" /><br />
            
            <label for="c_state">Company State</label>
            <input type="input" name="c_state" /><br />
            
            <label for="c_zip">Company Zip</label>
            <input type="input" name="c_zip" /><br />
            
            <label for="invoice">Invoice Attachment</label>
            <input type="file" name="invoice" /><br />
            
            <div class="g-recaptcha" data-sitekey="6LfNgQkUAAAAAL84Eera9QqmeEq_cPiO93gWNmC5"></div>
            
            <span style="color:red;"><?php if(isset($error)) {echo $error;} ?></span>
            
            <input type="submit" name="submit" value="Create new item" />

        <?php echo form_close(); ?>
    </div>
</body>
</html>