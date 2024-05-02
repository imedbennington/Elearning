<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Projects/Elearning/css/Styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body><!--
    <header>
        <div class="logo img" style="height: 100px; width: 100px;">
            <img src="../images/2.png">
        </div>
        <div class="navbar">
            <a class="active" href="user_profile.html"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="uploads.html"><i class="fa fa-fw fa-search"></i> Search</a>
            <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
            <a href="login.html" target="_blank"><i class="fa fa-fw fa-user"></i> Log out</a>
        </div>
    </header>-->
    <section>
      <div class="container_title">
        <div class="title">
          <h1>Files and uploads</h1>
        </div>
        <div class="Search">
          <form action="/search" method="get">
            <input type="search" id="searchInput" name="q" placeholder="Search for a document" style="margin: 20px; width: auto;"s>
            <select id="selectOption" name="selectOption" style="margin: 20px; width: auto;">
              <option selected>Select a category</option>
              <option value="option1">IT</option>
              <option value="option2">Maths</option>
              <option value="option3">Chimestry</option>
            </select>
            <button type="submit" class="btn btn-primary" style="margin: 20px;">Search</button>
          </form>
        </div>
      </div>
        
        
        <div class="container">
            <div class="card" style="margin: 20px;">
                <h5 class="card-header">Upload documents</h5>
                <div class="card-body">
                <i class="fa fa-cloud-upload" aria-hidden="true" style="font-size: 70px;"></i>

                  <p class="card-text">Drag and drop to upload.</p>
                  <input type="file"><a href="#" class="btn btn-primary" style="width: 100%;">Upload</a>
                </div>
              </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Upload date</th>
                    <th scope="col">Download</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><i class="fa-solid fa-download"></i></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><i class="fa-solid fa-download"></i></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2"></td>
                    <td></td>
                    <td><i class="fa-solid fa-download"></i></td>
                  </tr>
                </tbody>
              </table>
              
        </div>
    </section>
</body>
</html>