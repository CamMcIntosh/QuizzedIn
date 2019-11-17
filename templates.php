<?php
function printNavBar () {
  echo <<<endOfNav
    <div class="nav">
      <div class="company-name">
        <a class="company-name-link" href="/" style="text-decoration:none"><span>QuizzedIn</span></a>
      </div>
      <div class="nav-left-items">
        <div class="nav-item">
          <a class="nav-item-link" href="./categories.php" style="text-decoration:none"><span>Category</span></a>
        </div>
          <div class="nav-item">
            <a class="nav-item-link" href="/" style="text-decoration:none" onclick="showDiv()">
                <span>Search</span>
            </a>
          </div>
        </div>
        <div id="toggle" class="nav-center-items" style="display:none">
            <div class="nav-searchbar">
              <form class="example" action="action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
        </div>
        <div class="nav-right-items">
          <div class="nav-item">
            <a class="nav-item-link open-button" onclick="openSignInForm()" style="text-decoration:none"><span>SignIn</span></a>

          </div>
          <div class="nav-item">
            <a class="nav-item-link open-button" onclick="openSignUpForm()" style="text-decoration:none"><span>SignUp</span></a>
          </div>
        </div>
      </div>
endOfNav;
}



 ?>
