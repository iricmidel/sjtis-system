<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admission - View Student List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.6.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <script src="../../Libraries/ajax-3.1.1.js"></script>
    <script src="../../Libraries/jquery-1.12.4.js"></script>
  </head>

  <body>

    <nav class="navbar is-white"> <!-- NAV BAR -->
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item brand-text" href="../">
            Thaddeus System
          </a>
          <div class="navbar-burger burger" onclick="document.querySelector('.navbar-menu').classList.toggle('is-active'); document.querySelector('.navbar-burger').classList.toggle('is-active');">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div id="navMenu" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="admin.html">
              Home
            </a>
            <a class="navbar-item" href="admin.html">
              Admission
            </a>
            <a class="navbar-item" href="admin.html">
              Academics
            </a>
            <a class="navbar-item" href="admin.html">
              Finance
            </a>
            <a class="navbar-item" href="admin.html">
              Settings
            </a>
            <a class="navbar-item" href="admin.html">
              Logout
            </a>
          </div>

        </div>
      </div>
    </nav>

    <div class="container"> <!-- BODY CONTENT -->

      <div class="columns">

        <div class="column is-3"> <!-- SIDEBAR MENU -->
          <aside class="menu">
            <p class="menu-label">
              Settings
            </p>
            <ul class="menu-list">
              <li><a class="is-active" href="./">Grade And Section</a></li>
              <li><a href="../Subject/">Subject</a></li>
            </ul>
          </aside>
        </div>

        <div class="column is-9"> <!-- MANAGE GRADE LEVEL AND SECTION -->

          <section class="hero is-info welcome is-small">
            <div class="hero-body">
              <div class="container">
                <h1 class="title">
                  Hello, Madel.
                </h1>
                <h2 class="subtitle">
                  I hope you are having a great day!
                </h2>
              </div>
            </div>
          </section>

          <div class="columns">

            <div class="column is-6"> <!-- MANAGE GRADE LEVEL -->

              <div class="card">

                <header class="card-header">
                  <p class="card-header-title">Grade Level</p>
                </header>

                <div class="card-content">

                  <div class="columns is-variable is-1"> <!--ADD GRADE LEVEL -->

                    <div class="column is-12">
                      <div class="fields">

                        <label class="label">Grade Level</label>

                        <div class="columns is-variable is-1">

                          <div class="column is-10"> <!-- GRADE LEVEL -->

                            <div class="field">
                              <div class="control">
                                <input id="gl_desc" class="input" type="text" placeholder="Grade Level">
                              </div>
                            </div>

                          </div>

                          <div class="column is-1"> <!--ADD BUTTON -->

                            <a class="button is-outlined" onclick="saveGradeLevel()">
                              <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                              </span>
                              <span>Add</span>
                            </a>

                          </div>

                        </div>

                      </div>

                    </div>


                  </div>

                  <div class="columns is-variable is-1"> <!-- GRADE LIST -->

                    <div class="column is-12">

                      <div class="column is-12">

                        <table class="table is-hoverable is-striped is-fullwidth">

                          <thead>

                            <tr>

                              <th>#</th>
                              <th>Grade Level</th>
                              <th>Actions</th>

                            </tr>

                          </thead>

                          <tbody id="load_gradelevel">

                          </tbody>

                        </table>

                      </div>


                    </div>


                  </div>

                </div>

              </div>

            </div>

            <div class="column is-6"> <!-- MANAGE SECTION -->

              <div class="card">

                <header class="card-header">
                  <p class="card-header-title">Sections</p>
                </header>

                <div class="card-content">

                  <div class="columns is-variable is-1"> <!--ADD SECTION -->

                    <div class="column is-6">

                      <div class="field">

                        <label class="label">Section Name</label>

                        <div class="control">
                          <input id="sec_name" class="input" type="text" placeholder="Section Name">
                        </div>

                      </div>

                    </div>

                    <div class="column is-6">

                      <div class="field">

                        <label class="label">Room Name</label>

                        <div class="control">
                          <input id="rm_name" class="input" type="text" placeholder="Room Name">
                        </div>

                      </div>

                    </div>


                  </div>

                  <div class="columns is-variable is-1"> <!--ADD SECTION GRADE LEVEL -->

                    <div class="column is-12">
                      <div class="fields">

                        <label class="label">Grade Level</label>

                        <div class="columns is-variable is-1">

                          <div class="column is-10"> <!-- GRADE LEVEL -->

                            <div class="field">
                              <div class="control">
                                <div class="select is-fullwidth">
                                  <select id="load_gl_option">
                                    <option>Grade 1</option>
                                    <option>Grade 2</option>
                                    <option>Grade 3</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="column is-1"> <!--ADD BUTTON -->

                            <a class="button is-outlined" onclick="saveSection()">
                              <span class="icon is-small">
                                <i class="fa fa-plus"></i>
                              </span>
                              <span>Add</span>
                            </a>

                          </div>

                        </div>

                      </div>

                    </div>


                  </div>

                  <div class="columns is-variable is-1"> <!-- SECTION LIST -->

                    <div class="column is-12">

                      <div class="column is-12">

                        <table class="table is-hoverable is-striped is-fullwidth">

                          <thead>

                            <tr>

                              <th>#</th>
                              <th>Section Name</th>
                              <th>Grade Level</th>
                              <th>Room</th>
                              <th>Actions</th>

                            </tr>

                          </thead>

                          <tbody id="load_section">

                            <tr >
                              <td>1</td>
                              <td>Section 1</td>
                              <td>Grade 1</td>
                              <td>Room 1</td>
                              <td>

                                <a class="button is-success is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-pencil"></i>
                                  </span>
                                </a>

                                <a class="button is-danger is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                  </span>
                                </a>

                              </td>
                            </tr>

                            <tr>
                              <td>2</td>
                              <td>Section 2</td>
                              <td>Grade 2</td>
                              <td>Room 2</td>
                              <td>

                                <a class="button is-success is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-pencil"></i>
                                  </span>
                                </a>

                                <a class="button is-danger is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                  </span>
                                </a>

                              </td>
                            </tr>

                            <tr>
                              <td>3</td>
                              <td>Section 3</td>
                              <td>Grade 3</td>
                              <td>Room 3</td>
                              <td>

                                <a class="button is-success is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-pencil"></i>
                                  </span>
                                </a>

                                <a class="button is-danger is-outlined">
                                  <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                  </span>
                                </a>

                              </td>
                            </tr>

                          </tbody>

                        </table>

                      </div>


                    </div>


                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <script src="../../_script/gradelevel_script.js"></script>
    <script src="../../_script/section_script.js"></script>

  </body>

</html>
