 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MAIN</div>
                            <a class="nav-link" href="<?= base_url('/') ?>" target="_blank" rel="noopener noreferrer">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                PSITS Home
                            </a>
                            <a class="nav-link" href="<?= base_url('/admin/psits/dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                                Membership
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= service('uri')->getSegment(1) == 'psits-members' ? 'active' : '' ?>" href="<?= base_url('/admin/psits/members') ?>">Active Members</a>

                                    <a class="nav-link" href="<?= base_url('/admin/psits/pending-members') ?>">Pending Approvals</a>
                                </nav>
                            </div>

                            

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvents" aria-expanded="false" aria-controls="collapseEvents">
                                    <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                                    Announcements
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseEvents" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!-- Announcements link -->
                                        <a class="nav-link <?= service('uri')->getSegment(1) == 'announcement' ? 'active' : '' ?>" href="<?= base_url('/admin/psits/announcements') ?>">Announcements</a>
                                    </nav>

                                    <?php if(session()->get('user_role') === 'Super Admin'): ?>
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?= base_url('/admin/psits/announcements/pending') ?>">Pending Announcements</a>
                                        </nav>
                                            

                                    <?php endif; ?>
                                </div>

                            <a class="nav-link" href="<?= base_url('admin/psits/audit')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                                Audit Trail
                            </a>

                            <a class="nav-link" href="<?= base_url('/admin/psits/profile')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Profile
                            </a>

                            <a class="nav-link" href="<?= base_url('/admin/psits/change-password')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                                Change Password
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <!-- <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                #
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a> -->
                                    <!-- <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="">Members List</a>
                                            
                                        </nav>
                                    </div> -->
                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a> -->
                                    <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div> -->
                                </nav>
                            </div>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: PSITS</div>
                        
                        <a href="https://www.facebook.com/profile.php?id=100086506355956" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </nav>
            </div>