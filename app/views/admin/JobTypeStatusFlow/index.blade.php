@extends('admin.layout')
    @section('body')
         <h3 class="page-title">Job Type Status Flow List</h3>
           <div class="page-bar">
               <ul class="page-breadcrumb">
                   <li>
                       <i class="fa fa-home"></i>
                       <a href="{{URL::route('admin.dashboard')}}">Home</a>
                       <i class="fa fa-angle-right"></i>
                   </li>
                   <li>
                       <i class="fa fa-pencil"></i>
                       <a href="{{URL::route('admin.jobTypeStatusFlow')}}">Job Type Status Flow List</a>
                   </li>
               </ul>
           </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="portlet box blue">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="fa fa-globe"></i> Job Type Status Flow List
                          </div>
                          <div class="actions">
                              <a id="sample_editable_1_new" class="btn btn-default btn-sm" href='{{ URL::route('admin.jobTypeStatusFlow.create')}}' style="margin-right:10px">
                                      Add New <i class="fa fa-plus"></i>
                              </a>
                          </div>
                      </div>
                      <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                        </th>
                                        <th>Channel Name</th>
                                        <th>Job Type Name</th>
                                        <th>From Status Name</th>
                                        <th>To Status Name</th>
                                         <th>Active</th>
                                        <th class= "sorting_disabled">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($jobTypeStatusFlow as $key=>$value)
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" value="{{$value->id}}" id="chkChnnel"></td>
                                            <td>{{$value->channel->channel_name}}</td>
                                             <td>{{$value->jobType->job_type_name}}</td>
                                             <td>{{$value->from->status_name}}</td>
                                             <td>{{$value->to->status_name}}</td>
                                             <td>
                                                @if($value->active == 1)
                                                    <?php echo "Yes";?>
                                                @else
                                                    <?php echo "No";?>
                                                @endif
                                             </td>
                                             <td>
                                                 <a href="{{ URL::route('admin.jobTypeStatusFlow.edit',$value->id)}}"  class='btn btn-xs blue'>
                                                     <i class='fa fa-edit'></i>Edit
                                                 </a>
                                                  <form action="{{ URL::route('admin.jobTypeStatusFlow.delete' , $value->id) }}" id="formTest" onsubmit = "return onDeleteConfirm(this)" style="display:inline-block">
                                                     <button type="submit" class="btn btn-xs red" id="js-a-delete" >
                                                     <i class='fa fa-trash-o'></i> Delete</button>
                                                 </form>
                                             </td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                      </div>
                  </div>
              </div>
          </div>
    @stop
    @section('custom-scripts')
        <script type="text/javascript">
            jQuery(document).ready(function() {
                 initTable1();
            });
            function onDeleteConfirm( obj){
                bootbox.confirm("Are you sure?", function(result) {

                    if ( result ) {

                        obj.submit();

                    }

                });

                return false;
            }
            function onSuspendConfirm(obj){
                bootbox.confirm("Are you sure?", function(result) {

                    if ( result ) {

                        obj.submit();

                    }

                });
                return false;
            }
        </script>
    @stop
@stop