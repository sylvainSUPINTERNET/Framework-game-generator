# Framework - Game

**Use symfony component HttpFoundation 3.2, YAML**


**Use Bootstrap 3.3.7**

#Install all components

Go to the main directory of the framework

:heavy_check_mark: composer **install**

#Contemplate the power of my framework (exemple story used)

:point_right: Go to /web directory 

__*run exemple story*__

:ok_hand: *Run this command* : 
 php **-S localhost:8000**

#That your turn now !
**Define your own story !**

    /config-story/story.yml
    
  :warning: Your controllers, views and templates must have the same name 
  
  :zap: Exemple view : home, controller: homeController: template:home :zap:
  
  :warning: You can add contents of views / controllers for the automatic generation with command line **generate** or define your own logics and treatments in the generated files ( all includes / require_once of them are already done automaticly at the generation)
  
  
  
**To complete the story's creation step** 

:point_right: Go to **/web directory** 


:ok_hand: *Run this command* : 
 php **index.php generate**
 
 :x:REMOVE MANUALLY BEFORE RUN GENERATE /app/controllers/* /app/views/* app/templates/
 
 
 :x:GENERATE REMOVE EXISTING FILES SO IF YOU DONT WANT LOOSE YOUR WORK YOU MUSNT RUN THIS COMMAND
    
 
 
 
 
 
 
 **It's time to see your own story**

:ok_hand: *Run this command* : 
 php **-S localhost:8000**
 
 
 :question:  To see the result : **localhost:8000/yourPathDefinedInTheStory.yml**




**Go further**


:point_right: Go to **/config-story/route-events/eventsManager.php** 

:squirrel: Here, you can defined your own logic according to the current path for an exemple, or you can start some sessions ...

**Foundations is automaticly include via the include of this file in the /web/index.php**



     
#How its works ?
      /web/index.php
      => Manage route system, get the route and give the template and controller link to that route 
      => Manage session for game win condition and loose condition 
      
      /app/config/controller.php || routing.php
      => Do the link between the URL and the route template (/app/views)
      => Do the link between the URL and the controller to call (/app/controllers)
      
      **Template (/app/views/*)**
      => Include the controllers to use 
      => return variable in that controller
      
      
      **Controller (/app/controllers/*)**
      => Definie variable and all treatmens and be called in the view link into the config controller.php and routing.php
      
      
#Story (exemple)
The Foyer of the Opera House is where the game begins. This empty room has doors to the south and west, also an unusable exit to the north. There is nobody else around.
The Bar lies south of the Foyer, and is initially unlit. Trying to do anything other than return northwards results in a warning message about disturbing things in the dark.
On the wall of the Cloakroom, to the west of the Foyer, is fixed a small brass hook.
Taking an inventory of possessions reveals that the player is wearing a black velvet cloak which, upon examination, is found to be light-absorbent. The player can drop the cloak on the floor of the Cloakroom or, better, put it on the hook.
Returning to the Bar without the cloak reveals that the room is now lit. A message is scratched in the sawdust on the floor.
The message reads either "You have won" or "You have lost", depending on how much it was disturbed by the player while the room was dark.
The act of reading the message ends the game.

