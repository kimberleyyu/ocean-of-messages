ocean-of-messages
=================

Website (oceanofmessages.com) created by Kimberley Yu and Jocelyn Fu

Documentation for oceanofmessages.com

Welcome to Ocean of Messages, where you'll find a virtual ocean of thoughts and emotions awaiting! Here, you can write about anything on your mind -- happy stories, sad thoughts, urgent rants -- and drop them into a bottle, to be cast out into our sea and picked up by another across the world. Simply register to begin your journey~

Once registered and logged in, you'll find yourself at the home page, where a vast and beautiful ocean of messages lies before you, the keen thinker ready to pick up or drop in a bottled message. Calming ocean music will fill your ears -- to turn it off, simply click the stop button at the top right of the ocean's sky.
Now you have to make a choice: catch another's message, or write one?

In our ocean, you'll see bottled messages drifting ashore. To catch one, simply grab your net at the top left corner of the ocean, labeled "Catch a bottle?", and a message will pop up before you. Read it, and understand the perhaps deep, emotional, or light-hearted thoughts of another. Then, choose to reply in the space below (kind thoughts only!) or throw the message back into the ocean for someone else to reply.

To write your own message, simply grab your bottle and paper at the top right corner of the screen, labeled "Write a message?", and space to write your message will pop up before you. Feel free to say anything on your mind (but please no profanity!), whether you want to share a story, release your frustration, or spill out bottled secrets. Rest assured, all messages will drift across our ocean anonymously.

To check on your bottles, click the "My Bottles" icon above the ocean. Here, you'll find a list of all messages you've ever written, and whether they've been picked up and replied to by another person. Get ready to laugh, smile, and/or feel consoled when you read the replies to the bottles you've thrown out to sea.
And that's about it! Click on the "Instructions" icon anytime to re-read these instructions, and change your password or log out by clicking on the icons at the top of the screen.
Note: Please use the Google Chrome browser to view our project.

Design for oceanofmessages.com

We used a SQL database, with 2 tables for our messages (“messages”) and users (“users”). The messages table contains a field called “user_id”, matching the “id” field in the users table, to identify which user the message belongs to in the users table.

To implement our project, we set up 3 main folders: includes, oceanofmessages.com, and templates. The includes folder is similar to CS50 Finance, and contains config.php, constants.php, and functions.php. The oceanofmessages.com folder is our public, webroot folder, and contains our “controller” files. The templates folder contains our “view” files that control the aesthetics of the page.

Within the main oceanofmessages.com folder, we have index.php, which renders the ocean.php template. This page is for the main home page, where the user can catch and write messages. At the top of ocean.php (as with all other template files to be accessed when logged in), there are links to the other pages on the site. Ocean.php also contains the main div (id=ocean), where everything belonging to the home page is. Within this div, we link to ocean.js.
Ocean.js controls all of the JavaScript for our site. It has 2 main functions, to pick up and throw in bottled messages:

To pick up a message, it inserts an image of a fishing net, and utilizes ajax to call the pickup.php file when that image is clicked. Pickup.php randomly selects a message from our SQL database (but not ones that belong to the current user or ones that have already been replied to), and passes the data for this message back to the ajax call in ocean.js. Ocean.js then replaces a div (id=pickup) within the main ocean div with html for a modal window to pop up, when the image is clicked. This modal window prints out the message returned by pickup.php, and includes a form to write and submit a reply. The submit button calls the function post_reply(), which utilizes ajax to call the reply.php file, passing data about the current message to it. Reply.php then updates the reply fields of that message in the SQL database.

To throw in a message, it inserts an image of a bottled message, and appends html for a modal window to pop up when that image is clicked. This modal window includes a form to write and submit a message. The submit button uses ajax/jQuery function to call the throwin.php file, passing the message written to it. Throwin.php inserts the message into our SQL database.

The oceanofmessages.com folder also contains the bottle.php file, which selects for all the rows of our messages and passes the number, message, and reply fields of a row to the bottle.php template. This template then displays all of these fields for the logged in user with an html table.
The doc.php file, which renders the doc.php template, contains our documentation for the project and instructions for the website.
Like CS50 Finance, there are also files to log in, register, log out, and change your password.
Our project is hosted by DreamHost and is live on the web for anyone to register!
