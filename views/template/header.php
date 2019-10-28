<!DOCTYPE html>
<html ng-app="myapp">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Maisya Jewellery Indonesia</title>
    <meta name="description" content="Maisya Jewellery Indonesia Portal in Indonesia" />
    <meta name="viewport" content="width=device-width">
    <meta name="Keywords" content="Maisya Jewellery Indonesia Portal in Indonesia" />
    <link rel="image_src" href="img/logo.png" />
    <meta property="og:title" content="Maisya Jewellery Indonesia Online Jewellery Portal in Indonesia"/>
    <meta property="og:image" content="img/logo.png"/>
    <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name=HandheldFriendly content=true />
	<meta name=apple-mobile-web-app-capable content=YES />	
	<link rel="icon" href="img/logo.ico" type="image/x-icon" />

	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/slider.css" />	
	<link href="<?php echo base_url() ?>/assets/css/skdslider.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/jq_ui/jquery-ui.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/simplePagination.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/tagInput.css"/>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/pretty-checkbox.min.css"/>
	
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
	
	<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-datetimepicker.min.css"/>


	
	<script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/custom.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/tagInput.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/skdslider.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/jq_ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/jquery.simplePagination.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
	<script>
		var  base_url = '<?php echo base_url() ?>';
	</script>
	
	<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
		apiKey: "AIzaSyBQ3Tpgkv3FJOmuRTSnTmmDrig-VWc083c",
		authDomain: "loginfacebook-645f1.firebaseapp.com",
		databaseURL: "https://loginfacebook-645f1.firebaseio.com",
		projectId: "loginfacebook-645f1",
		storageBucket: "",
		messagingSenderId: "71131831482"
	  };
	  firebase.initializeApp(config);
	  
	  
		function fblogin(){
			var provider = new firebase.auth.FacebookAuthProvider();
	  
			provider.addScope('email');
	  
			provider.setCustomParameters({
				'display': 'popup'
			});
		
			firebase.auth().signInWithPopup(provider).then(function(result) {
				var token 			= result.credential.accessToken;				
				
				var fullname		= result.user.displayName;
				var email			= result.user.email;
				var phoneNumber		= result.user.phoneNumber;
				var photoURL		= result.user.photoURL;
				
				$.post( base_url+"home/loginfromfb", { fullname: fullname, email: email,phoneNumber: phoneNumber, photoURL: photoURL })
				  .done(function( data ) {
					location.href=data;
				});
				
				
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  // ...
			});
		};
		
		function googlelogin(){
			var provider = new firebase.auth.GoogleAuthProvider();
			provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
			
			firebase.auth().signInWithPopup(provider).then(function(result) {
			  // This gives you a Google Access Token. You can use it to access the Google API.
			  var token = result.credential.accessToken;
			  // The signed-in user info.
			  var user = result.user;
				console.log(user);
				var fullname		= result.user.displayName;
				var email			= result.user.email;
				var phoneNumber		= result.user.phoneNumber;
				var photoURL		= result.user.photoURL;
				
				$.post( base_url+"home/loginfromgoogle", { fullname: fullname, email: email,phoneNumber: phoneNumber, photoURL: photoURL })
				  .done(function( data ) {
					location.href=data;
				});
			}).catch(function(error) {
			  // Handle Errors here.
			  var errorCode = error.code;
			  var errorMessage = error.message;
			  // The email of the user's account used.
			  var email = error.email;
			  // The firebase.auth.AuthCredential type that was used.
			  var credential = error.credential;
			  // ...
			});
		}
		/*
		*/
		/*
		firebase.auth().signOut().then(function() {
  // Sign-out successful.
}).catch(function(error) {
  // An error happened.
});*/
	</script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122881501-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-122881501-1');
	</script>

	
  </head>
	<body>