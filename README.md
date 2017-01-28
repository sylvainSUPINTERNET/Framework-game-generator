# Framework - Game

**Use symfony component HttpFoundation 3.2, YAML**


**Use Bootstrap 3.3.7**

#Install all components

Go to the main directory of the framework

:heavy_check_mark: composer **install**

#Contemplate the power of my framework (exemple story used)

:point_right: Go to /web

__*run exemple story*__

:ok_hand: *Run this command* (into /web) : 
 php **-S localhost:8000**

#That your turn now !
**Define your own story !**

    /config-story/story.yml
    
  :warning: Your controllers, views and templates must have the same name 
  
  :zap: Exemple view : home, controller: homeController, template:home :zap:
  
  :warning: You can add contents of views / controllers / templates for the automatic generation with command line **generate** or define your own logics and treatments in the generated files ( all includes / require_once of them are already done automaticly at the generation)
  
  <br><br>
  
**To complete the story's creation step** 

:point_right: Go to **/web** 

Before use the following command :

 :x:BEFORE GENERATE, in the /app/views | controllers | templates/ delete all files .php (else that will rewrite in the already exist files into these directories)
 
 
 :x:GENERATE REMOVE EXISTING FILES SO IF YOU DONT WANT LOOSE YOUR WORK YOU MUSNT RUN THIS COMMAND AND SAVE BEFORE RUN THIS (as note after where we talking about use command save to save your own games folders and file)


:x:THINK TO SAVE if you want keep your works before run this (ref save command)


:ok_hand: *Run this command* : 
 php **index.php generate**
 
 
 This command will create all files into the right folders (app/views | controllers | templates) as indicate into your story.yml

    
 
 
 <br><br>
 
 **Save your game** 

:point_right: Go to **/web** 


:ok_hand: *Run this command* : 
 php **saveManager.php save NameOfYourGame(folder)**
  
 **This command will copy the essentials files / folders (app / web / composer / config-story) to make your game work (web/app/config-story) with all files inside**
 
 **You should use this command to save your work if you want use generate after to dont delete all of your code in /app/**
 
 To import save story : Delete /app, /story-config, /web of your current project, and copy the save's folder of the game you want
 
 <br><br>
 
 **It's time to see your own story**

:point_right: Go to **/web** 


:ok_hand: *Run this command* : 
 php **-S localhost:8000**
 
 
 :question:  To see the result : **localhost:8000/yourPathDefinedInTheStory.yml**
 
 Now you have just to code the story details !


<br><br>

**Go further**


:point_right: Go to **/config-story/route-events/eventsManager.php** 

:squirrel: Here, you can defined your own logic according to the current path for an exemple, or you can start some sessions ...

**Foundations is automaticly include via the include of this file in the /web/index.php**



     
#Overall explanation ?

**Test the exemple story (automaticly write in .yml etc) and save as FoyerOfOpera**

/web

php **-S localhost:8000**

<br>

**More informations for customs stories**


*Mains commands*
  <ul>
  <p>**/web**</p>
  <code>php index.php generate</code>
  <li>Read your story.yml and generate all files about these informations (care this command override existing file so delete all inside controllers view and templates before use it ! (or save)</li>
    <br>
    <p>**/web**</p>
  <code>php index.php save NameFileYouWant(generate)</code>
  <li>Read folders in /app/views|controllers|templates and copy inside the NameFileYouWant</li>
  <br>
    <p>**/web**</p>
  <code>php -S localhost:YOUR_PORT</code>
  <li>Use the index.php (manage the route and render)</li>
  </ul>

*About files and utilities*
 <ul>
 <li>**/config-story**</li>
 <li>**story.yml** allow to write all your informations about routes, controllers, content of views and templates etc for the generation by command line generate</li>
 <br>
 <li>**/config-story/route-events**</li>
 <li>**eventsManager.php** To custom the behavior of routes, add sessions etc...</li>
 
 <br>
 
 <li>**/app/views|controllers|templates**</li>
 <li>All are linked, then you can definied your logics in controllers and used your variable into your templates herself use into the corresponding views</li>
 
 <br>
 
 <li>**/save_game/**</li>
 <li>Contains the file you have generate with the command save, (app / web / story-config / composer (if you use other computer etc), and you have just to replace the current app/web/story-config by them into your save folder to have your game's save</li>
 
 
 
 <ul>
      
      
#Story (exemple)
The Foyer of the Opera House is where the game begins. This empty room has doors to the south and west, also an unusable exit to the north. There is nobody else around.
The Bar lies south of the Foyer, and is initially unlit. Trying to do anything other than return northwards results in a warning message about disturbing things in the dark.
On the wall of the Cloakroom, to the west of the Foyer, is fixed a small brass hook.
Taking an inventory of possessions reveals that the player is wearing a black velvet cloak which, upon examination, is found to be light-absorbent. The player can drop the cloak on the floor of the Cloakroom or, better, put it on the hook.
Returning to the Bar without the cloak reveals that the room is now lit. A message is scratched in the sawdust on the floor.
The message reads either "You have won" or "You have lost", depending on how much it was disturbed by the player while the room was dark.
The act of reading the message ends the game.

