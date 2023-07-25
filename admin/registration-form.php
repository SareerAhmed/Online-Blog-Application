<script type="text/javascript">
    function register_form(){
        //+92300 123567
      // alert("ok");
    var alpha_pattern = /^[A-Z]{1}[a-z]{2,}$/;
    var email_pattern = /^[a-z]{2,6}[0-9]{1,3}[@][a-z]{5,8}[.][a-z]{2,5}$/;
    var cnic_pattern      = /^\d{5}[-][0-9]{7}-\d{1}$/;
    var phone_num_pattern = /^[0-9]{2}\d{3}[ ][0-9]{7}$/;

    var first_name = document.getElementById("first_name").value;
    var middle_name = document.getElementById("middle_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var gender = null;
    var male = document.getElementById("gender_male");
    var female = document.getElementById("gender_female");

    if (male.checked) {
      gender = male.value;
      // alert(male.checked);
    }else if (female.checked) {
      gender = female.value;
      // alert(female.checked);
    }
    var cnic = document.getElementById("cnic").value;
    var phone_number = document.getElementById("phone_number").value;
    var country = document.getElementById("country").value;
    var policies = document.getElementsByClassName("policies");

         var policy_counter = 0;
    for(var i=0;i<policies.length;i++){
     if (policies[i].checked) {
                policy_counter++;
         // console.log(policies[i]);
     }
    }

    var flag = true;

    if (first_name == "") {
            flag = false;
            document.getElementById("first_name_msg").innerHTML = "Please Enter First Name !...";
    }else{
      document.getElementById("first_name_msg").innerHTML = "";

             if (alpha_pattern.test(first_name) == false) {
              flag = false;
            document.getElementById("first_name_msg").innerHTML = " First Name must be like eg: Sherry";
             }  
    }

    if (middle_name != "") {
            
            if (alpha_pattern.test(middle_name) == false) {
              flag = false;
            document.getElementById("middle_name_msg").innerHTML = " Middle Name must be like eg: Santos";
            }else{
      document.getElementById("middle_name_msg").innerHTML = "";
    }
             
    }

    if (last_name == "") {
            flag = false;
            document.getElementById("last_name_msg").innerHTML = "Please Enter Last Name !...";
    }else{
      document.getElementById("last_name_msg").innerHTML = "";

             if (alpha_pattern.test(last_name) == false) {
              flag = false;
            document.getElementById("last_name_msg").innerHTML = " Last Name must be like eg: Wilson";
             }  
    }

    if (email == "") {
            flag = false;
            document.getElementById("email_msg").innerHTML = "Please Enter Email !...";
    }else{
      document.getElementById("email_msg").innerHTML = "";

             if (email_pattern.test(email) == false) {
              flag = false;
            document.getElementById("email_msg").innerHTML = " Email must be like eg: shery12@gmail.com";
             }  
    }

    // if (!gender) {

    //   flag = false;
    //         document.getElementById("gender_msg").innerHTML = "Please Select Gender !...";
    // }else{
    //   document.getElementById("gender_msg").innerHTML = "";
    // }

    // if (cnic == "") {
    //         flag = false;
    //         document.getElementById("cnic_msg").innerHTML = "Please Enter CNIC Number !...";
    // }else{
    //   document.getElementById("cnic_msg").innerHTML = "";

    //          if (cnic_pattern.test(cnic) == false) {
    //           flag = false;
    //         document.getElementById("cnic_msg").innerHTML = " CNIC Number must be like eg: 41303-1234567-1";
    //          }  
    // }

    // if (phone_number == "") {
    //         flag = false;
    //         document.getElementById("phone_number_msg").innerHTML = "Please Enter Phone Number !...";
    // }else{
    //   document.getElementById("phone_number_msg").innerHTML = "";

    //          if (phone_num_pattern.test(phone_number) == false) {
    //           flag = false;
    //         document.getElementById("phone_number_msg").innerHTML = " Phone Number must be like eg: 92300 1234567";
    //          }  
    // }

    // if (country == "") {
    //     flag = false;
    //         document.getElementById("country_msg").innerHTML = "Please Select Country !...";
    // }else{
    //    document.getElementById("country_msg").innerHTML = "";
    // }

    // if (policy_counter != policies.length) {
    //   flag = false;
    //         document.getElementById("policies_msg").innerHTML = "Please Select All Policies !...";
    // }else{
    //    document.getElementById("policies_msg").innerHTML = "";
    // }


          if (flag) {
            return true;
          }else{
      return false;

          }

    }
  </script>


<!-- Modal Registration -->
      <div class="modal fade" id="registration_id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="registration_id">Register Here</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
      <form class="row g-3" method="POST" action="registraion-process.php">
        <div class="col-md-10">
          <label for="validationDefault01" class="form-label">First name</label>
          <input type="text" name="first_name" class="form-control" id="validationDefault01" placeholder="Sareer" required>
        </div>
        <div class="col-md-10">
          <label for="validationDefault02" class="form-label">Last name</label>
          <input type="text" name="last_name" class="form-control" id="validationDefault02"  placeholder="Ahmed" required>
        </div>
        <div class="col-md-10">
          <label for="validationDefaultUsername" class="form-label">Email</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
              <input type="email" name="email" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
          </div>
        </div>
         <div class="col-md-6">
                    <label for="validationTooltipPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <input type="password" name="first_password" class="form-control" id="validationTooltipPassword" aria-describedby="validationTooltipUsernamePrepend" required>
                      <div class="invalid-tooltip">
                        Password Must 8 to 12 Character
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationTooltipPassword" class="form-label"> Confrim Password</label>
                    <div class="input-group has-validation">
                      <input type="password" name="confrim_password" class="form-control" id="validationTooltipPassword" aria-describedby="validationTooltipUsernamePrepend" required>
                      <div class="invalid-tooltip">
                        Password Must 8 to 12 Character
                      </div>
                    </div>
                  </div>      
              
              </div>    
        </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" onclick="return register_form()">Registration</button>
                    <input type="submit" name="register" value="Register" onclick="return register_form()">
                  </div>
                  </form>
                </div>
              </div>
            </div>
<!-- Modal Registration End -->