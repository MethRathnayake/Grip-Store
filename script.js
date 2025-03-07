function changeView() {
  var signup = document.getElementById("signup_box");
  var signin = document.getElementById("signin_box");

  signup.classList.toggle("d-none");
  signin.classList.toggle("d-none");
}

function changeView2() {
  var signup = document.getElementById("signup_box");
  var mail = document.getElementById("mail_box");

  signup.classList.toggle("d-none");
  mail.classList.toggle("d-none");
}

function signin() {
  var un = document.getElementById("username").value;
  var pw = document.getElementById("password").value;
  var rm = document.getElementById("rm").checked;

  // alert (un);
  // alert (pw);
  // alert (rm);

  var f = new FormData();
  f.append("u", un);
  f.append("p", pw);
  f.append("r", rm);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        alert("Login Successful");
        window.location = "index.php";
      } else {
        document.getElementById("msgDiv").className = "d-block";
        document.getElementById("msg").innerHTML = response;
      }
    }
  };

  r.open("POST", "signinProcess.php", true);
  r.send(f);
}

function signup() {
  var name = document.getElementById("name").value;
  var mobile = document.getElementById("mobile").value;
  var email = document.getElementById("email").value;
  var username = document.getElementById("un").value;
  var password = document.getElementById("pw").value;
  var co_password = document.getElementById("co-pw").value;

  //   alert("fdfds");
  // alert(name);
  // alert(mobile);
  // alert(email);
  // alert(username);
  // alert(password);
  // alert(co_password);

  var f = new FormData();
  f.append("n", name);
  f.append("m", mobile);
  f.append("e", email);
  f.append("u", username);
  f.append("p", password);
  f.append("cp", co_password);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "Success") {
        alert("Please check your Email for Verify your Account");
        changeView2();
      } else {
        document.getElementById("msgDiv1").className = "d-block";
        document.getElementById("msg1").innerHTML = response;
      }
    }
  };

  r.open("POST", "signupProcess.php", true);
  r.send(f);
}

function emailVerify() {
  var code = document.getElementById("code").value;
  //alert(code.value);

  var f = new FormData();
  f.append("c", code);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "Success") {
        alert("Your Account is Verified, Please Log In");
        window.location = "login.php";
      } else {
        document.getElementById("msgDiv2").className = "d-block";
        document.getElementById("msg2").innerHTML = response;
      }
    }
  };

  r.open("POST", "verifyEmail.php", true);
  r.send(f);
}

function adminLogin() {
  var email = document.getElementById("email").value;
  var pw = document.getElementById("pw").value;

  // alert(email);
  // alert(pw);

  var f = new FormData();
  f.append("e", email);
  f.append("p", pw);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      // alert(response);

      if (response == "Success") {
        window.location = "adminDashboard.php";
      } else {
        document.getElementById("msgDiv3").style.display = "block";
        document.getElementById("msg3").innerHTML = response;
      }
    }
  };

  r.open("POST", "adminLoginProcess.php", true);
  r.send(f);
}

//load users for admin page
function loadUsers() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      document.getElementById("td").innerHTML = response;
    }
  };

  r.open("POST", "adminLoadUsers.php", true);
  r.send();
}

//change status
function changeStatus() {
  var statusId = document.getElementById("statusId").value;

  var f = new FormData();
  f.append("s", statusId);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "Active") {
        // alert("User Activated Successfully");
        Swal.fire({
          title: "Activated",
          text: "User Activated Successfully!",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });
      } else if (response == "Inactive") {
        // alert("User Deactivated Successfully");
        Swal.fire({
          title: "Deactivated",
          text: "User Deactivated Successfully!",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });
      } else {
        document.getElementById("alert").innerHTML = response;
      }
    }
  };

  r.open("POST", "adminUserStatusProcess.php", true);
  r.send(f);
}

function brand() {
  var brand = document.getElementById("brand").value;
  // alert(brand);

  var f = new FormData();
  f.append("b", brand);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      // alert(response);
      if (response == "sucess") {
        document.getElementById("brandAlertDiv").className = "d-block";
        document.getElementById("brandAlert").innerHTML =
          "Brand Registered Successfully";
        document.getElementById("brandAlert").className = "alert alert-success";
      } else if (response == "DataHave") {
        document.getElementById("brandAlertDiv").className = "d-block";
        document.getElementById("brandAlert").innerHTML =
          "Your Entered Brand name is Already exist";
        document.getElementById("brandAlert").className = "alert alert-warning";
      } else {
        document.getElementById("brandAlertDiv").className = "d-block";
        document.getElementById("brandAlert").innerHTML = response;
        document.getElementById("brandAlert").className = "alert alert-danger";
      }
    }
  };
  r.open("POST", "adminBrandRegProcess.php", true);
  r.send(f);
}

function product_type() {
  var product_type = document.getElementById("product_type").value;

  var f = new FormData();
  f.append("p", product_type);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      // alert(response);

      if (response == "sucess") {
        document.getElementById("sizeAlertDiv").className = "d-block";
        document.getElementById("sizeAlert").innerHTML =
          "Product type Registered Successfully";
        document.getElementById("sizeAlert").className = "alert alert-success";
      } else if (response == "DataHave") {
        document.getElementById("sizeAlertDiv").className = "d-block";
        document.getElementById("sizeAlert").innerHTML =
          "Your Entered Product type is Already exist";
        document.getElementById("sizeAlert").className = "alert alert-warning";
      } else {
        document.getElementById("sizeAlertDiv").className = "d-block";
        document.getElementById("sizeAlert").innerHTML = response;
        document.getElementById("sizeAlert").className = "alert alert-danger";
      }
    }
  };
  r.open("POST", "adminProtypeRegProcess.php", true);
  r.send(f);
}
function category() {
  var category = document.getElementById("category").value;

  var f = new FormData();
  f.append("c", category);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      // alert(response);

      if (response == "sucess") {
        document.getElementById("categoryAlertDiv").className = "d-block";
        document.getElementById("categoryAlert").innerHTML =
          "Category Registered Successfully";
        document.getElementById("categoryAlert").className =
          "alert alert-success";
      } else if (response == "DataHave") {
        document.getElementById("categoryAlertDiv").className = "d-block";
        document.getElementById("categoryAlert").innerHTML =
          "Your Entered Category name is Already exist";
        document.getElementById("categoryAlert").className =
          "alert alert-warning";
      } else {
        document.getElementById("categoryAlertDiv").className = "d-block";
        document.getElementById("categoryAlert").innerHTML = response;
        document.getElementById("categoryAlert").className =
          "alert alert-danger";
      }
    }
  };
  r.open("POST", "adminCategoryRegProcess.php", true);
  r.send(f);
}
function color() {
  var color = document.getElementById("color").value;

  var f = new FormData();
  f.append("c", color);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      // alert(response);

      if (response == "sucess") {
        document.getElementById("colorAlertDiv").className = "d-block";
        document.getElementById("colorAlert").innerHTML =
          "Color Registered Successfully";
        document.getElementById("colorAlert").className = "alert alert-success";
      } else if (response == "DataHave") {
        document.getElementById("colorAlertDiv").className = "d-block";
        document.getElementById("colorAlert").innerHTML =
          "Your Entered Color name is Already exist";
        document.getElementById("colorAlert").className = "alert alert-warning";
      } else {
        document.getElementById("colorAlertDiv").className = "d-block";
        document.getElementById("colorAlert").innerHTML = response;
        document.getElementById("colorAlert").className = "alert alert-danger";
      }
    }
  };
  r.open("POST", "adminColorRegProcess.php", true);
  r.send(f);
}

function productRegister() {
  var ProductName = document.getElementById("pname").value;
  var BrandName = document.getElementById("bname").value;
  var CategoryName = document.getElementById("cname").value;
  var product_type = document.getElementById("product_type").value;
  var color = document.getElementById("color").value;
  var des = document.getElementById("des").value;
  var img = document.getElementById("img");

  // alert(ProductName);
  // alert(BrandName);
  // alert(CategoryName);
  // alert(size);
  // alert(color);
  // alert(des);
  // alert(img);

  var f = new FormData();
  f.append("p", ProductName);
  f.append("b", BrandName);
  f.append("cat", CategoryName);
  f.append("s", product_type);
  f.append("c", color);
  f.append("d", des);
  f.append("i", img.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        // alert("Product Registered Successfully!");
        Swal.fire({
          title: "Registered",
          text: "Product Registered Successfully!",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });
      } else if (response == "DataHave") {
        document.getElementById("altDiv").className = "d-block";
        document.getElementById("altDiv").className = "alert alert-warning";
        document.getElementById("altMsg").innerHTML =
          "Your Entered Product name is already exist!";
      } else {
        document.getElementById("altDiv").className = "d-block";
        document.getElementById("altDiv").className = "alert alert-danger";
        document.getElementById("altMsg").innerHTML = response;
      }
    }
  };

  r.open("POST", "productRegProcess.php", true);
  r.send(f);
}

function stock() {
  var product = document.getElementById("loadProduct").value;
  var qty = document.getElementById("qty").value;
  var price = document.getElementById("price").value;

  // alert(product);
  // alert(qty);
  // alert(price);

  var f = new FormData();
  f.append("p", product);
  f.append("q", qty);
  f.append("rs", price);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      if (response == "insert") {
        Swal.fire({
          title: "Added",
          text: "New Stock Added Successfully!",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });
      } else if (response == "update") {
        // alert("Stock Updated Succcessfully!");
        Swal.fire({
          title: "Updated",
          text: "Stock Updated Succcessfully!",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });
      } else {
        document.getElementById("altDiv1").className = "d-block";
        document.getElementById("altDiv1").className = "alert alert-danger";
        document.getElementById("altMsg1").innerHTML = response;
      }
    }
  };

  r.open("POST", "adminStockRegProcess.php", true);
  r.send(f);
}

function productLoad(x) {
  var page = x;

  var f = new FormData();
  f.append("p", page);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      document.getElementById("pid").innerHTML = response;
    }
  };

  r.open("POST", "productLoadProcess.php", true);

  r.send(f);
}

function basicSearch(x) {
  var search = document.getElementById("inputData");
  var page = x;

  // alert(search.value);

  var f = new FormData();
  f.append("s", search.value);
  f.append("p", page);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      document.getElementById("pid").innerHTML = response;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}

function printpage() {
  var printButton = document.getElementById("printbtn");
  var backButton = document.getElementById("backbtn");

  printButton.style.visibility = "hidden";
  backButton.style.visibility = "hidden";

  window.print();
  printButton.style.visibility = "visible";
  backButton.style.visibility = "visible";
}

function viewFilter() {
  var div = document.getElementById("filterId");

  if (div.classList.contains("d-none")) {
    div.classList.remove("d-none");
  } else {
    div.classList.add("d-none");
  }
}


function advanceSearch(x) {
  var page = x;

  var min = document.getElementById("min").value;
  var max = document.getElementById("max").value;

  var brand = document.getElementById("brand").value;
  var color = document.getElementById("color").value;
  var product_type = document.getElementById("product_type").value;
  var category = document.getElementById("category").value;

  var f = new FormData();
  f.append("p", page);
  f.append("b", brand);
  f.append("c", color);
  f.append("pt", product_type);
  f.append("ct", category);
  f.append("min", min);
  f.append("max", max);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      document.getElementById("pid").innerHTML = response;
    }
  };

  r.open("POST", "advancedSearchProcess.php", true);
  r.send(f);
}

function loadCart() {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      // alert(response);
      document.getElementById("cartBody").innerHTML = response;
    }
  };

  r.open("POST", "loadCartProcess.php", true);
  r.send();
}

function incrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  //calculate + 1
  var newQty = parseInt(qty.value) + 1;

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else {
        swal("Oops", response, "error");
      }
    }
  };

  r.open("POST", "cartQtyUpdateProcess.php", "true");
  r.send(f);
}

function decrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);

  // Calculate new quantity
  var newQty = parseInt(qty.value) - 1;

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        if (qty.value == 1) {
          removeCart(cartId);
        } else {
          qty.value = parseInt(qty.value) - 1;
          loadCart();
        }
      } else {
        swal("Oops", response, "error");
      }
    }
  };

  r.open("POST", "cartQtyUpdateProcess.php", "true");
  r.send(f);
}

function removeCart(x) {
  var cartId = x;

  swal({
    title: "Are you sure?",
    text: "Do you want to remove this product from Cart?",
    icon: "warning",
    buttons: ["Cancel", "Yes, remove it"],
    dangerMode: true,
  }).then((willRemove) => {
    if (willRemove) {
      var f = new FormData();
      f.append("c", cartId);

      var r = new XMLHttpRequest();

      r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
          var response = r.responseText;
          swal("Good job!", response, "success").then(() => {
            window.location.reload();
          });
        }
      };

      r.open("POST", "removeCartProcess.php", true);
      r.send(f);
    }
  });
}

function watchlist() {


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      document.getElementById("pid").innerHTML = response;
      
    }
  };

  r.open("POST", "watchlistProcess.php", true);

  r.send();
}

function removeWatchlist(){
  
}
