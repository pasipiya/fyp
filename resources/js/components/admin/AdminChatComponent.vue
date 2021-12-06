<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!--Preloader-->
    <theme-preloader></theme-preloader>
    <!--End Preloader-->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Chat</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chat</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="section-body">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                  <div class="card">
                    <div class="body">
                      <div id="plist" class="people-list">
                        <div class="chat-search">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Search..."
                          />
                        </div>
                        <div class="m-b-20">
                          <div
                            id="chat-scroll"
                            tabindex="1"
                            style="
                              height: 450px;
                              overflow: hidden;
                              outline: none;
                            "
                          >
                            <ul class="chat-list list-unstyled m-b-0">
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-4.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">John Doe</div>
                                  <div class="status">
                                    <i class="material-icons offline"
                                      >fiber_manual_record</i
                                    >
                                    left 7 mins ago
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix active">
                                <img
                                  src="admin/assets/img/users/user-1.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Michael Gardner</div>
                                  <div class="status">
                                    <i class="material-icons online"
                                      >fiber_manual_record</i
                                    >
                                    online
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-2.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Nancy Burton</div>
                                  <div class="status">
                                    <i class="material-icons online"
                                      >fiber_manual_record</i
                                    >
                                    online
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-3.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Wiltor Stone</div>
                                  <div class="status">
                                    <i class="material-icons online"
                                      >fiber_manual_record</i
                                    >
                                    online
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-5.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Amiah Smith</div>
                                  <div class="status">
                                    <i class="material-icons online"
                                      >fiber_manual_record</i
                                    >
                                    online
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-7.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Anna Stone</div>
                                  <div class="status">
                                    <i class="material-icons offline"
                                      >fiber_manual_record</i
                                    >
                                    left 30 mins ago
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-8.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Joseph Henson</div>
                                  <div class="status">
                                    <i class="material-icons offline"
                                      >fiber_manual_record</i
                                    >
                                    left 10 hours ago
                                  </div>
                                </div>
                              </li>
                              <li class="clearfix">
                                <img
                                  src="admin/assets/img/users/user-9.png"
                                  alt="avatar"
                                />
                                <div class="about">
                                  <div class="name">Dorothy Hike</div>
                                  <div class="status">
                                    <i class="material-icons online"
                                      >fiber_manual_record</i
                                    >
                                    online
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                  <div class="card">
                    <div class="chat">
                      <div class="chat-header clearfix">
                        <img
                          src="admin/assets/img/users/user-1.png"
                          alt="avatar"
                        />
                        <div class="chat-about">
                          <div class="chat-with">Michael Gardner</div>
                          <div class="status">
                            <i class="material-icons online"
                              >fiber_manual_record</i
                            >
                            online
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-box" id="mychatbox">
                      <div
                        class="card-body chat-content"
                        tabindex="2"
                        style="overflow: hidden; outline: none"
                      >
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">Hello, How are you ?!</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-right" style="">
                          <img src="admin/assets/img/users/user-1.png" />
                          <div class="chat-details">
                            <div class="chat-text">I am Fine</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-right" style="">
                          <img src="admin/assets/img/users/user-1.png" />
                          <div class="chat-details">
                            <div class="chat-text">Whats about you?</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">I am fine too!!</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">
                              Could you please check your task?
                            </div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-right" style="">
                          <img src="admin/assets/img/users/user-1.png" />
                          <div class="chat-details">
                            <div class="chat-text">Yes I am.</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">
                              Do you have any questions?
                            </div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-right" style="">
                          <img src="admin/assets/img/users/user-1.png" />
                          <div class="chat-details">
                            <div class="chat-text">No.</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">That is great.</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">
                              if you will have any questions,then let me know..
                            </div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">
                              Delevered me when complete
                            </div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-right" style="">
                          <img src="admin/assets/img/users/user-1.png" />
                          <div class="chat-details">
                            <div class="chat-text">Okay Sure.</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text">Thank You...</div>
                            <div class="chat-time">03:09</div>
                          </div>
                        </div>
                        <div class="chat-item chat-left chat-typing" style="">
                          <img src="admin/assets/img/users/user-6.png" />
                          <div class="chat-details">
                            <div class="chat-text"></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer chat-form">
                        <form id="chat-form">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Type a message"
                          />
                          <button class="btn btn-primary">
                            <i class="far fa-paper-plane"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /.row -->
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</template>

<script>
//import preloaderComponent from '../theme_components/preloaderComponent.vue';
export default {
  //components: { preloaderComponent },
  data() {
    return {};
  },
  methods: {},

  created() {},
};
</script>
