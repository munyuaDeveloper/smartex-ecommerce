
<div class="modal fade" id="<?php echo $_GET['cart'];?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
            <h4>Payment details</h4>
           </div>
            <div class="modal-body" style="padding: 20px;">
              <div class="row">
              <div class="col-sm-6">
                <h4>Use Paypal</h4>
                <p>
                  <img src="icon/payment-methods.png">
                </p>
    <form action="" method="post">
      Email address
      <input type="text" name="email" class="form-control" placeholder="Email address" required>
      Password
      <input type="password" name="password" class="form-control" placeholder="Password" required><br>
      <input type="submit" value="Login" class="" name="login">
      </form>
  </div> <div class="col-sm-6" style="background: #f2f2f2;">
    <h5>Don't have an account? Register</h5>
    <form action="" method="post">
      Full name
      <input type="text" name="names" class="form-control" placeholder=" Full name" required>
      Email address
      <input type="email" name="email" class="form-control" placeholder="Email address" required>
      Phone number
      <input type="number" name="phone" class="form-control" placeholder="Phone number" required>
      Enter password
      <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      <input type="submit" value="Register" name="register" class="btn-primary">
    </form>
  </div></div>

            </div>                                      
              <div class="modal-footer">
                <div class="col-lg-9">
                 
                </div>
                 
       <div class="col-lg-3">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
  </div>