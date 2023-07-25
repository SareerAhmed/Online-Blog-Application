  <!doctype html>
<html lang="en">
  <head>
    <title>Sidebars · Bootstrap v5.3</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    <!-- Bootstrap core CSS -->

   <!-- add fontawesome link -->
<link rel="stylesheet" href="fontawesome/css/all.css">


  </head>
  <body>
    <main>
      <div class="col-lg-4 col-xs-12 col-md-4 col-sm-12 p-3 shadow-lg " class="flex-shrink-0 p-3" style=" width:20%;background-color: #B92533; margin-top: 5%; border-radius: 12px;">
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="false">
              <b style="color: white; font-size: 22px;">Users Managing</b>
            </button>
            <div class="collapse" id="users-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="view-all-users.php">View All Users</a></li>
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="add-new-user.php">Add New User</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="approve-users.php">Approve</a></li>
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="rejected-users.php">Reject</a></li>
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="pending-users.php">Pending</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="follower.php">Managing Followers</a></li>
              </ul>
            </div>
          </li>


      <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#blogs-collapse" aria-expanded="false">
            <b style="color: white; font-size: 22px;">Blogs Managing </b>
          </button>
            <div class="collapse" id="blogs-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a style="color:white; font-size: 18PX;" class="dropdown-item" hhref="view-all-blogs.php">View All Blog</a></li>
                          <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="add-blog.php">Add Blog</a></li>
              </ul>
            </div>
      </li>

      <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#posts-collapse" aria-expanded="false">
            <b style="color: white; font-size: 22px;">Posts Managing </b>
          </button>
            <div class="collapse" id="posts-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="view-all-posts.php">View All Post</a></li>
                          <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="add-post.php">Add Post</a></li>
              </ul>
            </div>
      </li>



      <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#categories-collapse" aria-expanded="false">
            <b style="color: white; font-size: 21px;">Categories</b>
          </button>
            <div class="collapse" id="categories-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="view-all-categories.php">View All Categories</a></li>
                          <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="add-categories.php">Add Category</a></li>
              </ul>
            </div>
      </li>

      <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#all_comments"  aria-expanded="false">
            <a href="view-all-comments.php"></a>
            <b href="view-all-comments.php" style="color: white; font-size: 21px;">Comments</b>
          </button>
            <div class="collapse" id="all_comments">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a style="color:white; font-size: 18PX;" class="dropdown-item" hhref="view-all-comments.php">Managing Comments</a>  </li>
              </ul>
            </div>
      </li>


      <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#feedback"  aria-expanded="false">
            <a href="view-all-comments.php"></a>
            <b  style="color: white; font-size: 21px;">Feedback</b>
          </button>
            <div class="collapse" id="feedback">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a style="color:white; font-size: 18PX;" class="dropdown-item" href="view-all-comments.php">Managing Feedback</a>  </li>
              </ul>
            </div>
      </li>






       
    </ul>
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="sidebars.js"></script>
  </body>
</html>
