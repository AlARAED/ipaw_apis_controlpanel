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
 {!!  Form::open(['url' => ['admin/ediChainAnimal/'.$ChainAnimal->id] ,'method' => 'POST','files' => true]) !!}                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">العنوان  باللغة العربية </label>
                                                                     <input type="text" class="form-control" name="name_ar"   value="{{$ChainAnimal->name_ar}}" required="" />
                                                                   
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">  العنوان باللغة الانجليزية </label>
                                                                      <input type="text" class="form-control" name="name_en" required="" value="{{$ChainAnimal->name_en}}" />
                                                                   
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>

<div class="row">
                                                            
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>












                                                        


                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">المحتوى  باللغة العربية   </label>
                                                            <textarea name="content_ar" rows="19" >
                                                                {{$ChainAnimal->content_ar}}
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
                                                                {{$ChainAnimal->content_en}}



                                                           </textarea>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            
                                                            <!--/span-->
                                                        </div>
                                                        
                                                        
                                                        <!--/row-->
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                                                 <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="{{ asset('uploads/' .$ChainAnimal->image) }}" alt=""  style="height: 155px;" /> </div> 
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                           



                                                           <input type="file" name="image" value="{{$ChainAnimal->image}}" > </span>
                                                                     
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    <div class="form-actions right">
                                                        <button type="submit" class="btn blue">
                                                            <i class="fa fa-check"></i> حفظ</button>
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
