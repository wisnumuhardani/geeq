//FOR LOGIN FIREBASE
// Initialize Firebase
  var config = {
    apiKey: "AIzaSyBM4RX5tRX27Hyf3a0Fy5nrWglVDrYcd_o",
    authDomain: "geeq-5e09c.firebaseapp.com",
    databaseURL: "https://geeq-5e09c.firebaseio.com",
    storageBucket: "geeq-5e09c.appspot.com",
    messagingSenderId: "24169273576"
  };
  firebase.initializeApp(config);

// [START buttoncallback]
function toggleSignInGoogle() {
  if (!firebase.auth().currentUser) {
    // [START createprovider]
    var provider = new firebase.auth.GoogleAuthProvider();
    // [END createprovider]
    // [START addscopes]
    provider.addScope('https://www.googleapis.com/auth/plus.login');
    // [END addscopes]
    // [START signin]
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;     
      var tokenVal =$("#csrf_token_name").val();
		    // Send the request  
        var formData = {  csrf_token  : tokenVal  , 
                          email :  user.providerData[0].email, 
                          uid : user.providerData[0].uid,
                          displayName : user.providerData[0].displayName,
                          photoURL : user.providerData[0].photoURL,
                          providerId : user.providerData[0].providerId 
                        };          
        $.ajax({
            url : "/login/sosmed",
            type: "POST",
            data : formData,
            dataType : "json",            
            success: function(data)
            {                 
                //alert(data);
                if(data.message == 'success') {
                  location.reload();
                }
                //data - response from server
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
        });
      // [START_EXCLUDE]
      //document.getElementById('quickstart-oauthtoken').textContent = token;
      // [END_EXCLUDE]
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // [START_EXCLUDE]
      if (errorCode === 'auth/account-exists-with-different-credential') {
        alert('You have already signed up with a different auth provider for that email.');
        // If you are using multiple auth providers on your app you should handle linking
        // the user's accounts here.
      } else {
        console.error(error);
      }
      // [END_EXCLUDE]
    });
    // [END signin]
  } else {
    // [START signout]
    firebase.auth().signOut();
    // [END signout]
  }
  // [START_EXCLUDE]
  //document.getElementById('quickstart-sign-in').disabled = true;
  // [END_EXCLUDE]
}
// [END buttoncallback]

// [START buttoncallback]
function toggleSignInFacebook() {
  if (!firebase.auth().currentUser) {
    // [START createprovider]
    var provider = new firebase.auth.FacebookAuthProvider();
    // [END createprovider]
    // [START addscopes]
    provider.addScope('public_profile');
    provider.addScope('email');

    // [END addscopes]
    // [START signin]
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      //console.log(JSON.stringify(user, null, '  '));

      var tokenVal =$("#csrf_token_name").val();
        // Send the request  
        var formData = {  csrf_token  : tokenVal  , 
                          email :  user.providerData[0].email, 
                          uid : user.providerData[0].uid,
                          displayName : user.providerData[0].displayName,
                          photoURL : user.providerData[0].photoURL,
                          providerId : user.providerData[0].providerId 
                        };          
        $.ajax({
            url : "/login/sosmed",
            type: "POST",
            data : formData,
            dataType : "json",            
            success: function(data)
            {                 
                //alert(data);
                if(data.message == 'success') {
                  location.reload();
                }
                //data - response from server
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);
            }
        });

      // [START_EXCLUDE]
      //document.getElementById('quickstart-oauthtoken').textContent = token;
      // [END_EXCLUDE]
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // [START_EXCLUDE]
      if (errorCode === 'auth/account-exists-with-different-credential') {
        alert('You have already signed up with a different auth provider for that email.');
        // If you are using multiple auth providers on your app you should handle linking
        // the user's accounts here.
      } else {
        console.error(error);
      }
      // [END_EXCLUDE]
    });
    // [END signin]
  } else {
    // [START signout]
    firebase.auth().signOut();
    // [END signout]
  }
  // [START_EXCLUDE]
  //document.getElementById('quickstart-sign-in').disabled = true;
  // [END_EXCLUDE]
}
// [END buttoncallback]
