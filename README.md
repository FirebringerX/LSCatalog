# LSCatalog
HTML5 Catalog and player for LifeSelector Adult Games

Why use a flash .exe file to play LifeSelector games? Use HTML5 instead in a catalog format so you can browse through your collection and play all from a web interface!!

<b>What are LifeSelector games?</b><br><br>
If you're old enough, you remember those "Choose Your Own Adventure" books (https://en.wikipedia.org/wiki/Choose_Your_Own_Adventure, The Cave of Time was my favorite) where you would read a couple of pages, then you would choose your action and turn to the corresponding page. Some choices led you to an untimely death, some led you to the best ending. Now, imagine that with a sexy adult actress... with video... all POV... in a web browser... man, 2025 is awesome!!! Not quite the level of 3D on a VR headset, but interactive and fun.

**Why does the world need LSCatalog?**<br><br>
No one wants to run a native flash .exe file and the existing HTML5 solution (credit to Sarrekn) requires you to convert each game (yes, one game at a time). It also lacks the basic catalog function where you can use the same web interface to browse your collection. Last I checked, my collection has grown to over 200 titles. I program and I'm lazy about repetitive actions, so I'll do it in code to save my fingers.

**What does LSCatalog do?**<br><br>
It provides a simple HTML/Responsive interface that catalogs all your LifeSelector games including the starting graphic from each game and lets you launch a modifed version of Sarrekn's super-slick HTML5 interface to run these interactive games.

**How do I run this?**<br><br>
Simple. Just download the three required files (index.php, runGame.html, logo.svg) and place them into a directory on your php-capable web server (Apache, IIS, et al.). In Apache on linux, this is typically rooted at /var/www/html (and you can create a subdirectory like "LifeSelector" from there). In this same directory, put each LifeSelecto game as it's own subdirectory. Browse to http://yourserver/LifeSelector and enjoy.

**I don't have a web server, what do I do?**<br><br>
You can run php's built-in single-threaded web server. Download php (https://windows.php.net/), navigate to your LSCatalog directory and run "php.exe -S localhost:8000" (you can use whatever port you want here). Navigate to http://localhost:8000 and LSCatalog should appear.


<img width="1798" height="1600" alt="LSCatalog_sample" src="https://github.com/user-attachments/assets/d6b1a38a-6e51-4979-b3e9-f93e88419061" />
