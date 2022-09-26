
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8">
    <title>Homepage</title>
    <style>
    	*{
    		margin: 0;
    		padding: 0;
    		box-sizing: border-box;
    	}

    	body{
    		height: 100vh;
    		display: -webkit-box;
    		display: -ms-flexbox;
    		display: flex;
    		-webkit-box-pack:center;
    		-ms-flex-pack:center;
    		justify-content: center;
    		align-items: center;
    		perspective: 1000px;
    		transform-style: preserve-3d;
    		position: relative;
    		background-color: #111;
    		font-family: arial;
			background-image:url('3.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
            background-size: 99% 99%;
    	}

    	.container{
    		min-height: 350px;
    		min-width: 700px;
    		border-radius: 20px;
    		position: relative;
    		transition: 1.5s ease-in-out;
    		transform-style: preserve-3d;
			
           
    	}

    	.side{
    		position: absolute;
    		text-align: center;
    		width: 100%;
    		height: 100%;
    		padding: 20px 50px;
    		color: black;
    		transform-style: preserve-3d;
    		backface-visibility: hidden;
    		border-radius: 20px;
    	}

    	content{
    		transform: translateZ(700px);
    		scale(100);
    		line-height: 500em;
			
    	}

    	.content h1{
    		position: relative;
    		font-size: 50px;
            top: 
    		font-family: arial;
			font-color : black;
    	}

    	.content h1:before{
            content:"";
            position: absolute;
        
            bottom: -20px;
            height: 3px;
            background-color: black;
            width: 250px;
            left: 50%;
            transform: translateX(-50%);
    	}

    	.front{
    		z-index: 2;
    		position: absolute;
            background-size: cover;
    		background-size: 155vh;
    		color: black;
            text-align: center
    	}

    	.back{
    		background-color: #333;
    		transform: rotateY(180deg);
    		z-index: 0;
    		padding-top: 10px;
    		background-image: url(2.jpg);
    		background-size: 99% 99%;
    	}

    	.container:hover{
    		transform: rotateY(180deg);
    	}

    	.back h1{
    		margin: 0;
    	}

    	form label, form input{
    		display: block;
    	}

    	form input, form textarea{
    		background: transparent;
    		border: 0;
    		border-bottom: 2px solid white;
    		padding: 5px;
    		width: 100%;
    		color: white;
    		outline: none;
    	}

    	

        form input{
           font-size: 20px; 
        }
        
        
    	form input[type="admin"]
        {
            border: none;
            height: 40px;
            outline: none;
            width: 288px;
            background: #C0392B;
            font-size: 35px;
            border-radius: 20px;
            padding: 10px px;
            position: absolute;
			text-position:15px;
            top: 150px;
			test-alain: center;
            left: 200px;
            color: #000;
            
    	}
        
        form input[type="admin"]:hover
        {
           cursor: pointer;
           background: #ffc107;
           color: #000;  
        }
		
		form input[type="user"]
        {
            border: none;
            height: 40px;
            outline: none;
            width: 288px;
            background: #C0392B;
            font-size: 35px;
            border-radius: 20px;
            padding: 10px px;
            position: absolute;
            top: 230px;
            left: 200px;
            color: #000;
            
    	}
        
        form input[type="user"]:hover
        {
           cursor: pointer;
           background: #ffc107;
           color: #000;  
        }
       
		#x{
		text-align:center;
		}
		
		#y{
		text-align:center;
		}
        




    </style>
    </head>
<body>
    <div class="container">
        <div class="front side">
        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
            <div class="content">
            	<h1>Electricity Billing System</h1>
            </div>
        </div>
        <div class="back side">
        	<div class="content">
        		<h1>Choose Here</h1>
        		<form action="">
        			 
        			<a href="adminlogin.php"><input id="x" type="admin" name="" value="Admin">
					
					<a href="user.php"><input id="y" type="user" name="" value="User">
        		</form>
				
        	</div>
        </div>
    </div>

    </body>    
</html>