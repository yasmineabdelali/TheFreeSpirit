<!-- Show Details -->
<div class="modal fade" id="show_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Product Details</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label modal-label">Name:</label>
                        </div>
                        <div class="col-sm-10">
                            <p><?php echo $row['name']; ?></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label modal-label">Description:</label>
                        </div>
                        <div class="col-sm-10">
                            <p><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label modal-label">Price:</label>
                        </div>
                        <div class="col-sm-10">
                            <p><?php echo $row['price']; ?></p>
                        </div>
                    </div>
                    <!-- Display product image -->
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label class="control-label modal-label">Image:</label>
                        </div>
                        <div class="col-sm-10">
                            <img src='<?php echo $row['image']; ?>' alt='Product Image'
                                style='max-width: 100px; max-height: 100px;'>
                        </div>
                    </div>
                    <!-- Add more details as needed -->
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
    </div>
</div>