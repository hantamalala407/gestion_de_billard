<!DOCTYPE html>
<html lang="en">
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin IDEA</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
        <!-- Layout styles -->
        <link rel="stylesheet" href="../../assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="../../assets/images/favicon.png" />
      </head>
      <body>
        <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
              <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                  <div class="card-body px-5 py-3">
                    <h3 class="card-title text-left mb-3">Paramètre de compte</h3>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="name" class="form-control p_input" value="{{  auth()->user()->name  }}" required>
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control p_input" value="{{ auth()->user()->email }}" required>
                      </div>

                      <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="form-control p_input" value="{{ auth()->user()->password }}" required>
                      </div>

                    <div class="form-group">
                        <label for="image">Image de Profil</label>
                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-xs rounded-circle" style="max-width: 200px;">
                        @else
                            <p>Aucune image disponible.</p>
                        @endif
                        <input type="file" name="image" class="form-control p_input">
                    </div>

                    <div class="d-flex">
                        <button class="btn btn-primary col mr-2">
                          <i class="mdi mdi-upload"></i> Mettre à jour </button>
                    </div>
                    <br>
                      
                    </form>

                    <a href="../../index" class="btn btn-link mr-2">
                        <button class="btn btn-outline-danger" onclick="window.location.reload()">
                            <i class="mdi mdi-redo-variant"></i>
                        </button>                                        
                    </a>

                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/hoverable-collapse.js"></script>
        <script src="../../assets/js/misc.js"></script>
        <script src="../../assets/js/settings.js"></script>
        <script src="../../assets/js/todolist.js"></script>
        <!-- endinject -->
      </body>
    </html>