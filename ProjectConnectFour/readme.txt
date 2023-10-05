First you must extract the .zip folder with this program's contents.
The start Apache in XAMPP and also MySQL in XAMPP
You should start by opening the index.html using the directory in your XAMPP folder structure (most likely in mysite/)
You should open in a browser with <localhost ip>mysite/.../ProjectConnectFour/index.html
You are now on the main page, you go to the signup page or straight to the game page using the links
Signup will create a new element in a database, but first will check if the database exists, and then create a new one if not.
Login will use the login info provided to check database and then set the user up with a cookie and a session.
All passwords are save in hash in database.
From now on, all data after game will be stored in database under the users login info.
leaderboards pull info from the database and also display the user's total games played stat, pulled from the database.
Created Users: (Username Password)
   - OldFashionedOats RolledOats
   - Silk Soymilk
   - Flaxseed WholeFlaxseed
   - GroundCinnamon Cinnamon
   - Stevia Dextrose