<!DOCTYPE html>
<html>
<head>
	<title>GoPark</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../public/style.css">
	<script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
	<div class="container">
		
		<div class="login-content">
			<form action="/server" method="GET">
				<img class="img1" src="./assets/not_enhanced">

				<div class="wrapper">
                    <div class="title">
                        <h2 id="animated-text">Welcome</h2>
                    </div>
                </div>

           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" id="emaile" name="Email" autocomplete="off" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" id="pass" name="password" class="input" required>
            	   </div>
            	</div>
            	<a class="a" href="./index.html">Forgot Password?</a>
            	<input type="submit" value="login" class="btn" onclick="save_email()">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./index.js"></script>
	<script>
		const animatedElements = document.querySelectorAll('.animate-on-scroll');
		const observer_logo = new IntersectionObserver(entries => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('animation-started');
					observer_logo.unobserve(entry.target);
				}
			});
		});
		animatedElements.forEach(element => {
			observer_logo.observe(element);
		});
		const animatedText = document.getElementById('animated-text');
		const observer = new IntersectionObserver(entries => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					animatedText.classList.add('animate-text');
					observer.disconnect();
				}
			});
		});
		observer.observe(animatedText);
				ScrollReveal({
					reset: true,
					distance: "50px",
					duration: 1500,
					delay: 200,
				});
        ScrollReveal().reveal('.login-content', {delay: 200});
        </script>
</body>
</html>