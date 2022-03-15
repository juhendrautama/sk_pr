 <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="user/Home/Profil/<?php echo $this->session->userdata('id_pelanggan');  ?>"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                          <li class="">
                            <a class="<?php if($this->uri->segment(3)=='Data_pesanan'){echo'active';}else if($this->uri->segment(3)=='Detail_pesanan'){echo'active';}else if($this->uri->segment(2)=='Home'){} ?>" href="user/Home/Data_pesanan/<?php echo $this->session->userdata('id_pelanggan');  ?>"><i class="fa fa-shopping-bag"></i> Data Pesanan</a>
                        </li>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
       