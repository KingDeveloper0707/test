 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        
          <div class="modal-content">
          
              <div class="col-md-12 col-md-offset-12 modal-login">
                  <div class="login-panel panel panel-success">
                      <div class="panel-heading">
                          <h3 class="panel-title">Please do Login here</h3>
                      </div>
                    
                      <div class="panel-body">
                          <form role="form" method="post">
                              <fieldset>
                                  <div class="form-group"  >
                                      <input class="form-control" placeholder="Enter E-mail" name="user_email" type="email" autofocus required>
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Enter Password" name="user_password" type="password" value="" required>
                                  </div>


                                      <input class="btn btn-lg btn-success btn-block" id="login-btn" type="submit"  value="login" name="login" >

                              </fieldset>
                          </form>
                      <center><b>You are not registered ?</b> <br></b><a href="#" class="register_click">Register here</a></center><!--for centered text-->

                      </div>
                  </div>
              </div>



              <div class="col-md-12 col-md-offset-12 modal-register d-none">
                  <div class="login-panel panel panel-success">
                      <div class="panel-heading">
                          <h3 class="panel-title">Please do Registration here</h3>
                      </div>
                    
                      <div class="panel-body">

                 
                      <form role="form" method="post">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter Name" name="user_name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Please enter E-mail" name="user_email_register" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Password" name="user_password_register" type="password" value="">
                              </div>

                              <div class="form-group">
                                        <select class="form-control" placeholder="Enter Sex" name="user_sex" id="sel1">
                                                    <option default disabled selected>Enter Sex</option>
                                                    <option>female</option>
                                                    <option>male</option>
                                                    
                                        </select>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Enter Age" name="user_age" type="number" value="">
                              </div>

                            

                              <input class="btn btn-lg btn-success btn-block" id="register-btn" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>You have Already registered ?</b> <br></b><a href="#" class="login_click"> Please Login</a></center><!--for centered text-->
                  </div>
                  </div>
              </div>

          </div>
          
    </div>
</div>

   