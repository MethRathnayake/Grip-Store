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

function removeWatchlist(x){
  var stock_id = x;
  var f = new FormData();
  f.append("s" , stock_id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      if (response == "done") {
        Swal.fire({
          title: "Success",
          text: "Removed from your watchlist",
          icon: "success",
          background: "#1e1e1e",
          color: "#ffffff",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        }).then(() => {
          window.location.reload();
        });

      }else{
        alert("Something Went Wrong");

      }
      
    }
  }

  r.open("POST", "watchlistRemove.php", true);

  r.send(f);

}

function increaseQty() {
  var qty = document.getElementById('qty');
  qty.value = parseInt(qty.value) + 1;
}

function decreaseQty() {
  var qty = document.getElementById('qty');
  if (qty.value > 1) {
    qty.value = parseInt(qty.value) - 1;
  }
}

function addtowatchlist(stockid) {
  var stock_id = stockid;
  var f = new FormData();
  f.append("s" , stock_id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      if (response == "done") {
        swal({
          title: "Success!",
          text: "Added to your Watchlist",
          icon: "success",
          button: "OK!",
        });
          
      } else if (response == "already have") {
        swal({
          title: "Failed!",
          text: "Already in your Watchlist!",
          icon: "warning",
          button: "OK!",
        });
      } else {
          alert(response);
      }
  }
  
  }

  r.open("POST", "addToWatchlistProcess.php", true);

  r.send(f);

}

function updateProfile(){
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var username = document.getElementById("username").value;
  var mobile = document.getElementById("mobile").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var address = document.getElementById("address").value;
  var city = document.getElementById("city").value;
  var postalCode = document.getElementById("postalCode").value;
  var pro_img = document.getElementById("file-input");

  // alert(pro_img);
  // alert(firstName);
  // alert(lastName);
  // alert(username);
  // alert(mobile);
  // alert(password);
  // alert(confirmPassword);
  // alert(address);
  // alert(city);
  // alert(postalCode);

  var f = new FormData();
  f.append("f" , firstName);
  f.append("l" , lastName);
  f.append("u" , username);
  f.append("m" , mobile);
  f.append("p" , password);
  f.append("c" , confirmPassword);
  f.append("a" , address);
  f.append("city" , city);
  f.append("po" , postalCode);
  f.append("img" , pro_img.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function (){
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      // alert(response);

      if (response == "success") {
        swal("Good job!", "Profile Updated Successfully!", "success").then(() => {
          window.location.reload();
        });
      } else {
        document.getElementById("alertDiv").className = "d-block";
        document.getElementById("msgDiv").innerHTML = response;
      }

    }

   
  }


  r.open("POST", "profileProcess.php", true);
  r.send(f);



}

function addtocart(x){
  var stock_id = x;
  var qty = document.getElementById("qty").value;
  var f = new FormData();
  f.append("s" , stock_id);
  f.append("q" , qty);


  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      if (response == "success") {
        swal("Good job!", "Added to Cart Successfully!", "success")
      }else{
        alert(response);
      }
  }
  
  }

  r.open("POST", "addToCartProcess.php", true);

  r.send(f);  
}

function loadOrders(){
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      document.getElementById("order_body").innerHTML = response;
    }
  };

  r.open("POST", "loadOrdersProcess.php", true);
  r.send();
}

function checkout(){
  var f = new FormData();
  f.append("c", true);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      alert(response);
      // if (response.status == "success") {
      //   window.location.href = response.checkout_url;
      // } else {
      //   console.error("Error: , response.message");
      //   alert("Error:", response.message);
      // }
    }
  };

  r.open("POST", "paymentProcess.php", true);
  r.send(f);
}

function paymentprocess() {

  var first_name = document.getElementById("fn").value;
  var last_name = document.getElementById("ln").value;
  var amount = document.getElementById("amount").value;
  amount = parseInt(amount)


var f = new FormData();

f.append("a" , amount);


var r = new XMLHttpRequest();

r.onreadystatechange = function () {
  if (r.readyState == 4 && r.status == 200) {
    var response = r.responseText;
    var obj = JSON.parse(response);

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
      console.log("Payment completed. OrderID:" + orderId);
      // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
      // Note: Prompt user to pay again or show an error page
      console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
      // Note: show an error page
      console.log("Error:" + error);
    };

    // Put the payment variables here
    var payment = {
      sandbox: true,
      merchant_id: "1228760", // Replace your Merchant ID
      return_url: "http://localhost/payhere/payhere.html", // Important
      cancel_url: "http://localhost/payhere/payhere.html", // Important
      notify_url: "http://sample.com/notify",
      order_id: obj["order_id"],
      items: "Chuula",
      amount: obj["amount"],
      currency: obj["currency"],
      hash: obj["hash"], // *Replace with generated hash retrieved from backend
      first_name: first_name,
      last_name: last_name,
      email: "meth.rathnayake2007@gmail.com",
      phone: "0705397355",
      address: "No.107/6/1, Gongithota Road , Endermaulla",
      city: "Wattala",
      country: "Sri Lanka",
      delivery_address: "No.107/6/1, Gongithota Road , Endermaulla",
      delivery_city: "Wattala",
      delivery_country: "Sri Lanka",
      custom_1: "",
      custom_2: "",
    };

    payhere.startPayment(payment);
    
  }
};



r.open("POST", "paymentprocess.php", true);
r.send(f);
}
