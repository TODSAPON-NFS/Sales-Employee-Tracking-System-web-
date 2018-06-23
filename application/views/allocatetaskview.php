<?php include 'partials/header.php' ?>

<div class="container-fluid" >

    <h2>Task Allocation</h2>

    <?php if($this->session->flashdata('success')){?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php } ?>



    <div class="tab-content">
        <div id="Admin" class="tab-pane fade in active">

                <form action = "<?php echo site_url('Addtask/addtask');?>" method = "POST">
                    <div class="form-group">
                        <label for="usr">Task ID</label>
                        <input type="text" class="form-control" name = "taskid" required>
                    </div>

                    <div class="form-group">
                        <label for="usr">Description</label><br>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Issued By</label>
                        <input type="text" class="form-control" placeholder="Manager ID" name = "managerid" required>
                    </div>

                    <div class="form-group">
                        <label for="usr">Time Stamp</label>
                        <input type="text" class="form-control" name = "timestamp" required>
                    </div>

                    <div class="form-group">
                        <label for="usr">Report</label>
                        <textarea name="report" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Allocated Employee</label>
                        <input type="text" class="form-control" placeholder="Employee ID" name = "empid" required>
                        <span id="err" Style="color:red"></span>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Status</label>
                        <select class = "form-control" name="status">
                            <option value="Engaged" name="engaged">Engaged</option>
                            <option value="Not Engaged" name="notengaged">Not Engaged</option>
                            <option value="Completed" name="completed">Completed</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Location</label>
                        <input type="text" class="form-control" name="location" required>
                    </div>


                    </br>
                    <input type="submit"  class="btn btn-primary" name="submit" value="Submit">
                </form>

        </div>




    </div>
</div>

<?php include 'partials/footer.php' ?>
