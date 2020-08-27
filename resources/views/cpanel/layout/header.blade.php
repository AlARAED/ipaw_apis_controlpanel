<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{url('admin/index')}}">
                        <img src="{{url('admin')}}/assets/layouts/layout2/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn btn-circle btn-outline red dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-plus"></i>&nbsp;
                            <span class="hidden-sm hidden-xs">آخر دخول للحساب {{ Auth::guard('admin')->user()->last_login_at}} &nbsp;</span>&nbsp;
                            
                        </button>
                        
                    </div>
                </div>
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">

                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                          
                            <li class="dropdown dropdown-extended dropdown-notifications" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle data-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    
                                    <span class="badge badge-defaultn notif-count" >{{auth()->user()->unreadNotifications()->count()}}</span>
                                                    
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external      ">
                                      
                                        <a href="{{url('admin/makasread')}}"> عرض الكل</a>
                                    </li>
                                    @foreach(auth()->user()->unreadnotifications as $not)
                                    <li   class="scrollable-container"  >



                                         <a >
                                             
                                                    <span class="time">{{$not->data['message']}}</span>
                                                    <span class="details">  
                                                        <span class="label label-sm label-icon label-success">
                                                     
                                                            <i class="fa fa-plus"></i>
                                                </a>
                                            
                                     
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{ asset('uploads/' .Auth::guard('admin')->user()->image) }}" />
                                    <span class="username username-hide-on-mobile">  {{ Auth::guard('admin')->user()->name}}  </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{ url('admin/Changesettingadmin') }}">
                                            <i class="icon-user"></i> اعدادات الحساب</a>
                                    </li>
                                   
                                    <li>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i> خروج                                    </a>

                                        <form id="logout-form" action="{{ 'App\Models\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>







                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>



