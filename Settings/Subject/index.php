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
              <li><a href="../GradeAndSection">Grade And Section</a></li>
              <li><a class="is-active"  href="./">Subject</a></li>
            </ul>
          </aside>
        </div>

        <div class="column is-9"> <!-- MANAGE SUBJECT -->

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

          <div class="columns is-gapless">

            <div class="column is-12"> <!-- ADD/VIEW SUBJECT -->

              <div class="card">

                <header class="card-header">
                  <p class="card-header-title">Subject</p>
                </header>

                <div class="card-content">

                  <div class="columns is-variable is-1"> <!--ADD SUBJECTS -->

                    <div class="column is-2">

                      <div class="field">
                        <label class="label">Subject Code</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="Subject Code">
                        </div>
                      </div>

                    </div>

                    <div class="column is-4 ">

                      <div class="field">
                        <label class="label">Subject Description</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="Subject Description">
                        </div>
                      </div>

                    </div>

                    <div class="column is-2">

                      <div class="field">
                        <label class="label">Units</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="Units">
                        </div>
                      </div>

                    </div>

                    <div class="column is-3">

                      <div class="fields">

                        <label class="label">Grade Level</label>

                        <div class="columns is-variable is-1">

                          <div class="column is-10"> <!-- GRADE LEVEL -->

                            <div class="control">
                              <div class="select is-fullwidth">
                                <select>
                                  <option selected>Grade 1</option>
                                  <option>Grade 2</option>
                                  <option>Grade 3</option>
                                </select>
                              </div>
                            </div>

                          </div>

                          <div class="column is-1"> <!--ADD BUTTON -->

                            <a class="button is-outlined">
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
                              <th>Code</th>
                              <th>Description</th>
                              <th>Units</th>
                              <th>Grade Level</th>
                              <th>Action</th>

                            </tr>

                          </thead>

                          <tbody>

                            <tr >
                              <td>1</td>
                              <td>Ma</td>
                              <td>Math</td>
                              <td>3.0</td>
                              <td>Grade 1</td>
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
                              <td>Ma</td>
                              <td>Math</td>
                              <td>3.0</td>
                              <td>Grade 1</td>
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
                              <td>Ma</td>
                              <td>Math</td>
                              <td>3.0</td>
                              <td>Grade 1</td>
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


  </body>

</html>
