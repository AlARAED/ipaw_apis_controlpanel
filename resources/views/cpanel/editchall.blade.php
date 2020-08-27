@extends('cpanel.layout.index')
@section('content')
  @include('sweetalert::alert')
                <div class="page-content">

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line boxless tabbable-reversed">
                               
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="portlet box blue">
                                            <div class="portlet-title" style="background: #17C4BB;">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>   تعديل   </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
 {!!  Form::open(['url' => ['admin/edichalleng/'.$Challenging->id] ,'method' => 'POST','files' => true]) !!}                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">العنوةان  باللغة العربية </label>
                                                                     <input type="text" class="form-control" name="name_ar" value="{{$Challenging->name_ar}}" required="" />
                                                                   
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">  العنوان باللغة الانجليزية </label>
                                                                      <input type="text" class="form-control" name="name_en" value="{{$Challenging->name_en}}" required="" />
                                                                   
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>




                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">   تاريخ انتهاء  </label>
                                                                            <input type="date" id="lname" name="enddate"  class="form-control"  
                                                                            value="{{$Challenging->enddate}}" >

                                                                   
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>


                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">المحتوى  باللغة العربية   </label>
                                                            <textarea name="content_ar" rows="19" >
                                                                
                                                                {{$Challenging->content_ar}}
                                                            </textarea>



                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                     
                                                      <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">المحتوى باللغة الانجليزية</label>
                                                           <textarea name="content_en"  rows="19"  cols="30">
                                                               


                                                               {{$Challenging->content_en}}

                                                           </textarea>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        
                                                        <!--/row-->
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$Challenging->image) }}" alt=""  style="height: 155px;" /> </div>
                                                                   
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>



                                                                            <input type="file" name="image" 
                                                                            value="   {{$Challenging->image}}" > </span>
                                                                     
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="submit" class="btn blue">
                                                            <i class="fa fa-check"></i> تغيير</button>
                                                    </div>
  {!! Form::close() !!}                                                <!-- END FORM-->
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            @endsection
