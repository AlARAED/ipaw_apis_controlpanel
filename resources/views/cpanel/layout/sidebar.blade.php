<div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start active open">
                            <a href="{{url('admin/index')}}" class="nav-link">
                                <i class="icon-home"></i>
                                <span class="title">لوحة التحكم</span>

                             </a>

                        </li>


                        <li class="nav-item start active open">

                               <a href="{{ url('admin/members') }}" class="nav-link nav-toggle">

                                      <i class="icon-user"></i>
                                        <span class="title">الأعضاء</span>
                           </a>




                        </li>



                        <li class="nav-item start active open ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">صفحات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{url('admin/aboutus')}}" class="nav-link ">
                                        <span class="title"> من نحن </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('admin/Changesettingadminpolicypage')}}" class="nav-link ">
                                        <span class="title">سياسة الخصوصية  </span>
                                    </a>
                                </li>
                                
                               <li class="nav-item  ">
                                    <a href="{{url('admin/Character')}}" class="nav-link ">
                                        <span class="title">الشخصيات   </span>
                                    </a>
                                </li>
                                
                              
                            </ul>
                        </li>
                        <li class="nav-item   active open ">
                            <a  class="nav-link nav-toggle">
<i class="fa fa-paw" aria-hidden="true"></i>
                                <span class="title"> الحيوانات  </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li class="nav-item  ">
                                    <a href="{{url('admin/Categories')}}" class="nav-link ">
                                        <span class="title">تصنيفات
                                    </a>
                                </li>


                                <li class="nav-item  ">
                                    <a href="{{url('admin/maindepartment')}}" class="nav-link ">
                                        <span class="title">الأقسام الرئيسية
                                    </a>
                                </li>

<li class="nav-item  ">
                                    <a href="{{url('admin/blogs')}}" class="nav-link ">
                                        <span class="title">المدونات 
                                    </a>
                                </li>

                              <li class="nav-item  ">
                                    <a href="{{url('admin/training')}}" class="nav-link ">
                                        <span class="title">التدريبات
                                    </a>
                                </li>

                              <li class="nav-item  ">
                                    <a href="{{url('admin/all_animal_users')}}" class="nav-link ">
                                        <span class="title"> حيوانات المستخدمين الخاصة
                                    </a>
                                </li>




<li class="nav-item  ">
                                    <a href="{{url('admin/all_animal_lost')}}" class="nav-link ">
                                        <span class="title">   الحيوانات المفقودة
                                    </a>
                                </li>




<li class="nav-item  ">
                                    <a href="{{url('admin/all_animal_findit')}}" class="nav-link ">
                                        <span class="title">   الحيوانات  تم ايجادها
                                    </a>
                                </li>





<li class="nav-item  ">
                                    <a href="{{url('admin/all_animal_tabanaa')}}" class="nav-link ">
                                        <span class="title">   حيوانات للتبنى
                                    </a>
                                </li>



<li class="nav-item  ">
                                    <a href="{{url('admin/all_library_image')}}" class="nav-link ">
                                        <span class="title"> مكتبة حيوانات المستخدمين  
                                    </a>
                                </li>
                              
                            </ul>
                            
                        </li>
                        
                        <li class="nav-item active open">
                            <a class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">التحديات</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{url('admin/allChallenge')}}" class="nav-link ">
                                        <span class="title">جميع التحديات</span>
                                    </a>
                                </li>
                             
                               
                            </ul>
                        </li>
                        <li class="nav-item  active open ">
                            <a   href="{{url('admin/allquestion')}}"  class="nav-link nav-toggle">
<i class="fa fa-question" aria-hidden="true"></i>
                                <span class="title">الأسئلة والأجوبة</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>

                        <li class="nav-item active open ">
                            <a href="{{url('admin/foodblog')}}" class="nav-link nav-toggle">
<i class="fa fa-leaf" aria-hidden="true"></i>

                           <span class="title">التغذية</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>


                        <li class="nav-item  active open ">
                            <a  class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">سلالة الحيوانات</span>
                                <span class="arrow"></span>
                            </a>





                            <ul class="sub-menu">


                               <li class="nav-item  ">
                                    <a href="{{url('admin/departchain')}}" class="nav-link ">
                                        <span class="title">الاقسام الرئيسية 
                                    </a>
                                </li>
                               <li class="nav-item  ">
                                    <a href="{{url('admin/chainanimal')}}" class="nav-link ">
                                        <span class="title">سلالة احيوانات
                                    </a>
                                </li>


                                


                              
                            </ul>
                            
                        </li>

                        <li class="nav-item  active open">
                            <a href="{{url('admin/factory_myself')}}" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title"> اصنع بنفسك</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>

                        
                        <li class="nav-item active open">
                            <a href="{{url('admin/suggestclinc')}}" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">اقتراح عيادة</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
