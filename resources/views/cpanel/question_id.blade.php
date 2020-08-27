@extends('cpanel.layout.index')
@section('content')
  @include('sweetalert::alert')

<div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    
                    
                    <!-- END PAGE HEADER-->
                    
                    
                    
                    
                    <div class="row">
                        
                        <div class="col-lg-12 col-xs-12 col-sm-12">
                            <div class="portlet light ">
                               
                                <div class="portlet-body">
                                    <div class="scroller"  data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                        <div class="general-item-list">
                                            
                                            
                                            
                                            
                                          @foreach($Question as $question)

                                            
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic rounded" src="{{ asset('uploads/' .$question->userName()->image) }}">
                                                        <a href="" class="item-name primary-link">
                                                            {{ $question->userName()->name}} </a>
                                                        <span class="item-label"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))->diffForHumans() ?>                      </span>
                                                    </div>
                                                 
                                                </div>
                                                <div class="item-body"> {{ $question->question}}</div>


                                        <div class="general-item-list" style=" background: #d9e6e6;">
                                                @foreach($question->answers as $answer)

                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic rounded" src="{{ asset('uploads/' .$answer->userName()->image) }}">
                                                        <a href="" class="item-name primary-link">
                                                           {{ $answer->userName()->name}} </a>
                                                        <span class="item-label"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($answer->created_at))->diffForHumans() ?>                      </span>
                                                    </div>
                                                 
                                                </div>
                                                <div class="item-body"> {{ $answer->answer}}</div>
                                            
                                            </div>


                                                @endforeach
                                            </div>
                                      
                                        </div>
@endforeach


              {!!  Form::open(['url' => ['admin/storeanswer/'.$question->id] ,'method' => 'POST','files' => true]) !!}



                            <textarea id="w3review"  rows="4" cols="8" style="text-align:right;" name="answer" >

                                
                                            </textarea> 

<button type="submit" class="btn btn-fit-height grey-salt dropdown-toggle"  style="background: #17C4BB;"> 
                                  <i class="fa fa-plus"></i>&nbsp;
اضافة رد                                </button>

         {!! Form::close() !!}

<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>




                @endsection






              