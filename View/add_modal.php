<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Add New</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add.php" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Description:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Price:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" required>
                            </div>
                        </div>
                        <label for="category">Category:</label>
                        <select name="category_id" id="category">
                            <?php
							$categoryQuery = $conn->query("SELECT * FROM categories");
							while ($category = $categoryQuery->fetch_assoc()) {
								echo "<option value='{$category['id']}'>{$category['name']}</option>";
							}
							?>
                        </select>


                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Image:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="image" accept="image/*" required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span
                        class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>

        </div>
    </div>
</div>