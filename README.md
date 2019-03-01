# CAFour
This is one of my 2nd year Web Programming Project.


This is a Model View Controller(MVC) Project.
If you are not familiar abour MVC visit [this link](https://www.youtube.com/watch?v=1IsL6g2ixak&feature=youtu.be)


<h1>token.</h1>

![token image](/images/tokener.jpeg)




    This is a snapshot of the token Shopping website
    you are greeted with this when you enter the product manager option in the index

![token image](/images/ProductList.jpeg)



This is the model that will deal with the data being retrieved from the database "wp_ca3_Obadare_Taiwo".
the model is responsible for most of this hence having the most sql queries inside.
Below is an example of the customer database and category
 database connecting to the shop database, make sure you have something like this in tour model folder.

![example](/images/example1.jpeg)



Installations:
[XAMPP link](https://www.apachefriends.org/download.html)

        Before running
1. Make sure you have the wp_ca3_Obadare_Taiwo.sql file imported
2. Install [Xampp]((https://www.apachefriends.org/download.html) or Mammp(OS X)
3. Start MysQl and Apache Actions
4. Import Project
5. Now Run it.

<h2> Model, View and Controller </h2>

<h2> The Model</h2>

![This is Model](/images/model1.jpeg)

The model contains a subdirectory of files such as:
- category_db.php
- customer_db.php
- database.php
- product_db.php

<h3>Example of some of function calls</h3>

    get_customer_name($customer_id)
    add_customers($name, $product_id)
    get_customers()

<h2> The View</h2>

![This is Model](/images/view1.jpeg)

<h3>Visually displayed code example:</h3>

    <h1>Menu</h1>
    <ul>
        <li>
            <a href="product_manager">PRODUCT MANAGER</a>
        </li>


The view subdirectory contains:
- category_nav.php
- footer.php
- header.php
*And also a View*
- product_list.php
- product_add.php
- index.php
- database_error.php


<h2> Lastly, The Controller</h2>

![This is Model](/images/hmm.jpeg)

<h3>Example Code?</h3>

    if ($product_id == NULL || $product_id == FALSE || $category_id == NULL ||
            $category_id == FALSE || $code == NULL || $name == NULL ||
            $price == NULL || $price == FALSE)

The index file controls the actions:

-index.php

<h1>Refrence</h1>

_Murachs Chapter 5 MVC Code._

THANKS FOR INSTALLING!

