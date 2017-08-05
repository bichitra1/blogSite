<div class="page-content-wrapper">
              
                <div class="page-content">
<div class="row">

	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light " >
		<?php if($this->session->flashdata('msg_succ') != '') { ?>
                                <div class="alert alert-success">
                                   <?php echo $this->session->flashdata('msg_succ'); ?>
                                </div>
                        <?php } ?>
						<div id="alertpopup" style="display:none;" class="custom-alerts alert alert-success fade in">
						
							  </div>
	<div id="alertpopupdanger" style="display:none;" class="custom-alerts alert alert-danger fade in">
						
							  </div>
			<div class="portlet-title">
				<div class="caption font-dark">
					<i class="icon-settings font-dark"></i>
					<span class="caption-subject bold uppercase">All Blog Category</span>
				</div>
				  
                 
				<div class="tools"> </div>
			</div>
			<div class="col-md-6">
                                                <div class="btn-group">
                                                    <a  href="<?php echo base_url();?>admin/blogcategory/addcategory" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
			<div class="portlet-body" >
			
				<table class="table table-striped table-bordered table-hover table-checkable order-column" width="100%" id="sample_1">
					<thead>
						<tr>
							
							<th class="all">S. No.</th>
							<th class="all">Category Name</th>
							
							
							<th class="none">Status</th>
							<th class="none">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; foreach($blogcategory as $category) { ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $category->cat_name; ?></td>
								
								<td><input <?php  if($category->status=='1'){ echo 'checked'; } ?> type="checkbox"  
											class="make-switch" data-on-text="&nbsp;Enabled&nbsp;&nbsp;" data-off-text="&nbsp;Disabled&nbsp;" 
											 id="toggle-event-<?php echo $category->id; ?>" 
											 onchange="show('<?php echo $category->id; ?>')"
											
											value="<?php echo $category->id; ?>" /> 
								</td>
								
								<td><a href="javascript:;" onclick="editcat('<?php echo $category->id; ?>')" class="btn btn-outline btn-circle green btn-sm green">
								<i class="Search Results fa-pencil-square-o"></i> Edit </a>
								<a href="javascript:;" onclick="deletecontact('<?php echo $category->id; ?>')" class="btn btn-outline btn-circle red btn-sm red">
								<i class="fa fa-trash-o"></i> Delete </a>
								</td>
							</tr>
						<?php $i++; } ?>
						
					</tbody>
				</table>
			</div>
		</div>
	
		<!-- END EXAMPLE TABLE PORTLET-->
	</div> </div>
	</div> 
	</div> 
	</div> 
	<script>
		
		function deletecontact(id){
			
			if(confirm('Are you sure to delete this Category ?'))
			{
				window.location.href='<?php echo base_url();?>admin/blogcategory/deletecategory/'+id;
			}
		}
		function editcat(id){
			
			
				window.location.href='<?php echo base_url();?>admin/blogcategory/editcategory/'+id;
			
		}
		</script>
<script type="text/javascript">
	function show(id){
		
		var status = document.getElementById('toggle-event-'+id).checked;
	//alert(status);exit;
		if(status == true){
			var blogStatus = "1";
		} else {
			var blogStatus = "0";
		}
		//alert(blogStatus);
		
		// alert('vendorStatus '+vendorStatus+);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>admin/blogcategory/changestatustype",
			data: {bid:id,blogStatus:blogStatus},
			cache: false,
			success: function(result){
			
				
				if(blogStatus == "1"){
					var reqirmessg = 'Category has been successfully Active.';
					$('#alertpopup').show();
				document.getElementById("alertpopup").innerHTML = reqirmessg;
				$('#alertpopup').delay(1000).hide(500); 
					
				} else { 
					var reqirmessg = 'Category has been successfully Inactive.';
					
					$('#alertpopupdanger').show();
				document.getElementById("alertpopupdanger").innerHTML = reqirmessg;
				$('#alertpopupdanger').delay(1000).hide(500);
				}
				
		 
			}
		});
	} 
	
</script>