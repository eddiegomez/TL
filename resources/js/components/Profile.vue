<template>
  <div class="content" style="position:relative; top: 20px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card" style="padding:20px;">
            <div class="header">
              <h4 class="card-title">Edit Profile</h4>
            </div>
            <div class="content">
              <form>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="text-muted">Company (disabled)</label>
                      <input
                        type="text"
                        class="form-control"
                        disabled
                        placeholder="Company"
                        value="Creative Code Inc."
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="text-muted">Username</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        value="michael23"
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-muted">Email address</label>
                      <input type="email" class="form-control" placeholder="Email" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="text-muted">First Name</label>
                      <input type="text" class="form-control" placeholder="Company" value="Mike" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="text-muted">Last Name</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Last Name"
                        value="Andrew"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="text-muted">Address</label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Home Address"
                        value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
                      />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">City</label>
                      <input type="text" class="form-control" placeholder="City" value="Mike" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Country</label>
                      <input type="text" class="form-control" placeholder="Country" value="Andrew" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-muted">Postal Code</label>
                      <input type="number" class="form-control" placeholder="ZIP Code" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="text-muted">About Me</label>
                      <textarea
                        rows="3"
                        class="form-control"
                        placeholder="Here can be your description"
                        value="Mike"
                      >Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                    </div>
                  </div>
                </div>

                <button
                  type="submit"
                  class="btn btn-success btn-fill pull-right"
                  style="float:right"
                >Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-user">
            <div class="content center" style="padding:20px">
              <div class="author">
                  <center>
                <a href="#">
                  <img
                    class="avatar border-gray img-circle"
                    src="/imagens/profile_2.png"
                    style="height:150px;width:150px; border:gray;"
                    alt="..."
                  />

                  <h4 class="title">
                    Mike Andrew
                    <br />
                    <small>michael24</small>
                  </h4>
                </a>
                  </center>
              </div>
              <p class="description text-center">
                "Lamborghini Mercy
                <br />Your chick she so thirsty
                <br />I'm in that two seat Lambo"
              </p>
            </div>
            <hr />
            <div class="text-center">
              <button href="#" class="btn btn-simple">
                <i class="nav-icon fas fa-gmail"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fa fa-twitter"></i>
              </button>
              <button href="#" class="btn btn-simple">
                <i class="fa fa-google-plus-square"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
