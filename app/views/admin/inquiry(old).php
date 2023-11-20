<?php require APPROOT.'/views/templates/adminHeader.php'; ?>
    
    <div class="container">
        <div class="card card-body mb-3">
            <h4 class="card-title">Customer Inquiries</h4>
			<?php foreach($data["customerInquiry"] as $key => $details) : ?>
                <table class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">inquiryStatement</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $details->email; ?></td>
                        <td><?php echo $details->contactNumber; ?></td>
                        <td><?php echo $details->inquiryStatement; ?></td>
                    </tr>
                    </tbody>
                </table>
			<?php endforeach; ?>
        </div>
    </div>
    
<?php require APPROOT . "/views/templates/footer.php"; ?>