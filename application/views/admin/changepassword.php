
            <div class="page-content-wrapper">
              
                <div class="page-content">
                    
                    <h3 class="page-title"> Change Password  Form
                       
                    </h3>
                    
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-6 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Change Password Form</span>
                                    </div>
                                    
                                </div>
								<?php if($this->session->flashdata('msg_succ') != '') { ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('msg_succ'); ?>
						</div>
					<?php } ?>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form" method="post"  action="<?php echo base_url();?>admin/dashboard/editpassword">
                                        <div class="form-body">
										   
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Old Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password" name="title" required>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">New Password</label>
                                                <div class="col-md-9">
                                                  
                                                       
                                                        <input type="Password"  name="newpassword" class="form-control" placeholder="Enter New Password" required> 
														</div>
                                                
                                            </div>
											<div class="form-group">
                                                <label class="col-md-3 control-label">Reenter Password</label>
                                                <div class="col-md-9">
                                                  
                                                       
                                                        <input type="Password"  name="conpassword" class="form-control" placeholder="Reenter Password" required> 
														</div>
                                                
                                            </div>
                                          
                                             
                                          
                                           
                                           
                                                
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Submit</button>
                                                    <a href="<?php echo base_url();?>admin/dashboard" class="btn default">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                           
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
                       
                    </div>
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
           
            
            <!-- END QUICK SIDEBAR -->
        </div>
<script type="text/javascript">
$(document).ready(function() {
  $(".select2_multiple").select2({
	   placeholder: "Select Role",
                    allowClear: true
  });
});
</script>