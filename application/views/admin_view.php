<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin View</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <div>
            <h2>Random Title</h2>

            <table border="1">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company Information</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company City</th>
                    <th>Company State</th>
                    <th>Company Zip</th>
                    <th>Invoice Attachment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach($entries as $entry) {?>
                    <tr>
                        <td><?=$entry->first_name?></td>
                        <td><?=$entry->last_name?></td>
                        <td><?=$entry->address1?></td>
                        <td><?=$entry->address2?></td>
                        <td><?=$entry->city?></td>
                        <td><?=$entry->state?></td>
                        <td><?=$entry->zip?></td>
                        <td><?=$entry->phone?></td>
                        <td><?=$entry->email?></td>
                        <td><?=$entry->company_info?></td>
                        <td><?=$entry->company_name?></td>
                        <td><?=$entry->company_address?></td>
                        <td><?=$entry->company_city?></td>
                        <td><?=$entry->company_state?></td>
                        <td><?=$entry->company_zip?></td>
                        <td><a href='<?php echo site_url("admin/view_file/$entry->invoice_attachment")?>'><?=$entry->invoice_attachment?></a></td>
                        <td><?=$entry->status?></td>
                        <?php if($entry->status === null) {?>
                            <td>
                                <a href='<?php echo site_url("admin/accept/$entry->id")?>'>Accept</a>
                                <a href='<?php echo site_url("admin/decline/$entry->id")?>'>Decline</a>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>
            </table>
        </div>
    </body>
</html>