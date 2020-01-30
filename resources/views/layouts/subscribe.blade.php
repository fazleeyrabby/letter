<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css">
    <title>Project One</title>
</head>
<body>

<div id="menu-bar">
    <div id="menu" onclick="onClickMenu()">
        <div id="bar1" class="bar"></div>
        <div id="bar2" class="bar"></div>
        <div id="bar3" class="bar"></div>
    </div>
    <ul class="nav" id="nav">
        <li><a href="{{route('front')}}">Home</a></li>
        <li><a href="{{route('subscribe')}}">FAQs</a></li>
        <li><a href="{{route('subscribe')}}">Subscribe</a></li>
        <li><a href="{{route('subscribe')}}">Resources</a></li>
        <li><a href="{{route('subscribe')}}">Our Team</a></li>
        <li><a href="{{route('subscribe')}}">Archives</a></li>
        <li><a href="{{route('subscribe')}}">Member</a></li>
        <li><a href="{{route('subscribe')}}">Contact Us</a></li>
    </ul>
</div>
<div class="menu-bg" id="menu-bg"></div>
<div class="toparea-text">
    <div class="top-text">
        <h2>MONEYLETTER.&reg;<span class="subtext">com</span> </h2>
        <p>"Serving Investors Since 1980s"</p>
    </div>
</div>
<div class="member-img">
    <img src="{{asset('assets/frontend/')}}/img/group-of-people-standing-beside-chalk-board-3184394.jpg" alt="">
</div>

<div class="membertext">
    <h1>Investing in mutual funds and ETFs <br> makes sense for almost everyone</h1>
    <p>...and Moneyletter is for everyone who’s invested in mutual funds or ETFs</p>
    <h1 class="subscribe">Subscribe Today !</h1>
    <h2>Get immediate electronic access to every issue</h2>
    <p class="quote">“Mutual funds are one of the best investments <br> ever created because they’re really cost-efficient and <br> very easy to invest in...”  <sub>—Dustin Woodward</sub> </p>
</div>

<div class="member-body">
    <div class="framearea">
        <div class="card-area">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{asset('assets/frontend/')}}/img/man-wearing-white-and-blue-pinstriped-dress-shirt-holding-936135.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{asset('assets/frontend/')}}/img/person-holding-silver-iphone-7-887751.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{asset('assets/frontend/')}}/img/business-charts-commerce-computer-265087.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="form">
        <div class="formarea">
            <div class="form-heading">
                <h2>Your Information</h2>
            </div>
            <form action="/action_page.php">
                <label for="name">Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="address">Address</label>
                <input type="text" id="lname" name="lastname" placeholder="Your address..">

                <label for="city">City</label>
                <input type="text" id="lname" name="city" placeholder="Your city..">

                <label for="city">Password</label>
                <input type="password" id="lname" name="password" placeholder="Password..">

                <label for="city">Confirm Password</label>
                <input type="password" id="lname" name="password" placeholder="Confirm Password..">

                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Your zip..">
                <label for="state">State</label>
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>

                <label for="emailaddress">Email Address</label>
                <input type="text" id="email" name="email" placeholder="Your email address..">

                <h2>How much would you liked to save ?</h2>
                <label class="container">BEST DEAL! 2 years (24 issues) of Moneyletter for just $229. Save $121!
                    <input type="radio" checked="checked" name="radio">
                    <span class="checkmark"></span>
                </label>
                <label class="container">GREAT DEAL! 1 year (12 issues) of Moneyletter for $129. Save $51
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>
                <label class="container">First time self-managers 6 months (6 issues) for $70
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>

                <h3 class="delivery">Delivery method</h3>
                <select id="delivery" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
                <label class="container">Don’t Forget! 1 year of Moneyletter Plus for $97 (electronic delivery only). Get the most out of your Moneyletter subscribption with this weekly newsletter supplement.
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label>

                <h3 class="delivery">Payment choice</h3>
                <select id="delivery" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
                <p class="payment">Please be sure to use your PayPal email in the form, above, if you are using PayPal for your subscription.</p>

                <div class="paymentcard">
                    <div class="paymentimg">
                        <img src="{{asset('assets/frontend/')}}/img/visacard.png" alt="">
                    </div>
                    <div class="paymentimg">
                        <img src="{{asset('assets/frontend/')}}/img/mastercard.jpg" alt="">
                    </div>
                    <div class="paymentimg">
                        <img src="{{asset('assets/frontend/')}}/img/americanexpress.png" alt="">
                    </div>
                    <div class="paymentimg">
                        <img src="{{asset('assets/frontend/')}}/img/paypal-logo-png-4.png" alt="">
                    </div>
                </div>
                <div class="btn-subscribe">
                    <button type="button" class="btn btn-success">Subscribe <br>and start to building your wealth !</button>

                </div>
            </form>
        </div>

    </div>
</div>

<div class="moneyletterimg">
    <img src="{{asset('assets/frontend/')}}/img/monyletterpic.JPG" alt="">
</div>
<div class="navbar">
    <a href="#home" class="active">Home</a>
    <a href="#news">FAQs</a>
    <a href="#contact">Contact</a>
    <a href="#contact">Subscribe</a>
    <a href="#contact">Experts</a>
    <a href="#contact">Archives</a>
    <p class="footer-text">Powered by &copy; Galayx Global IT</p>
</div>

<script src="{{asset('assets/frontend/')}}/js/main.js"></script>
</body>
</html>
