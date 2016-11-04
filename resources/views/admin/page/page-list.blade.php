@extends('app-admin')
@section('admin-content')	
<style type="text/css">
	.sub_table{
		display: none;
		width: 100%;
	}
	.page_plus{
		display:block;
		margin:0 auto;
		width:10px;
		cursor: pointer;
	}
	.page_minus{
		display:none;
		margin:0 auto;
		width:10px;
		cursor: pointer;
	}
	.page_table_parennt_div{
		height: 120px;
	    position: relative;
	    overflow-y: auto;
	}
</style>
	

		<div class="col-xs-12">


			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="table-header">
				Page List
			</div>
		</div>
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>
							<i class="glyphicon glyphicon-plus-sign page_plus"></i>
						</th>
						<th>Page</th>
						<th>Edit/delete</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($pages as $page)

					<tr>
						<td>
				            <span class="row_page">
				            	<i  class="glyphicon glyphicon-plus page_plus"></i>
				            	<i  class="glyphicon glyphicon-minus page_minus"></i>
				            </span>
				            <div class="page_table_parennt_div">
				                <table class="sub_table able table-striped table-bordered table-hover">
					                 <tr>
					                   <th>N</th>
					                   <!-- <th></th> -->
					                   <th>Sub Menu Name</th>
					                   <th>Edit/delete</th>
					                 </tr>
					                 @foreach($page['menuSubMenu'] as $key => $submenu)
						                   <tr>
							                    <td>
							                      {{$submenu->id}}
							                    </td>
							                     <!-- <td style="display:block;margin: 0 23px 0 16px">
							                       <span class="glyphicon glyphicon-ok sub_ok" data-id='{{$submenu->id}}'></span>
							                       <span style="color:#478FCA" class="glyphicon glyphicon-pencil sub_edit" data-id='{{$submenu->id}}'></span>
							                       <span style="color:#DD5A43" class="glyphicon glyphicon-trash sub_delete" data-id='{{$submenu->id}}'></span>
							                     </td> -->
							                     <td class="sub_menu_block">
							                     <!--   <input type="text" value="{{$submenu->sub_menu}}" class="edit_input">   -->          
							                       <span class="edit_text">{{$submenu->sub_menu}}</span>
							                     </td>
							                     <td>
							                     	<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="#">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>
														<a class="red" href="#">
															<i class="ace-icon fa fa-trash-o bigger-130"></i>
														</a>
													</div>
							                     </td>
						                   </tr>
					                 @endforeach 
				                </table>
			                </div>    
				        </td>
						<!-- <td>
							<i style="display:block;margin:0 auto;width:10px;cursor:pointer" class="glyphicon glyphicon-plus"></i>
						</td> -->
							
						<td>
							<a href="#">{{$page->page_name}}</a>
						</td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="#">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>
								<a data-href="{{action('AdminController@getDeletePage',$page->id)}}" data-toggle="modal" data-target="#myModal" class="red click_del" href="#">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
							</div>
						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>			
		</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Do you want delete this page</h4>
        </div>
        
        <div class="modal-footer">
        	<a class="del_yes" href="">
        		<button  class="btn btn-danger delete_modal">Yes</button>
        	</a>
        	<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
	{!! HTML::script( asset('assets/admin/js/delete.js') ) !!} 
@endsection










