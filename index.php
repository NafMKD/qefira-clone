<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.container{
			position: absolute;
			top: 20%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		.dot-container{
			display: flex;
			align-items: center;
			justify-content: space-between;
			width: 120px;
		}
		.dot{
			width: 24px;
			height: 24px;
			border-radius: 50%;
			background: gray;
		}
		.dot-1{
			animation-name: flow;
			animation-duration: .4s;
			animation-timing-function: ease;
			animation-delay: 0s;
			animation-iteration-count: infinite;
			animation-direction: alternate;
		}
		.dot-2{
			animation: flow .4s ease .2s infinite alternate;
		}
		.dot-3{
			animation: flow .4s ease .4s infinite alternate;
		}
		@keyframes flow {
			from{
				opacity:1;
				transform: scale(1.2);
			}
			to{
				opacity: .9;
				transform: scale(.75);
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="dot-container">
			<div class="dot dot-1"></div>
			<div class="dot dot-2"></div>
			<div class="dot dot-3"></div>
		</div>
	</div>

	<div style="margin-top: 15%; text-align: center;" >
		<h1>Checking your browser before accessing Qefira-clone </h1>
		<h3>This process is automatic. Your browser will redirect to qefira-clone shortly</h3>
		<h4>Please allow up to 5 seconds.</h4>
	</div>


	<script>
		window.setTimeout(function(){
			window.location.href = "public/";

		}, 3000);
	</script>
</body>
</html>