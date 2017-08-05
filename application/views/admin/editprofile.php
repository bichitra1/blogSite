
            <div class="page-content-wrapper">
              
                <div class="page-content">
                    
                    <h3 class="page-title"> Profile  Form
                       
                    </h3>
                    
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-6 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Profile Form</span>
                                    </div>
                                    
                                </div>
								<?php if($this->session->flashdata('msg_succ') != '') { ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('msg_succ'); ?>
						</div>
					<?php } ?>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form" method="post"  action="<?php echo base_url();?>admin/dashboard/editprofilesubmit" enctype="multipart/form-data">
                                        <div class="form-body">
										   
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Enter text" name="name" value="<?php echo $result[0]->name;?>" required>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                  
                                                       
                                                        <input type="email" name="email" class="form-control" value="<?php echo $result[0]->email;?>" placeholder="Enter Email" required> 
														</div>
                                                
                                            </div>
                                          <div class="form-group">
                                                <label class="col-md-3 control-label">Mobile no</label>
                                                <div class="col-md-9">
                                                  
                                                       
                                                        <input type="text" name="mobile" class="form-control" value="<?php echo $result[0]->mobile;?>" placeholder="Enter Mobile Number" required> 
														</div>
                                                
                                            </div>
                                          <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9">
                                                  <img alt="" class="img-circle" src="<?php echo base_url();?>img/<?php echo $result[0]->image;?>" height="40" width="50"/>
                                                       
                                                      	</div>
                                                
                                            </div>
 										  <div class="form-group">
                                                <label class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9">
                                                  
                                                       
                                                        <input type="file" name="img" class="form-control" placeholder="Select file" > 
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
