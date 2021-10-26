<?php
include_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Web</title>
    <link rel="stylesheet" href="myWeb.css">
	<link rel="stylesheet" href="card.css">
    <link rel="stylesheet" href="fontawesome-free-5.15-2.4-web/css/all.css">
</head>

<body>
<div id = "toast" ></div>
    <div class = "app">
        <div class="flxed">
            <header class="header">
                <div class="grid">

                    <nav class="header__navbar">
                        <ul calss = "header__navbar--list">
                            <li class="header__navbar--item">Welcome to Adam & Eve Fashion Store</li>
                        </ul>
        
                        <ul class="header__navbar--list">
                            <li class="header__navbar--item">
                                <i class="fas fa-bell"></i>
                                <a href="#" class="header__navbar--item--link">To help</a>
                            </li>
                            <?php
                            if (isset($_SESSION['USER'])) {?>
                                <li class="header__navbar--item " onclick=" profile()">
                                    <i class="fas fa-user-circle"></i>
                                    <div   class="header__navbar--item--link header__blod"><?= ($_SESSION['USER']);?></div>

                                </li>

                                <div  id ="showUpdate">
                                   
                                    <form action="update_user.php" method = "POST" class="update">
                                        <h2 >Change my information</h2>

                                        <div >
                                        <i class="fas fa-user"></i>
                                        <input type="firdstName" placeholder="Firstname" name = "firstname" value = <?= $_SESSION['Fname']; ?> >
                                        </div>

                                        <div >
                                        <i class="fas fa-user"></i>
                                        <input type="lastName" placeholder="Lastname" name = "lastname" value = <?= $_SESSION['Lname'] ?> >
                                        </div>

                                        <div >
                                        <i class="fas fa-user"></i>
                                        <input type="text" placeholder="Username" name = "username" value = <?= $_SESSION['USER']; ?> >
                                        </div>
                                        <div >
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" placeholder="Email" name = "email" value = <?= $_SESSION['Email']; ?> >
                                        </div>

                                        <div >
                                        <i class="fas fa-phone-square-alt"></i>
                                        <input type="telephone" placeholder="Telephone" name = "telephone" value = <?= $_SESSION['Telephone']; ?> >
                                        </div>

                                        <div >
                                        <i class="fas fa-lock"></i>
                                        <input type="password" placeholder="Password" name = "password" value = <?= $_SESSION['Pass']; ?> >
                                        </div>
                                        <div>
                                        <input type="hidden" name = "Id" value = <?= $_SESSION['ID']?> placeholder = "">
                                        <input id = "a" type = "submit" name = "update_acount" value = "Update">
                                        </div>
                                    </form>

                                    
                                </div>

                                <li class="header__navbar--item ">
                                    <a href="logout.php" class="header__navbar--item--link header__blod">Logout</a>
                                    <i class="fas fa-sign-out-alt"></i>
                                </li>
                                
                            <?php    
                            }else {?>
                            <li class="header__navbar--item ">
                                <i class="fas fa-user-circle"></i>
                                <a href="html-login-register.php" class="header__navbar--item--link header__blod">Login</a>
                            </li>
                           <?php }?>
                          
                        </ul>
                    </nav>
                    
                    <div class="header--with--seach">
                        <!-- header with seach -->
                        <div class="header__logo">
                            <svg class="logo">
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="90%" y2="0%">
                                    <stop offset="0%"
                                    />
                                    <stop offset="90%"
                                    />
                                    </linearGradient>
                                </defs>
                                <ellipse class ="logo--item" cx="90" cy="35" rx="85" ry="35" fill="#7A7575" />
                                <text fill="#0BC0CF" font-size="25"
                                x="30" y="40">FACSHION</text>
                                Sorry, your browser does not support inline SVG.
                            </svg>
                        </div>
    
                        <div class="header__seach">
                            <input type=" text" class="header__seach--input" placeholder = "To Seach">
                            <div class = "header__seach--select">
                                <span class="header__seach--select--label">Fashion shop</span>
                                <i  class="header__seach--select--icon fas fa-caret-down"></i>
                            </div>
                            <button class="header__seach-btn">
                            <i class="header__seach-btn--icon fas fa-search"></i>
                            </button>
                        </div>
                            <!-- cart -->
                        <div class="header__cart">
                            <div class="header__cart--wrap">
                                <a onclick="showcart()"  href="#">
                                    <i class="header__cart--icon fas fa-cart-arrow-down"></i>
                                    <span id = "count" class="header__cart-notice">0</span>  
                                </a>
                                <!-- table cart -->
                                <div class="header__cart-list cart-list">
                                    <div class="table__cart--list">
                                        <div id = "showcart">
                                            <table class = "mycart" >
                                                <tr>
                                                    <th>STT</th>
                                                    <th>fashion model</th>
                                                    <th>product type</th>
                                                    <th>Product's name</th>
                                                    <th>price</th>
                                                    <th>quantity</th>
                                                    <th>Remove</th>
                                                </tr>
                                                <tbody id="mycart"></tbody>                                                
                                            </table>
                                            <button id="remove__all" onclick="removeAll()" >Reomve All</button>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <!-- menu -->
                    <div class = "menu">
                        <nav class="menu__row">
                            <ul class="menu-list">
                                <li class="menu--item">
                                    <a class = "menu--option"  href="">
                                        <i class="fas fa-house-damage"></i>
                                    </a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" id = "new" href="#">New</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Women</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Men</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Children</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Shoes</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Watches</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Bags</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
            </header>
        </div>
    
    </div>
        <!-- product -->
        <div class = "container">
            <div class="container__grid">
                <div id = "product-new">
                    <div class = "new--card">
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/85/96/75/16859675_33906777_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Off-White Kids</a>
                                    <a class = "new--demo" href="#">diagonal print long-sleeve T-shirt </a>
                                    <div class="new--price">$ <span>395</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)" >Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-static.farfetch-contents.com/cms-cm/vn/media/2608448/data/71a04bb85ac465eb9efb143b3b1b6850.jpg?ratio=3x4_three-columns&minWidth=409" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Gucci</a>
                                    <a class = "new--demo" href="#">logo-patch belted denim dress</a>
                                    <div class="new--price">$<span>395</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)" >Add to cart</button>
                                </div> 
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/86/53/70/16865370_34950526_480.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Maison Margiela</a>
                                    <a class = "new--demo" href="#">high-waisted straight-legged jeans</a>
                                    <div class="new--price">$<span>1195</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/14/23/02/71/14230271_20133588_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Gucci Kids</a>
                                    <a class = "new--demo" href="#">GG logo print jumper</a>
                                    <div class="new--price">$<span>1239</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/87/31/72/16873172_35306152_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Rick Owens</a>
                                    <a class = "new--demo" href="#">Bozo Tractor leather boots</a>
                                    <div class="new--price">$<span>495</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/21/03/68/16210368_30786379_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Rick Owens</a>
                                    <a class = "new--demo" href="#">chunky low-top sneakers</a>
                                    <div class="new--price">$<span>393</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>            
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/65/22/56/16652256_35289082_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Rick Owens</a>
                                    <a class = "new--demo" href="#">Club leather clutch bag</a>
                                    <div class="new--price">$<span>678</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>                      
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/20/97/97/16209797_30785376_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Rick Owens</a>
                                    <a class = "new--demo" href="#">Larry v-neck shirt</a>
                                    <div class="new--price">$<span>890</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>                       
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/17/05/89/35/17058935_34203117_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Bottega Veneta</a>
                                    <a class = "new--demo" href="#">Maxi Intrecciato messenger bag</a>
                                    <div class="new--price">$<span>2345</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/17/30/11/25/17301125_35698615_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Rolex</a>
                                    <a class = "new--demo" href="#">2021 unworn Datejust 36mm</a>
                                    <div class="new--price">$<span>309800</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/17/04/23/27/17042327_34170536_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">TUDOR</a>
                                    <a class = "new--demo" href="#">2021 Black Bay Chrono 41mm</a>
                                    <div class="new--price">$<span>1234</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                        <section class="new--card-1">
                            <div class="new-item">
                                <div class="new-info">
                                    <a href="#">
                                        <img class ="card-img" src="https://cdn-images.farfetch-contents.com/16/83/16/26/16831626_33994681_1000.jpg" alt="">
                                    </a>
                                    <a class ="new--type" href="#">Frédérique Constant</a>
                                    <a class = "new--demo" href="#">Vintage Rally Healey 39mm</a>
                                    <div class="new--price">$<span>8909</span></div>
                                    <input class="new-number" type="number" name="soluong" min="1" max="10" value="1">
                                    <button class="new--add" onclick = "addCart(this)">Add to cart</button>
                                </div>
                            </div>
                        </section>
                                             
                    </div>
                </div>
            </div>
        </div>
<!-- footer -->
        <footer class=  "footer">
            <div class="footer__grid">
                <div class="grid-row">
                    <div class="grid-row-footer ntn--footer">
                        <h3 class="footer-list">Fashion App</h3>
                        <span class="footer-list-4">Farfetch App for iOS and Android</span>
                    </div>
                    <div class="grid-row-footer ntn--footer">
                        <h3 class="footer-list">Destination/Region, Currency and Language</h3>
                        <li class="footer-list-3">
                            <i class="footer-icon fas fa-donate"></i>
                            <div class="footer-icon">dollars $</div>                         
                        </li>
                        <li class="footer-list-2 ">
                            <h5 class="footer-list-2--2">FOLLOW US</h5>
                            <i class="footer-icon-1 fab fa-facebook"></i>
                            <i class="footer-icon-1 fab fa-twitter-square"></i>
                            <i class="footer-icon-3 fab fa-google-plus-square"></i>
                            <i class="footer-icon-4 fab fa-youtube"></i>
                        </li>
                    </div>
                    <div class="grid-row-footer ntn--footer-1">
                        <h3 class="footer-list" >Customer Service</h3>
                        <div class="footer-list--row">
                            <li class="footer-list-1">Help & contact us</li>
                            <li class="footer-list-1">Orders & shipping</li>
                            <li class="footer-list-1">Payment & pricing</li>
                            <li class="footer-list-1">Returns & refunds</li>
                            <li class="footer-list-1">FAQs</li>
                            <li class="footer-list-1">Terms & conditions</li>
                            <li class="footer-list-1">Privacy policy</li>
                            <li class="footer-list-1">Accessibility</li>

                        </div>
                    </div>
                    <div class="grid-row-footer ntn--footer-1">
                        <h3 class="footer-list">ABOUT FACSHION</h3>
                        <div class="footer-list--row" >
                            <li class="footer-list-1">About Us</li>
                            <li class="footer-list-1">Investors</li>
                            <li class="footer-list-1">Fashion Boutique</li>
                            <li class="footer-list-1">Partners</li>
                            <li class="footer-list-1">Affiliate Programme</li>
                            <li class="footer-list-1">Careers</li>
                            <li class="footer-list-1">Fashion Customer</li>
                            <li class="footer-list-1">Promise</li>
                            <li class="footer-list-1">Fashion App</li>
                            <li class="footer-list-1">Sitemap</li>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
       
    </div>
    <script src="myWeb.js"></script>
</body>
</html>